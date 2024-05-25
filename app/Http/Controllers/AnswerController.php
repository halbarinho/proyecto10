<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Answer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ActivitiesResult;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validación de los campos dinámicos
        $rules = [];
        foreach ($request->all() as $key => $value) {

            if (Str::startsWith($key, 'boolQuestion')) {
                $rules[$key] = ['required', 'boolean'];
            } elseif (Str::startsWith($key, 'multipleQuestion')) {

                $rules[$key] = ['required', 'boolean'];
            } elseif (Str::startsWith($key, 'shortAnswer')) {
                $rules[$key] = ['required', 'string', 'min:10', 'max:255'];
            }
        }


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        try {

            $activity = ActivitiesResult::where([
                'estudiante_id' => Auth::user()->id,
                'activity_id' => $request->input('activity_id'),
            ])->first();


            if ($activity->status == 'completed') {
                return redirect()->route('activity.index');
            } else {



                if (!$activity) {
                    self::update($request);
                } else {

                    foreach ($request->all() as $key => $value) {


                        if (Str::startsWith($key, 'boolQuestion') || Str::startsWith($key, 'multipleQuestion')) {
                            list($type, $questionId) = explode('-', $key);

                            $answer = Answer::create([
                                'student_id' => Auth::user()->id,
                                'question_id' => $questionId,
                                'activity_id' => $request->input('activity_id'),
                                'answer_text' => null,
                                'answer_bool' => $value,
                            ]);

                        } elseif (Str::startsWith($key, 'shortAnswer')) {
                            list($type, $questionId) = explode('-', $key);

                            $answer = Answer::create([
                                'student_id' => Auth::user()->id,
                                'question_id' => $questionId,
                                'activity_id' => $request->input('activity_id'),
                                'answer_text' => $value,
                                'answer_bool' => null,
                            ]);
                        }
                    }
                }


                $activity = ActivitiesResult::where([
                    'estudiante_id' => Auth::user()->id,
                    'activity_id' => $request->input('activity_id'),
                ])->update(['status' => $request->input('status')]);

            }


        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->withErrors(['error' => "Error al mandar la actividad, ya se mandó a esta clase."])->withInput();
            } else {
                return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Error al mandar la actividad. Inténtalo de nuevo."])->withInput();
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Error al mandar la actividad. Inténtalo de nuevo."])->withInput();
        }

        return redirect()->route('activity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        foreach ($request->all() as $key => $value) {


            try {

                if (Str::startsWith($key, 'boolQuestion') || Str::startsWith($key, 'multipleQuestion')) {
                    list($type, $questionId) = explode('-', $key);




                    $answer = Answer::where([
                        'student_id' => Auth::user()->id,
                        'question_id' => $questionId,
                        'activity_id' => $request->input('activity_id'),
                    ])->update(['answer_bool' => $value]);



                } elseif (Str::startsWith($key, 'shortAnswer')) {
                    list($type, $questionId) = explode('-', $key);

                    $answer = Answer::where([
                        'student_id' => Auth::user()->id,
                        'question_id' => $questionId,
                        'activity_id' => $request->input('activity_id'),
                    ])->update(['answer_text' => $value]);

                }


            } catch (ModelNotFoundException $e) {
                return redirect()->back()->withErrors(['error' => "Error no se encontró el registro a actualizar."])->withInput();
            } catch (QueryException $e) {
                if ($e->getCode() === '23000') {
                    return redirect()->back()->withErrors(['error' => "Error ya existe el registro."])->withInput();
                } else {
                    return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Error al editar la actividad. Inténtalo de nuevo."])->withInput();
                }
            } catch (Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Error al mandar la actividad. Inténtalo de nuevo."])->withInput();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
