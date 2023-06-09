<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

@extends('dashboard')
@section('content')
      <form action="addCustomer" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select class="form-control" name="role" aria-describedby="emailHelp" required>
              <option value="" selected disabled>Select role</option>
              <option value="active">Admin</option>
              <option value="inactive">Staff</option>
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
            <label class="form-label">Status</label>
            <select class="form-control" name="status" aria-describedby="emailHelp" required>
              <option value="" selected disabled>Select status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>

      <div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    </form>
@endsection
