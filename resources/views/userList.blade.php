<title>User List</title>
@extends('dashboard')

@section('content')
<div class="card">
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->designation}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->status}}</td>
                <td>
                    <form action="{{ url('/userList', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection


{{-- @extends('dashboard')

@section('content')
    <div class="d-flex justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->designation}}</td>
                    <td>{{$user->status}}</td>
                    <td>
                        <form action="{{ url('/userList', $user->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection --}}
