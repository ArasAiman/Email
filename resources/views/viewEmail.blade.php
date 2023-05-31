<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
@extends('dashboard')
@section('content')
<table class="table">
    <tbody>
        @foreach ($viewemail as $email)
        <tr>
            <td>{{ $email['email'] }}</td>
            <td>
            <!-- ... -->
<form action="{{ route('email.delete', $email['id']) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
<!-- ... -->

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
