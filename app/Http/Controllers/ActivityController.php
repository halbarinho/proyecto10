<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Answer;
use App\Models\Docente;
use App\Models\Activity;
use App\Models\Question;
use App\Models\Classroom;
use App\Models\Notification;

use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Validation\Rule;
use App\Events\NotificationSend;
use App\Models\ActivitiesResult;
use App\Models\ActivityQuestion;
use function PHPSTORM_META\type;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ActivityRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        if ($user->hasRole('docente')) {

            $activities = Activity::all();

            //classrooms del usuario autenticado
            $classrooms = Classroom::where('user_id', Auth::id())->get();

            return view('activity.index', ['activities' => $activities, 'classrooms' => $classrooms]);

        } elseif ($user->hasRole('alumno')) {
            Log::info($user->id);

            $activities = ActivitiesResult::where('estudiante_id', '=', $user->id)->get();
            Log::info($activities);
            return view('estudiante.activity.index', compact('activities'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // // Verificar si existen errores en la sesión
        // if (session()->has('errors')) {

        //     // Obtener los errores de la sesión
        //     $errors = session('errors');

        //     Log::info('Aqui: ', [$errors]);
        //     // Limpiar los errores de la sesión
        //     session()->forget('errors');
        //     // Retornar la vista con los errores
        //     return view('activity.create', ['errors' => $errors]);

        // }

        // Si no hay errores en la sesión, simplemente retornar la vista de creación

        return view('activity.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Log::info('Aqui estoy con los datos', $request->all());

        $rules = [
            'activity_name' => 'required|unique:activities',
            'activity_description' => 'required|string|min:15|max:500',
            'questionsData' => 'required|array|min:1',
        ];
        $messages = [
            'activity_name.required' => __('El nombre de la actividad es obligatorio.'),
            'unique' => __('El titulo de la actividad ya existe.'),
            'required' => __('El :attribute es obligatorio.'),
            'string' => __('El :attribute debe ser una cadena.'),
            'min' => __('El :attribute no cumple la longitud mínima.'),
            'max' => __('El :attribute no cumple la longitud máxima.'),

            'questionsData.required' => 'Debe inlcuir al menos una pregunta a la actividad.',
            'questionsData.array' => 'Debe inlcuir al menos una pregunta a la actividad.',
            'questionsData.min' => 'Debe inlcuir al menos una pregunta a la actividad.',
        ];

        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'activity_name' => 'required',
        //         'activity_description' => 'required|string|min:15|max:500',

        //     ],
        //     [
        //         'activity_name.required' => __('El nombre de la actividad es obligatorio.'),
        //         'required' => __('El :attribute es obligatorio.'),
        //         'string' => __('El :attribute debe ser una cadena.'),
        //         'min' => __('El :attribute no cumple la longitud mínima.'),
        //         'max' => __('El :attribute no cumple la longitud máxima.'),
        //     ]
        // );


        if ($request->has('questionsData') && is_array($request->input('questionsData'))) {
            foreach ($request->input('questionsData') as $index => $questionData) {
                $questionType = $questionData['type'];

                // Agregar regla de validación para boolStatement si el tipo de pregunta es boolForm
                if ($questionType === 'boolForm') {
                    $rules["questionsData.$index.info.boolStatement"] = 'required|string';
                }

                if ($questionType === 'multipleForm') {
                    $rules["questionsData.$index.info.multipleStatement"] = 'required|string';
                }

                if ($questionType === 'shortForm') {
                    $rules["questionsData.$index.info.shortStatement"] = 'required|string';
                    $rules["questionsData.$index.info.shortText"] = 'required|string';

                }

            }
        }



        $validator = Validator::make(
            $request->all(),
            $rules,
            $messages
        );

        Log::info('Validator: ', [$validator->errors()]);


        if ($validator->fails()) {
            Log::info('Aqui entro', [$validator]);
            // return redirect()->back()
            //     ->withErrors($validator);

            return response()->json(['errors' => $validator->getMessageBag()], 422);

        }

        try {




            // $loggedUser = 2;

            $usuario = $request->input('user_id');
            // Log::info('User: ', [$usuario]);


            //$data = $request->validated();
            // $data = $request->all();

            //Retrieving only los datos necesarios
            //FUNCIONANDO
            // $data = $request->safe()->only(['activity_name', 'activity_description']);

            $class = Activity::create([
                'activity_name' => $request->input('activity_name'),
                'activity_description' => $request->input('activity_description'),
                'user_id' => (int) $request->input('user_id'),
            ]);


            Log::info('Datos de entrada:', [$class]);

            //Obtener el id de la Actividad creada
            $classId = $class->id;

            // $activityQuestions = ActivityQuestion::create([
            //     'activity_id' => $classId,
            //     'question_id' => 1,
            // ]);


            $data = $request->all();
            $dataQuestions = $data['questionsData'];


            foreach ($dataQuestions as $question) {

                switch ($question['type']) {
                    case 'boolForm':

                        $newQuestion = Question::create([
                            'question_type' => $question['type'],
                            'question_text' => $question['info']['boolStatement'],
                        ]);

                        //$questionId = $newQuestion->id;

                        $questionOptions = QuestionOption::create([
                            'question_id' => $newQuestion->id,
                            'is_right' => (bool) $question['info']['checkboxValue'],
                            'option_text' => '',
                        ]);

                        break;

                    case 'multipleForm':

                        $newQuestion = Question::create([
                            'question_type' => $question['type'],
                            'question_text' => $question['info']['multipleStatement'],
                        ]);

                        $options = $question['info']['optionText'];
                        Log::info('Dentro Multiple: ', [$options]);



                        $selectedAsRight = (int) $question['info']['selectedOption'];
                        Log::info('SelectedIndex: ', [$selectedAsRight]);

                        foreach ($options as $index => $option) {

                            $isRight = false;

                            if ($selectedAsRight === $index) {
                                $isRight = true;
                            }

                            Log::info('Dentro Multiple: ', [$option]);
                            $questionOptions = QuestionOption::create([
                                'question_id' => $newQuestion->id,
                                'option_text' => $option,
                                'is_right' => (bool) $isRight,
                            ]);
                        }
                        break;

                    case 'shortForm':

                        $newQuestion = Question::create([
                            'question_type' => $question['type'],
                            'question_text' => $question['info']['shortStatement'],
                        ]);

                        $questionOptions = QuestionOption::create([
                            'question_id' => $newQuestion->id,
                            'is_right' => (bool) '',
                            'option_text' => $question['info']['shortText'],
                        ]);


                        break;
                }


                $activityQuestions = ActivityQuestion::create([
                    'activity_id' => $classId,
                    'question_id' => $newQuestion->id,
                ]);
            }


        } catch (QueryException $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();

        }

        // return view('classroom.index', ['classes' => $classes]);
        // return redirect()->route('activity.showUserActivities', ['user' => $usuario]);
        // return(['message' => $request]);
        // return redirect()->back()->with('succes', 'HEcho con exito');
        redirect()->route('activity.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        try {
            $selectedActivity = Activity::findOrFail($id);

            Log::info($selectedActivity);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }

        // return redirect()->route('activity.edit', $selectedActivity->id)->with('succes', 'Actualizado correctamente');
        return view('activity.edit', ['activity' => $selectedActivity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {

        $validator = Validator::make(
            $request->all(),
            [
                // 'title' => 'required|string|unique:posts|min:3',
                'activity_name' => [
                    'required',
                    'string',
                    'min:3',
                    'max:25',
                    Rule::unique('activities')->ignore($activity->id),
                ],
                // 'slug' => 'nullable',
                'activity_description' => 'required|string|min:15|max:80',
            ],
            [
                'unique' => __('El :attribute ya existe, prueba con otro.'),
                'required' => __('El :attribute es obligatorio.'),
                'string' => __('El :attribute debe ser una cadena.'),
                'min' => __('El :attribute no cumple la longitud mínima.'),
                'max' => __('El :attribute no cumple la longitud máxima.'),
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }



        try {


            $selectedActivity = Activity::findOrFail($activity->id);

            $selectedActivity->update([
                'activity_name' => $request->input('activity_name'),
                'activity_description' => $request->input('activity_description'),
            ]);


            return redirect()->route('activity.index');


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Activity $activity)
    // {
    //     try {

    //         $selectedActivity = Activity::findOrFail($activity->id);

    //         $activity->delete();

    //         return redirect()->route('activity.index');

    //     } catch (Exception $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
    //     } catch (QueryException $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
    //     }
    // }


    public function destroy(int $id)
    {
        try {

            $selectedActivity = Activity::findOrFail($id);

            Log::info('Aqui: ', [$selectedActivity]);
            $selectedActivity->delete();

            //Esto lo tengo funcionando, pero quiero que funcione tanto para admin como para docente
            // return redirect()->route('activity.index');

            return redirect()->back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }


    public function showUserActivities(int $userId)
    {
        $activities = Activity::where('user_id', $userId)->get();

        Log::info('Activities: ', [$activities]);

        return view('activity.index', ['activities' => $activities]);
    }

    public function deleteActivities(Request $request)
    {
        try {

            Log::info($request);

            if (!isset($request->activitiesList)) {
                throw new Exception('El elemento "activitiesList" no está definido.');
            }

            $activities = $request->activitiesList;

            foreach ($activities as $activityId) {
                Log::info('Valor', [$activityId]);
                $activity = Activity::findOrFail($activityId);
                $activity->delete();
            }

            return redirect()->back()->with('success', 'Registros Actualizados con Exito');


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " Failed to update post. Please try again."])->withInput();
        }
    }


    public function sendActivity(int $activityId, Request $request)
    {

        try {

            // Log::info($activityId);

            $activity = Activity::findOrFail($activityId);

            Log::info($activity);

            $classroomId = $request->classroom;
            $class = Classroom::findOrFail($classroomId);

            //Obtener los estudiantes de la clase
            $estudiantes = $class->Estudiante;



            Log::info($class);

            foreach ($estudiantes as $estudiante) {
                Log::info($estudiante);
                $activityEstudiante = ActivitiesResult::create([
                    'activity_id' => $activity->id,
                    'estudiante_id' => $estudiante->user_id,
                    'class_id' => $class->id,
                ]);

                //Aqui creo la notificacion para cada user

                $notificationActivity = Notification::create([
                    'message' => $activity->activity_name,
                    'type' => 'activity',
                    'user_id' => $estudiante->user_id,
                    'target_id' => $activity->id,
                ]);

                // Log::info(`Type: ${$notificationActivity->type}, UsR: ${$notificationActivity->user_id}, messg: ${$notificationActivity->message}`);
                Log::info(${$notificationActivity->type});
                broadcast(new NotificationSend($notificationActivity->type, $notificationActivity->user_id, $notificationActivity->message))->toOthers();
            }


            return redirect()->back()->with('success', 'Actividad Enviada con Exito');




        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->withErrors(['error' => "Error al mandar la actividad, ya se mandó a esta clase."])->withInput();
            } else {
                return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br> Failed to update post. Please try again."])->withInput();
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br>"])->withInput();
        }


    }


    public function evaluateIndex(int $activityId)
    {

        try {

            $activity = Activity::findOrFail($activityId);


            $activitiesResult = $activity->ActivitiesResult;

            Log::info('activities:', [$activitiesResult]);



            return view('activity.evaluateIndex', ['activities' => $activitiesResult]);

        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->withErrors(['error' => "Error al mandar la actividad, ya se mandó a esta clase."])->withInput();
            } else {
                return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br> Failed to update post. Please try again."])->withInput();
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br>"])->withInput();
        }

    }


    public function evaluateActivity(int $activityId, int $studentId)
    {

        try {


            // $activitySelected = Activity::findOrFail($activityId);



            // $questionaire = Question::whereHas('Activity', function ($query) use ($activityId) {
            //     $query->where('activity_id', $activityId);
            // })->get();

            // Log::info('user', [$studentId]);
            $studentAnswers = Answer::where([
                'activity_id' => $activityId,
                'student_id' => $studentId,
            ])->get();

            // $questionaire = ActivitiesResult::findOrFail([
            //     'activity_id' => $activityId,
            //     'estudiante_id' => $studentId,
            // ]);

            if ($studentAnswers) {
                Log::info('studentAnswers', [$studentAnswers]);
                $status = ['Sin Seguimiento' => 'safe', 'Precacución' => 'caution', 'Atención Prioritaria' => 'warning'];
                // return view('activity.evaluateActivity', ['questionaire' => $questionaire, 'studentAnswers' => $studentAnswers]);
                return view('activity.evaluateActivity', ['questionaire' => $studentAnswers, 'studentId' => $studentId, 'activityId' => $activityId, 'status' => $status]);
            } else {
                return redirect()->back()->withErrors(['error' => "Error, no se encontraron coincidencias."])->withInput();

            }
        } catch (QueryException $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br> Failed to update post. Please try again."])->withInput();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br>"])->withInput();
        }

    }

}
