<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Activity;
use App\Models\Question;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ActivitiesResult;
use App\Models\ActivityQuestion;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class ActivityQuestionController extends Controller
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
    public function show(ActivityQuestion $activityQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityQuestion $activityQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivityQuestion $activityQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityQuestion $activityQuestion)
    {
        //
    }

    public function makeActivity(int $user_id, int $activity_id)
    {

        try {
            $activitySelected = Activity::findOrFail($activity_id);



            $activityQuestions = Question::whereHas('Activity', function ($query) use ($activity_id) {
                $query->where('activity_id', $activity_id);
            })->get();

            $activityResult = ActivitiesResult::where([
                'estudiante_id' => $user_id,
                'activity_id' => $activitySelected->id,
            ])->first();

            // Log::info('actividad: ', [$activity]);
            // Log::info('status', [$activity->status]);

            if ($activityResult->status == 'completed') {
                return redirect()->route('activity.index');
            }

            Log::info($activitySelected);
            Log::info($activityQuestions);

            //Marco como leida la notificacion si la hubiera
            $notification = Notification::where([
                'user_id' => $user_id,
                'type' => 'activity',
                'target_id' => $activitySelected->id,
            ])->get();

            if ($notification) {

                Notification::where([
                    'user_id' => $user_id,
                    'type' => 'activity',
                    'target_id' => $activitySelected->id,
                ])->update(['read' => true]);

            }

            // return view('activityQuestion.makeActivity', ['activityId' => $activity_id]);
            return view('activityQuestion.makeActivity', ['activity' => $activitySelected, 'questions' => $activityQuestions]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }
}
