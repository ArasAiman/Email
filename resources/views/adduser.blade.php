<title>Add User</title>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
@extends('dashboard')
@section('content')
<form action="addUser" method="POST">
    @csrf
    <div class="col-xl">
        <div class="card mb-4">
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Name</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-server'></i></span>
                  <input type="text"class="form-control" name="name" id="name" placeholder="Ali Bin Ahmad"aria-label="John Doe"aria-describedby="basic-icon-default-fullname2"/>
                </div>
              </div>
              @if ($errors->any())
              <div class="modal fade show" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="errorModalLabel">Errors</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
              </div>
              <script>
                  window.onload = function () {
                      $('#errorModal').modal('show');
                  }
              </script>
          @endif
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Role</label>
                <select id="defaultSelect" name="role" id="role" class="form-select multiple-select">
                    <option value="" selected disabled>Select role</option>
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Designation</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-envelope'></i>
                  </span>
                  <input
                    type="text"
                    class="form-control"
                    name="designation"
                    id="designation"
                    placeholder=""
                    aria-label="John Doe"
                    aria-describedby="basic-icon-default-fullname2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Email</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"
                    ><i class='bx bx-envelope'></i></i
                  ></span>
                  <input
                    type="text"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="abc@defg.com"
                    aria-label="ACME Inc."
                    aria-describedby="basic-icon-default-company2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Password</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"
                    ><i class='bx bx-envelope'></i></i
                  ></span>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder=""
                    aria-label="ACME Inc."
                    aria-describedby="basic-icon-default-company2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Status</label>
                <select id="defaultSelect" name="status" id="status" class="form-select multiple-select">
                    <option value="" selected disabled>Select status</option>
                    <option value="Active">Active</option>
                    <option value="Not Active">Not Active</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>
      </div>
  </form>

@endsection














{{-- @extends('dashboard')
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
@endsection --}}
