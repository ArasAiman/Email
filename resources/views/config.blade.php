
<title>Email Configuration</title>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
@extends('dashboard')
@section('content')
<form action="config" method="POST">
    @csrf
    <div class="col-xl">
        <div class="card mb-4">
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Mail Server</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-server'></i></span>
                  <input type="text"class="form-control" name="mailserver-config" id="mailserver-config" placeholder="smtp.gmail.com"aria-label="John Doe"aria-describedby="basic-icon-default-fullname2"/>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Gate</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-server'></i></span>
                  <input
                    type="text"
                    class="form-control"
                    name="gate-config"
                    id="gate-config"
                    placeholder="123"
                    aria-label="John Doe"
                    aria-describedby="basic-icon-default-fullname2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Email Address</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-envelope'></i>
                  </span>
                  <input
                    type="text"
                    class="form-control"
                    name="email-config"
                    id="email-config"
                    placeholder="abcd@efgh.com"
                    aria-label="John Doe"
                    aria-describedby="basic-icon-default-fullname2"
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
                    type="text"
                    name="password-config"
                    id="password-config"
                    class="form-control"
                    placeholder=""
                    aria-label="ACME Inc."
                    aria-describedby="basic-icon-default-company2"
                  />
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Configure</button>
            </form>
          </div>
        </div>
      </div>
  </form>

@endsection
