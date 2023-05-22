@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Patient Type</h1>
        <hr>
        <form action="{{ route('departments.update', $department->id) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ $department->code }}">
                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $department->name }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @foreach($depWiseCharges as $depWiseCharge)
                <div class="form-group col-4 mt-2">                
                    <label for="{{ $depWiseCharge->code }}"><strong>{{ $depWiseCharge->code }}</strong> Price</label>
                    <input type="hidden" name="departmentwisechargeid[]" value="{{ $depWiseCharge->dep_wise_charge_id }}">
                    <input type="hidden" name="patienttypeid[]" value="{{ $depWiseCharge->id }}">
                    <input type="number" name="price[]" maxlength="100" class="form-control @error('price[]') is-invalid @enderror" 
                    value="{{ $depWiseCharge->price }}" required>
                    @error('price[]')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror                
                </div> 
            @endforeach

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
