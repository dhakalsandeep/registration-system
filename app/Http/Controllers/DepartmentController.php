<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentWiseCharge;
use App\Models\PatientType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('departmentWiseCharge', 'departmentWiseCharge.patientType')
            ->orderBy('name')->get();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patientTypes = PatientType::all();
        return view('departments.create', compact('patientTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $department = new Department;
        $department->code = $request->code;
        $department->name = $request->name;
        $department->save();

        $patientTypeIds = $request->patienttypeid;
        $prices = $request->price;

        foreach ($patientTypeIds as $key => $patientTypeId) {
            if ($prices[$key] >= 0) {
                $departmentWiseCharge = new DepartmentWiseCharge();

                $departmentWiseCharge->department_id = $department->id;
                $departmentWiseCharge->patient_type_id = $patientTypeId;
                $departmentWiseCharge->price = $prices[$key];
                $departmentWiseCharge->save();
            }
        }

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::find($id);

        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::find($id);

        $depWiseCharges = PatientType::from('patient_types as p')
            ->leftJoin('department_wise_charges as dwc', [
                ['p.id', '=', 'dwc.patient_type_id'],
                ['dwc.department_id', '=', $id]
            ])
            ->leftJoin('departments as d', ['dwc.department_id' => 'd.id', 'd.id' => $id])
            ->select('p.*', 'dwc.id as dep_wise_charge_id', 'dwc.price')
            ->get();

        // dd($depWiseCharges);
        // dd($depWiseCharge);


        return view('departments.edit', compact('department', 'depWiseCharges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $department = Department::find($id);
        $department->code = $request->code;
        $department->name = $request->name;
        $department->save();

        $departmentWiseChargeIds = $request->departmentwisechargeid;
        $patientTypeIds = $request->patienttypeid;
        $prices = $request->price;

        foreach ($patientTypeIds as $key => $patientTypeId) {
            DepartmentWiseCharge::updateOrCreate(
                ['id' => $departmentWiseChargeIds[$key]],
                [
                    'department_id' => $department->id,
                    'patient_type_id' => $patientTypeId,
                    'price' => $prices[$key]
                ]
            );
        }

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::find($id);

        $department->delete();

        return redirect()->route('departments.index');
    }
}
