<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Docente;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\ActivityRequest;
use Illuminate\Database\QueryException;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activities = Activity::all();

        return view('activity.index', ['activities' => $activities]);
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
    public function store(ActivityRequest $request)
    {
        try {

            $loggedUser = 1;

            $data = $request->validated();

            $class = Activity::create([
                'activity_name' => $data['activity_name'],
                'activity_description' => $data['activity_description'],
                'user_id' => $loggedUser,
            ]);

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();
        }

        $activities = Activity::all();

        // return view('classroom.index', ['classes' => $classes]);
        return redirect()->route('activity.index', ['activities' => $activities]);
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
        $selectedActivity = Activity::findOrFail($id);

        $docentes = Docente::all();

        //Comprobacion de si la clase tiene asignado un profesor
        if (is_null($selectedActivity->user_id)) {
            $docenteName = "Sin asignar";
            $docenteValue = "";
        } else {

            // //Paso valores de Docentes
            // $users = User::all();


            // $filteredUsers = $users->where('id', $selectedActivity->user_id);
            // $docenteName = $filteredUsers->all();
            // $docenteName = $filteredUsers[0]->name . ' ' . $filteredUsers[0]->last_name_1 . ' ' . $filteredUsers[0]->last_name_2;
            // $docenteValue = $filteredUsers[0]->id;

            /**
             * METODO PARA CONSEGUIR LOS DATOS DE LAS TABLAS RELACIONADAS
             */
            // $filteredUser = User::where('id', $selectedActivity->user_id)->get();

            $filteredUser = Docente::where('user_id', $selectedActivity->user_id)->get();


            $arrayUsers = $filteredUser;

            $docenteName = $filteredUser[0]->name;

            $docenteValue = $filteredUser[0]->id;



        }

        return view('activity.edit', ['activity' => $selectedActivity, 'docentes' => $docentes, 'docenteValues' => $arrayUsers, 'docenteName' => $docenteName, 'docenteValue' => $docenteValue]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
