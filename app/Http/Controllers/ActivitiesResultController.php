<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\ActivitiesResult;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class ActivitiesResultController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivitiesResult $activitiesResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivitiesResult $activitiesResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivitiesResult $activitiesResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $activityResultId, int $studentId)
    {



        try {



            $selectedActivity = ActivitiesResult::where('activity_id', $activityResultId)
                ->where('estudiante_id', $studentId)
                ->firstOrFail();





            $selectedActivity->delete();

            return redirect()->back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }


    }
    /**
     * Funcion que permite eliminar las multiples activitiesResult
     * seleccionadas con los check
     *
     * @param Request $request
     * @return void
     */
    public function deleteActivities(Request $request)
    {
        try {


            if (!isset($request->activitiesList)) {
                throw new Exception('El elemento "activitiesList" no está definido.');
            }

            $activities = $request->activitiesList;

            foreach ($activities as $activityId) {

                $activity = ActivitiesResult::findOrFail($activityId);
                $activity->delete();
            }

            return redirect()->back()->with('success', 'Registros Actualizados con Exito');


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " Failed to update post. Please try again."])->withInput();
        }
    }
}
