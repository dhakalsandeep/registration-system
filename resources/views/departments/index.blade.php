@extends('layouts.app')

@section('content')

<div class="row p-4">
    <h1>Department</h1>

    <div class="col-2">
        <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add Department</a>
    </div>
    @if (count($departments))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sn</th>
                <th>Code</th>
                <th>Name</th>
                <th>Charge</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $department->code }}</td>                
                <td>{{ $department->name }}</td>
                <td>
                    @foreach ($department->departmentWiseCharge as $departmentWiseCharge)
                        {{ $departmentWiseCharge->patientType->code }} - {{ $departmentWiseCharge->price }} <br>    
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('departments.show', $department->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline">
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