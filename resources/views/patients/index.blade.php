@extends('layouts.app')

@section('content')

<div class="row p-4">
    <h1>Patient</h1>

    <div class="col-2">
        <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Register Patient</a>
    </div>
    @if (count($patients))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sn</th>
                <th>Title</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Mobile No</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $patient->title }}</td>
                    <td>{{ $patient->full_name }}</td>
                    <td>{{ $patient->dob }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->other['mobileno'] }}</td>
                    <td>{{ $patient->other['address'] }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No data found</p>
    @endif
</div>

@endsection