<title>Email Template</title>
@extends('dashboard')
@section('content')
    <div class="col-xl">
        <div class="card mb-4">
          <div class="card-body">
            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Template Name </label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"
                    ><i class='bx bx-message-dots' ></i>
                  </span>
                  <input
                    type="text"
                    name="templatename" id="templatename"
                    class="form-control"
                    placeholder="Template Name"
                    aria-label="ACME Inc."
                    aria-describedby="basic-icon-default-company2"
                  />
                </div>
              </div>
            <div>
                <textarea name="email_template" id="email_template"></textarea>

                <script>
                    ClassicEditor
                        .create( document.querySelector( '#email_template' ) )
                        .then( editor => {
                            console.log( 'Editor was initialized', editor );
                        } )
                        .catch( error => {
                            console.error( 'Error initializing editor:', error );
                        } );
                </script>
            </div>
          </div>
        </div>
      </div>
  </form>
  <div>
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#emailSentModal">Save Template</button>
    <br>
</div>
@endsection
