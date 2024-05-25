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

            $trackingSheets = $student->trackingSheet;


            return view('trackingSheet.index', ['student' => $student, 'trackingSheets' => $trackingSheets]);

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo BD al obtener Hojas de Seguimiento. Inténtalo de nuevo."])->withInput();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al obtener Hojas de Seguimiento. Inténtalo de nuevo."])->withInput();
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

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo BD al editar la Hoja de Seguimiento. Inténtalo de nuevo."])->withInput();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al editar la Hoja de Seguimiento. Inténtalo de nuevo."])->withInput();
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $sheetId)
    {
        try {
            $selectedSheet = TrackingSheet::findOrFail($sheetId);

            $selectedSheet->delete();

            return redirect()->back();

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo BD al eliminar la Hoja de Seguimiento. Inténtalo de nuevo."])->withInput();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al eliminar la Hoja de Seguimiento. Inténtalo de nuevo."])->withInput();
        }
    }

    public function sendTrackingSheet(Request $request)
    {

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
            TrackingSheet::create([
                'student_id' => $request->input('user_id'),
                'observations' => $request->input('observations'),
            ]);


            return redirect()->back()->with('success', 'Tracking incorporado con Exito');


        } catch (QueryException $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo BD al enviar la Hoja de Seguimiento. Inténtalo de nuevo."])->withInput();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al enviar la Hoja de Seguimiento. Inténtalo de nuevo."])->withInput();
        }

    }
}
