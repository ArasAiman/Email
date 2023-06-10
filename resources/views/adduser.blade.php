<title>Add User</title>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

@extends('dashboard')
@section('content')
      <form action="addUser" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select class="form-control" name="role" aria-describedby="emailHelp" required>
              <option value="" selected disabled>Select role</option>
              <option value="Admin">Admin</option>
              <option value="Staff">Staff</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Designation</label>
            <input type="text" class="form-control" name="designation" aria-describedby="emailHelp" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-control" name="status" aria-describedby="emailHelp" required>
              <option value="" selected disabled>Select status</option>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>

      <div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    </form>
@endsection
