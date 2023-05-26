@extends('layouts.app')

@section('content')
<div class="row p-4">
    <h1>Department Detail</h1>
    <!-- Title -->
    <p>Code: {{ $department->code }}</p>

    <!-- Description -->
    <p>Name: {{ $department->name }}</p>

    <p>Created At: {{ $department->created_at }}</p>

    <!-- Edit -->
    <div class="col-2">
        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning">Edit</a>
    </div>
    <div class="col-2">
        <!-- Delete -->
        <form action="#" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>


</div>
@endsection