
<title>Configuration</title>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>

@extends('dashboard')
@section('content')
<form action="config" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Mail Server</label>
      <input type="text" class="form-control" name="mailserver-config" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Gate</label>
      <input type="text" class="form-control" name="gate-config" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email address</label>
      <input type="email" class="form-control" name="email-config" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" class="form-control" name="password-config" aria-describedby="emailHelp" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>

@endsection
