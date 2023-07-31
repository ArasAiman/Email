<title>Email Template</title>
@extends('dashboard')

@section('content')
<div class="row">
    <div class="col-md-6 col-lg-4 mb-3">
        <div class="border p-3">
            <h5>Template 1</h5>
            @include('Emails.template1')
        </div>
    </div>

    <div class="col-md-6 col-lg-4 mb-3">
        <div class="border p-3">
            <h5>Template 2</h5>
            @include('Emails.template2')
        </div>
    </div>
</div>
@endsection

