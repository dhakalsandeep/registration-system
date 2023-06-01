@extends('layouts.app')

@section('content')
    @push('css')
        <style>
            .uploaded-image {
                height: 200px;
                width: 200px;
            }
        </style>
    @endpush


    <h1>Register New Patient</h1>

    <div class="container">

        <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-4 mt-2">
                    <label for="hospitalno">Hospital No</label>
                    <input type="text" name="hospitalno" id="hospitalno"
                        class="form-control @error('hospitalno') is-invalid @enderror" value="{{ $hospitalNo }}" readonly>
                    @error('hospitalno')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-4 mt-2">
                    <label for="department">Department</label>
                    <select class="form-control" name="department" id="department">
                        <option value="0">Please Select Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-4 mt-2">
                    <label for="department">Patient Type</label>
                    <select class="form-control" name="patient_type" id="patient_type">
                        <option value="0">Please Select Patient Type</option>
                        @foreach ($patientTypes as $patientType)
                            <option value="{{ $patientType->id }}">{{ $patientType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-4 mt-2">
                    <label for="charge">Charge</label>
                    <input type="text" class="form-control" id="charge" value="0" readonly>
                </div>

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
                    <input type="text" name="firstname" maxlength="100" id="firstname"
                        class="form-control @error('firstname') is-invalid @enderror" value="" required>
                    @error('firstname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-4 mt-2">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" maxlength="100" id="lastname"
                        class="form-control @error('lastname') is-invalid @enderror" value="" required>
                    @error('lastname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-4 mt-2">
                    <label for="dob">DOB</label>
                    <input type="date" name="dob" maxlength="100" id="dob"
                        class="form-control @error('dob') is-invalid @enderror" value="" required>
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
                    <input type="number" name="mobileno" minlength="10" maxlength="10" id="mobileno"
                        class="form-control @error('mobileno') is-invalid @enderror" value="" required>
                    @error('mobileno')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-4 mt-2">
                    <label for="address">Address</label>
                    <input type="text" name="address" maxlength="100" id="address"
                        class="form-control @error('address') is-invalid @enderror" value="" required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-4 mt-2">
                    <label for="profilepic">PP</label>
                    <input type="file" name="profilepic" id="profilepic"
                        class="form-control @error('profilepic') is-invalid @enderror" accept="image/*" required>
                    @error('profilepic')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div id="selected-file"></div>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Create</button>
            </div>
        </form>
    </div>

    @push('script')
        <script>
            const fileInput = document.querySelector('#profilepic');
            const selectedFileDiv = document.querySelector('#selected-file');
            const departmentSelect = document.querySelector('#department');
            const patientTypeSelect = document.querySelector('#patient_type');
            const chargeInput = document.querySelector('#charge');

            fileInput.addEventListener('change', function() {
                const file = fileInput.files[0];

                if (file) {
                    const fileReader = new FileReader();

                    fileReader.addEventListener('load', function() {
                        const image = new Image();
                        image.src = fileReader.result;
                        image.classList.add('uploaded-image');

                        selectedFileDiv.innerHTML = '';
                        selectedFileDiv.appendChild(image);
                    });

                    fileReader.readAsDataURL(file);
                } else {
                    selectedFileDiv.innerHTML = 'No file selected';
                }
            });

            const getDepartmentWiseCharge = () => {
                let department = departmentSelect.value;
                let patientType = patientTypeSelect.value;

                console.log('am i here', department, patientType);

                if (department == 0 || patientType == 0) return;

                let param = {
                    department,
                    patientType
                };

                axios.post(`{{ route('patients.get_department_wise_charge') }}`, param)
                    .then(function(response) {
                        chargeInput.value = response.data.charge;
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
                    .finally(function() {
                        console.log('async await finally completed');
                    });
            }

            departmentSelect.addEventListener('change', getDepartmentWiseCharge);
            patientTypeSelect.addEventListener('change', getDepartmentWiseCharge);
        </script>
    @endpush
@endsection
