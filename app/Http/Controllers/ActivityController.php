<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Docente;
use App\Models\Activity;
use App\Models\Question;
use App\Models\Classroom;
use Illuminate\Http\Request;

use App\Models\QuestionOption;
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
        //
        $activities = Activity::all();

        //classrooms del usuario autenticado
        $classrooms = Classroom::where('user_id', Auth::id())->get();

        return view('activity.index', ['activities' => $activities, 'classrooms' => $classrooms]);
        // return redirect()->route('activity.index', ['activities' => $activities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return redirect()->route('activity.create');

        return view('activity.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Log::info('Aqui estoy con los datos', $request->all());
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


                        $questionOptions = QuestionOption::create([
                            'question_id' => $newQuestion->id,
                            'is_right' => (bool) '',
                            'option_text' => $question['info']['optionText'],
                        ]);

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
            // return(['message Error' => $e]);
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();
        } catch (Exception $e) {
            // return(['message Error' => $e]);
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
                    // Rule::unique('activities')->ignore($id),
                ],
                // 'slug' => 'nullable',
                'activity_description' => 'required|string|min:15',
            ],
            [
                // 'unique' => __('El :attribute ya existe, prueba con otro.'),
                'required' => __('El :attribute es obligatorio.'),
                'min' => __('El :attribute no cumple la longitud mínima.'),
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

            $selectedActivity->delete();

            return redirect()->route('activity.index');

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
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n"])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }


    public function sendActivity(Request $request)
    {

        try {



            $classroomId = $request->classroom;
            $class = Classroom::findOrFail($classroomId);

            //Obtener los estudiantes de la clase
            $estudiantes = $class->Estudiante;

            Log::info($class);

            foreach ($estudiantes as $estudiante) {
                Log::info($estudiante);
                $activityEstudiante = ActivitiesResult::create([
                    'activity_id' => $class->id,
                    'estudiante_id' => $estudiante->user_id,
                ]);
            }


            return redirect()->back()->with('success', 'Actividad Enviada con Exito');




        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br>"])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br> Failed to update post. Please try again."])->withInput();
        }


    }


}
