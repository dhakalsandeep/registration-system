<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Registration System</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-2"><a href="{{ route('patient_type.index') }}">Patient Type</a></div>
      <div class="col-2"><a href="{{ route('departments.index') }}">Department</a></div>
      <div class="col-2"><a href="{{ route('patients.index') }}">Patient</a></div>
    </div>
  </div>

  @yield('content')
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
  @stack('script')
  

</body>

</html>