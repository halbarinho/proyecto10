<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\TrackingSheet;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class TrackingSheetController extends Controller
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
    public function show(TrackingSheet $trackingSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrackingSheet $trackingSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrackingSheet $trackingSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrackingSheet $trackingSheet)
    {
        //
    }

    public function sendTrackingSheet(Request $request)
    {
        Log::info($request->all());
        try {
            TrackingSheet::create([
                'student_id' => $request->input('user_id'),
                'observations' => $request->input('observations'),
            ]);


            return redirect()->back()->with('success', 'Tracking incorporado con Exito');


        } catch (QueryException $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br> Failed to update post. Please try again."])->withInput();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br>"])->withInput();
        }

    }
}
