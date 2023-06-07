<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
@extends('dashboard')
@section('content')
    <form action="{{ route('send.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="From (Email)" name="from_email" id="fromemail">
        </div>

        <div class="mb-3">
            <select class="form-select form-select-sm multiple-select" aria-label=".form-select-sm example" name="to_email[]" id="multiple-checkboxes" multiple>
                <?php
                $con = mysqli_connect("localhost", "root", "", "blastemail");
                $query = "SELECT DISTINCT email FROM customers"; // Use DISTINCT to retrieve unique email addresses
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    ?>
                    <option value="all" onclick="selectAllEmails()">Select All</option> <!-- Add onclick event -->
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
            <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject">
        </div>

        <div class="mb-3">
            <textarea class="form-control" placeholder="Message" name="message" id="message" style="height: 100px;"></textarea>
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02" name="attachment">
        </div>

        <button type="submit" class="btn btn-primary">Send Email</button>
    </form>

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
