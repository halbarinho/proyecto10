<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\TrackingSheet;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

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
    public function show(int $studentId)
    {
        try {

            $student = Estudiante::findOrFail($studentId);

            Log::info($student);
            $trackingSheets = $student->trackingSheet;

            Log::info($trackingSheets);


            return view('trackingSheet.index', ['student' => $student, 'trackingSheets' => $trackingSheets]);

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrackingSheet $trackingSheet)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->all();



        Log::info($data);

        $validator = Validator::make(
            $request->all(),
            [
                'observations' => [
                    'required',
                    'string',
                    'min:15',
                    // Rule::unique('activities')->ignore($id),
                ],
            ],
            [
                'string' => __('El :attribute debe ser una cadean válida.'),
                'required' => __('El :attribute es obligatorio.'),
                'min' => __('El :attribute no cumple la longitud mínima.'),
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }



        try {



            $selectedSheet = TrackingSheet::findOrFail($request->input('trackingSheetId'));

            $selectedSheet->update([
                'observations' => $request->input('observations'),
            ]);


            return redirect()->route('trackingSheet.index', ['studentId' => $request->input('studentId')]);

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $sheetId)
    {
        $selectedSheet = TrackingSheet::findOrFail($sheetId);

        $selectedSheet->delete();

        return redirect()->back();
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
