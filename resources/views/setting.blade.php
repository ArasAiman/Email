<title>Send Email</title>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
@extends('dashboard')
@section('content')
<form action="{{ route('editUser') }}" method="POST">
    @csrf
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-notifications.html"
              ><i class="bx bx-bell me-1"></i> Notifications</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-connections.html"
              ><i class="bx bx-link-alt me-1"></i> Connections</a
            >
          </li>
        </ul>
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img
                src="Assets/assets/img/avatars/1.png"
                alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar"
              />
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Upload new photo</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input
                    type="file"
                    id="upload"
                    class="account-file-input"
                    hidden
                    accept="image/png, image/jpeg"
                  />
                </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                  <i class="bx bx-reset d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Reset</span>
                </button>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
              <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-icon-default-fullname">Name</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class='bx bx-server'></i></span>
                      <input type="text"class="form-control" name="name" id="name" placeholder="Ali Bin Ahmad"aria-label="John Doe"aria-describedby="basic-icon-default-fullname2"/>
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-icon-default-fullname">Role</label>
                    <select id="defaultSelect" name="role" id="role" class="form-select multiple-select">
                        <option value="" selected disabled>Select role</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
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
                  <div class="mb-3 col-md-6">
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
                  <div class="mb-3 col-md-6">
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
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-icon-default-fullname">Status</label>
                    <select id="defaultSelect" name="status" id="status" class="form-select multiple-select">
                        <option value="" selected disabled>Select status</option>
                        <option value="Active">Active</option>
                        <option value="Not Active">Not Active</option>
                    </select>
                  </div>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
      </div>
    </div>
  </div>
</form>
@endsection


