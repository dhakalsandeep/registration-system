@extends('layouts.app')

@section('content')
    <!-- Title -->
    <h1>{{ $todo->title }}</h1> 

    <!-- Description -->
    <p>{{ $todo->description }}</p>

    <ul>
        <li>Due Date: {{ date('Y-m-d', strtotime($todo->due_date)) }} </li>
        <li>Priority: {{ $todo->priority }}</li>
    </ul>

    <!-- Edit -->
    <a href="" class="btn btn-warning">Edit</a>
    <!-- Delete -->
    <form action="" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
