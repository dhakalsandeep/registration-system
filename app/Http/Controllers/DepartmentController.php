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
        $department = Department::with('departmentWiseCharge', 'departmentWiseCharge.patientType')
            ->where('id', $id)
            ->first();

        // DB::enableQueryLog();
        $departmentWiseCharges = PatientType::from('patient_types as p')->leftJoin(
            'department_wise_charges as dwc', function ($join) use ($id) {
                $join->on('p.id', '=', 'dwc.patient_type_id')
                    ->where('dwc.department_id', '=', $id);
            })
            ->select('p.id as patient_type_id','p.code','p.name','dwc.id','dwc.price')
            ->get();

        // $query = DB::getQueryLog();
        // dd($query);

        // dd($departmentWiseCharge);

        return view('departments.edit', compact('department','departmentWiseCharges'));
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

        foreach ($departmentWiseChargeIds as $key => $departmentWiseChargeId) {
            if ($prices[$key]) {
                DepartmentWiseCharge::updateOrCreate(
                    ['id' => $departmentWiseChargeId],
                    [
                        'department_id' => $department->id,
                        'patient_type_id' => $patientTypeIds[$key],
                        'price' => $prices[$key],
                    ]
                );
            }
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
