<?php

namespace App\Http\Controllers;

use App\Models\StageLevel;
use Illuminate\Http\Request;

class StageLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $stageLevels = StageLevel::all();

        return response()->json($stageLevels);
    }

    public function showLevelForStage($stage)
    {

        $stageLevels = StageLevel::where('stage_id', $stage)->get();

        return response()->json($stageLevels);
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
    public function show(StageLevel $stageLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StageLevel $stageLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StageLevel $stageLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StageLevel $stageLevel)
    {
        //
    }
}
