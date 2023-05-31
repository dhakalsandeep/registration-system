<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Patient;
use App\Models\PatientType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        // dd($patients);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hospitalNo = $this->getNewHospitalNo();
        $departments = Department::all();
        $patientTypes = PatientType::all();
        return view('patients.create', compact('hospitalNo','departments', 'patientTypes'));
    }

    public function getNewHospitalNo() {
        $year = substr(date('Y'), 2, 2);
        $maxHospitalNo = DB::table('patients')
            ->where('hospital_no', 'like', "{$year}%")
            ->max('hospital_no') ?? 0;

        $maxHospitalNo = ($maxHospitalNo ? substr($maxHospitalNo, 2, 6) : 0) + 1;

        $newHospitalNo = $year.str_pad($maxHospitalNo, 6, '0', STR_PAD_LEFT);
        return $newHospitalNo;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $patient = new Patient;
        $patient->title = $request->title;
        $patient->first_name = $request->firstname;
        $patient->last_name = $request->lastname;
        $patient->dob = $request->dob;
        $patient->gender = $request->gender;
        $patient->hospital_no = $this->getNewHospitalNo();
        $patient->other = [
            "mobileno" => $request->mobileno,
            "address" => $request->address
        ];
        $patient->save();
        if ($request->hasFile('profilepic')) {
            $profilePic = $request->file('profilepic');
            $path = Storage::disk('local')->put("public/patient_profile/{$patient->id}", $profilePic);
            $patient->profile_pic_path = substr($path, 7, strlen($path));
            $patient->save();
        }
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
    public function getDepartmentWiseCharge(Request $request) {
        return response()->json(['data' => 'hello bro']);
    }
}
