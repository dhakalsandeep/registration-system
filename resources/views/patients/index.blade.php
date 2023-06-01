@extends('layouts.app')

@section('content')

<style>
    .profile-pic {
        height: 80px;
        width: 100px;
    }
</style>

<div class="row p-4">
    <h1>Patient</h1>

    <div class="col-2">
        <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Register Patient</a>
    </div>
    @if (count($patients))
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">Sn</th>
                <th class="text-center">Hospital No</th>
                <th class="text-center">Name</th>
                <th class="text-center">DOB</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Mobile No</th>
                <th class="text-center">Address</th>
                <th class="text-center">PP</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td width="3%" class="text-right">{{ $loop->iteration }}</td>
                    <td width="8%" class="text-center">{{ $patient->hospital_no }}</td>
                    <td width="10%" class="text-left">{{ $patient->full_name }}</td>
                    <td width="10%" class="text-center">{{ $patient->dob }}</td>
                    <td width="10%" class="text-center">{{ $patient->gender }}</td>
                    <td width="10%" class="text-center">{{ $patient->other['mobileno'] }}</td>
                    <td width="15%">{{ $patient->other['address'] }}</td>
                    <td width="10%" class="text-center"><img src="{{ asset("storage/$patient->profile_pic_path") }}" class="profile-pic" alt="Profile Pic" srcset=""></td>
                    <td width="15%">
                        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('patients.create_visit', $patient->id) }}" class="btn btn-success">Visit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No data found</p>
    @endif
</div>

@endsection