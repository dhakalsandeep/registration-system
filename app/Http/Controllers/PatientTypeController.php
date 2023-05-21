<?php

namespace App\Http\Controllers;

use App\Models\PatientType;
use Illuminate\Http\Request;

class PatientTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patientTypes = PatientType::all();
        return view('patient_type.index', compact('patientTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $patientType = new PatientType();
        $patientType->code = $request->code;
        $patientType->name = $request->name;
        $patientType->save();

        return redirect()->route('patient_type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patientType = PatientType::findOrFail($id);

        return view('patient_type.show', compact('patientType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patientType = PatientType::find($id);
        
        return view('patient_type.edit', compact('patientType')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patientType = PatientType::find($id);
        $patientType->code = $request->code;
        $patientType->name = $request->name;
        $patientType->save();

        return redirect()->route('patient_type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patientType = PatientType::find($id);
        
        $patientType->delete();

        return redirect()->route('patient_type.index');
    }
}
