@extends('layouts.app')

@section('content')
<h1>Create Todo</h1>

<div class="container">
    <div class="row">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf

            <div class="form-group col-4 mt-2">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-4 mt-2">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-4 mt-2">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control @error('due_date') is-invalid @enderror" value="">
                @error('due_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-4 mt-2">
                <label for="priority">Priority</label>
                <select name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror">
                    <option value="">Select priority</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
                @error('priority')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
</div>

@endsection