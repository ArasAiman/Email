<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
    <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
              <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
              <form id="login-form" method="POST" action="{{ route('login') }}">
              @csrf
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                  </label>
                </div>
                <div class="d-grid">
                    <a href="#" class="btn btn-primary btn-login text-uppercase fw-bold" onclick="event.preventDefault(); document.getElementById('login-form').submit();">Sign in</a>

                </div>

                <hr class="my-4">
                <div class="d-grid mb-2">
                    <a href="{{ route('google.login') }}" class="btn btn-google btn-login text-uppercase fw-bold">
                        <i class="fab fa-google me-2"></i> Sign in with Google
                      </a>

                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
<style>
body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

.btn-google {
  color: white !important;
  background-color: #ea4335;
}

.btn-facebook {
  color: white !important;
  background-color: #3b5998;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
