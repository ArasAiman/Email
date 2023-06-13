
<title>Send Email</title>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
@extends('dashboard')
@section('content')
<form action="{{ route('send.email') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-xl">
        <div class="card mb-4">
          <div class="card-body">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Name</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-user'></i></span>
                  <input type="text"class="form-control" name="name" id="name" placeholder="John Doe"aria-label="John Doe"aria-describedby="basic-icon-default-fullname2"/>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">From (Email)</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-envelope' ></i></span>
                  <input
                    type="text"
                    class="form-control"
                    name="fromemail"
                    id="fromemail"
                    placeholder="abc@defg.com"
                    aria-label="John Doe"
                    aria-describedby="basic-icon-default-fullname2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">To Email</label>
                <select id="defaultSelect" name="to_email[]" id="to_email[]" class="form-select multiple-select" multiple>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "blastemail");
                    $query = "SELECT DISTINCT email FROM customers"; // Use DISTINCT to retrieve unique email addresses
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        ?>
<option onclick="selectAllEmails()">Select All</option>
<?php
                        while ($rowemail = mysqli_fetch_assoc($query_run)) {
                            ?>
                            <option value="<?php echo $rowemail['email']; ?>"><?php echo $rowemail['email']; ?></option>
                            <?php
                        }
                    } else {
                        echo "No records found";
                    }
                    ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Subject</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"
                    ><i class='bx bxs-book-alt'></i></span>
                  <input
                    type="text"
                    name="subject"
                    id="subject"
                    class="form-control"
                    placeholder="Subject"
                    aria-label="ACME Inc."
                    aria-describedby="basic-icon-default-company2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Message </label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"
                    ><i class='bx bx-message-dots' ></i>
                  </span>
                  <input
                    type="text"
                    name="message" id="message"
                    class="form-control"
                    placeholder="Message"
                    aria-label="ACME Inc."
                    aria-describedby="basic-icon-default-company2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Attachment</label>
                <input class="form-control" type="file" name="attachment" id="attachment" multiple />
              </div>
              <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#emailSentModal">Send</button>


          </div>
        </div>
      </div>
  </form>
  <div class="modal fade" id="emailSentModal" tabindex="-1" aria-labelledby="emailSentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-success text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="emailSentModalLabel">Email Sent</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Your email has been successfully sent.</p>
            </div>
        </div>
    </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script>

      $(".multiple-select").select2({
          includeSelectAllOption: true,
});
  </script>
<script>
  function selectAllEmails() {
      var selectElement = document.getElementById("multiple-checkboxes");
      var options = selectElement.options;
      var selectAllOption = options[0];

      if (selectAllOption.selected) {
          for (var i = 1; i < options.length; i++) {
              options[i].selected = true;
          }
      } else {
          for (var i = 1; i < options.length; i++) {
              options[i].selected = false;
          }
      }
  }
  </script>


@endsection

