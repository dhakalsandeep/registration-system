@extends('layouts.app')

@section('content')
<h1>Register New Patient</h1>

<div class="container">
    <div class="row">
        <form action="{{ route('patients.store') }}" method="POST">
            @csrf

            <div class="form-group col-4 mt-2">
                <label for="title">Title</label>
                <select class="form-control" name="title" id="title">
                    <option value="0">Please Select Title</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Dr">Dr</option>
                    <option value="Prof Dr">Prof Dr</option>
                </select>
            </div>

            <div class="form-group col-4 mt-2">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" maxlength="100" id="firstname" class="form-control @error('firstname') is-invalid @enderror" value="" required>
                @error('firstname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> 

            <div class="form-group col-4 mt-2">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" maxlength="100" id="lastname" class="form-control @error('lastname') is-invalid @enderror" value="" required>
                @error('lastname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> 

            <div class="form-group col-4 mt-2">
                <label for="dob">DOB</label>
                <input type="date" name="dob" maxlength="100" id="dob" class="form-control @error('dob') is-invalid @enderror" value="" required>
                @error('dob')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> 

            <div class="form-group col-4 mt-2">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="0">Please Select Gender</option>
                    <option value="MALE">MALE</option>
                    <option value="FEMALE">FEMALE</option>
                    <option value="OTHER">OTHER</option>
                </select>
            </div>

            <div class="form-group col-4 mt-2">
                <label for="mobileno">Mobile No</label>
                <input type="number" name="mobileno" minlength="10" maxlength="10" id="mobileno" class="form-control @error('mobileno') is-invalid @enderror" value="" required>
                @error('mobileno')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group col-4 mt-2">
                <label for="address">Address</label>
                <input type="text" name="address" maxlength="100" id="address" class="form-control @error('address') is-invalid @enderror" value="" required>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
</div>

@endsection