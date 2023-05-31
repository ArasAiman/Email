<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
@extends('dashboard')
@section('content')
      <form action="addEmail" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Email</button>
      </form>
@endsection



