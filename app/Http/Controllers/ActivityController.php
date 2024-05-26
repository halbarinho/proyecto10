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


            $activities = ActivitiesResult::where('estudiante_id', '=', $user->id)->get();

            return view('estudiante.activity.index', compact('activities'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Si no hay errores en la sesión, simplemente retornar la vista de creación

        return view('activity.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'activity_name' => 'required|unique:activities|min:3|max:30',
            'activity_description' => 'required|string|min:15|max:500',
            'questionsData' => 'required|array|min:1|max:40',
        ];
        $messages = [
            'activity_name.required' => __('El nombre de la actividad es obligatorio.'),
            'unique' => __('El título de la actividad ya existe.'),
            'required' => __('El :attribute es obligatorio.'),
            'string' => __('El :attribute debe ser una cadena.'),
            'min' => __('El :attribute no cumple la longitud mínima.'),
            'max' => __('El :attribute no cumple la longitud máxima.'),

            'questionsData.required' => 'La actividad debe incluir al menos una cuestión.',
            'questionsData.array' => 'La actividad debe incluir al menos una cuestión.',
            'questionsData.min' => 'La actividad debe incluir al menos una cuestión.',
        ];


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

        if ($validator->fails()) {


            return response()->json(['errors' => $validator->getMessageBag()], 422);

        }

        try {






            $usuario = $request->input('user_id');







            $class = Activity::create([
                'activity_name' => $request->input('activity_name'),
                'activity_description' => $request->input('activity_description'),
                'user_id' => (int) $request->input('user_id'),
            ]);




            //Obtener el id de la Actividad creada
            $classId = $class->id;


            $data = $request->all();
            $dataQuestions = $data['questionsData'];


            foreach ($dataQuestions as $question) {

                switch ($question['type']) {
                    case 'boolForm':

                        $newQuestion = Question::create([
                            'question_type' => $question['type'],
                            'question_text' => $question['info']['boolStatement'],
                        ]);



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

                        $selectedAsRight = (int) $question['info']['selectedOption'];

                        foreach ($options as $index => $option) {

                            $isRight = false;

                            if ($selectedAsRight === $index) {
                                $isRight = true;
                            }


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

            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Error al crear el Post. Inténtalo de nuevo."])->withInput();
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Error al crear el Post. Inténtalo de nuevo."])->withInput();

        }


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


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "Fallo actualizando. Inténtalo de nuevo."])->withInput();
        }

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

                'activity_description' => 'required|string|min:15|max:80',
            ],
            [

                'activity_name.required' => __('El nombre de la actividad es obligatorio.'),
                'activity_name.min' => __('La longitud del título de la actividad es de mínimo 3 caracteres.'),
                'activity_name.max' => __('La longitud del título de la actividad es de máximo 25 caracteres.'),
                'unique' => __('El título de la actividad ya existe.'),
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


        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al actualizar el Post. Inténtalo de nuevo."])->withInput();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo buscando user id."])->withInput();
        }
    }


    public function destroy(int $id)
    {
        try {

            $selectedActivity = Activity::findOrFail($id);

            $selectedActivity->delete();


            return redirect()->back();

        } catch (QueryException $e) {

            // Manejo de error al eliminar si la actividad ya tuviera registros vinculados en otras tablas como ActivityResult
            if ($e->errorInfo[1] === 1451) {

                return redirect()->back()->withErrors(['error' => 'No se puede eliminar esta actividad porque tiene registros vinculados.'])->withInput();
            }
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }


    public function showUserActivities(int $userId)
    {
        $activities = Activity::where('user_id', $userId)->get();

        return view('activity.index', ['activities' => $activities]);
    }

    public function deleteActivities(Request $request)
    {
        try {

            if (!isset($request->activitiesList)) {
                throw new Exception('El elemento "activitiesList" no está definido.');
            }

            $activities = $request->activitiesList;

            foreach ($activities as $activityId) {

                $activity = Activity::findOrFail($activityId);
                $activity->delete();
            }

            return redirect()->back()->with('success', 'Registros Actualizados con Éxito');


        } catch (QueryException $e) {

            // Manejo de error al eliminar si la actividad ya tuviera registros vinculados en otras tablas como ActivityResult
            if ($e->errorInfo[1] === 1451) {

                return redirect()->back()->withErrors(['error' => 'No se puede eliminar esta actividad porque tiene registros vinculados.'])->withInput();
            }
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }


    public function sendActivity(int $activityId, Request $request)
    {

        try {


            $activity = Activity::findOrFail($activityId);

            $classroomId = $request->classroom;
            $class = Classroom::findOrFail($classroomId);

            //Obtener los estudiantes de la clase
            $estudiantes = $class->Estudiante;

            // Verificar si la lista de estudiantes está vacía
            if ($estudiantes->isEmpty()) {
                return redirect()->back()->withErrors(['error' => 'La clase está vacía.'])->withInput();
            }

            foreach ($estudiantes as $estudiante) {

                // $activityEstudiante = ActivitiesResult::create([
                //     'activity_id' => $activity->id,
                //     'estudiante_id' => $estudiante->user_id,
                //     'class_id' => $class->id,
                // ]);


                $exists = ActivitiesResult::where('activity_id', $activity->id)
                    ->where('estudiante_id', $estudiante->user_id)
                    ->exists();

                if (!$exists) {

                    $activityEstudiante = ActivitiesResult::create([
                        'activity_id' => $activity->id,
                        'estudiante_id' => $estudiante->user_id,
                        'class_id' => $class->id,
                    ]);

                    //Aqui creo la notificacion para cada user

                    $notificationActivity = Notification::create([
                        'message' => 'Actividad: ' . $activity->activity_name,
                        'type' => 'activity',
                        'user_id' => $estudiante->user_id,
                        'target_id' => $activity->id,
                    ]);


                    broadcast(new NotificationSend($notificationActivity->type, $notificationActivity->user_id, $notificationActivity->message))->toOthers();
                }

            }//fin if
            return redirect()->back()->with('success', 'Actividad Enviada con Exito');




        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->withErrors(['error' => "Error al mandar la actividad, ya se mandó a esta clase."])->withInput();
            } else {
                return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al mandar la actividad. Inténtalo de nuevo."])->withInput();
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " "])->withInput();
        }


    }


    public function evaluateIndex(int $activityId)
    {

        try {

            $activity = Activity::findOrFail($activityId);


            $activitiesResult = $activity->ActivitiesResult;

            return view('activity.evaluateIndex', ['activities' => $activitiesResult]);

        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->withErrors(['error' => "Error al evaluar la actividad, ya se mandó a esta clase."])->withInput();
            } else {
                return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al evaluar la actividad. Inténtalo de nuevo."])->withInput();
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al evaluar la actividad. Inténtalo de nuevo."])->withInput();
        }

    }


    public function evaluateActivity(int $activityId, int $studentId)
    {

        try {


            $studentAnswers = Answer::where([
                'activity_id' => $activityId,
                'student_id' => $studentId,
            ])->get();


            if ($studentAnswers) {

                $status = ['Sin Seguimiento' => 'safe', 'Precacución' => 'caution', 'Atención Prioritaria' => 'warning'];

                return view('activity.evaluateActivity', ['questionaire' => $studentAnswers, 'studentId' => $studentId, 'activityId' => $activityId, 'status' => $status]);
            } else {
                return redirect()->back()->withErrors(['error' => "Error, no se encontraron coincidencias."])->withInput();

            }
        } catch (QueryException $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al evaluar la actividad. Inténtalo de nuevo."])->withInput();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al evaluar la actividad. Inténtalo de nuevo."])->withInput();
        }

    }

}
