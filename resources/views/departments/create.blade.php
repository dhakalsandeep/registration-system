@extends('layouts.app')

@section('content')
<h1>Create Department</h1>

<div class="container">
    <div class="row">
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf

            <div class="form-group col-4 mt-2">
                <label for="code">Code</label>
                <input type="text" name="code" maxlength="10" id="code" class="form-control @error('code') is-invalid @enderror" value="" required>
                @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-4 mt-2">
                <label for="name">Name</label>
                <input type="text" name="name" maxlength="100" id="name" class="form-control @error('name') is-invalid @enderror" value="" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> 
            
            @foreach($patientTypes as $patientType)
                <div class="form-group col-4 mt-2">                
                    <label for="{{ $patientType->code }}"><strong>{{ $patientType->code }}</strong> Price</label>
                    <input type="hidden" name="patienttypeid[]" value="{{ $patientType->id }}">
                    <input type="number" name="price[]" maxlength="100" id="{{$patientType->code}}" class="form-control @error('name') is-invalid @enderror" value="" required>
                    @error('price[]')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror                
                </div> 
            @endforeach

            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
</div>

@endsection