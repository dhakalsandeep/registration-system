@extends('layouts.app')

@section('content')

<div class="row p-4">
    <h1>Patient Type</h1>

    <div class="col-2">
        <a href="{{ route('patient_type.create') }}" class="btn btn-primary mb-3">Add Patient Type</a>
    </div>
    @if (count($patientTypes))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sn</th>
                <th>Code</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patientTypes as $patientType)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $patientType->code }}</td>
                <td>{{ $patientType->name }}</td>
                <td>
                    <a href="{{ route('patient_type.show', $patientType->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('patient_type.edit', $patientType->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('patient_type.destroy', $patientType->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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