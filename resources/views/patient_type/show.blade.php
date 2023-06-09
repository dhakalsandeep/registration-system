@extends('layouts.app')

@section('content')
<div class="row p-4">
    <h1>Patient Type Detail</h1>
    <!-- Title -->
    <p>Code: {{ $patientType->code }}</p>

    <!-- Description -->
    <p>Name: {{ $patientType->name }}</p>

    <p>Created At: {{ $patientType->created_at }}</p>

    <!-- Edit -->
    <div class="col-2">
        <a href="{{ route('patient_type.edit', $patientType->id) }}" class="btn btn-warning">Edit</a>
    </div>
    <div class="col-2">
        <!-- Delete -->
        <form action="" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>


</div>
@endsection