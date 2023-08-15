<title>Email Template</title>
@extends('dashboard')
@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="post" action="{{ route('email_template.store') }}">
                    @csrf
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
                                .create(document.querySelector('#email_template'))
                                .then(editor => {
                                    console.log('Editor was initialized', editor);
                                })
                                .catch(error => {
                                    console.error('Error initializing editor:', error);
                                });
                        </script>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#emailSentModal">Save Template</button>    <br>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @php
        $emailTemplates = \App\Models\EmailTemplate::all();
    @endphp

    @if($emailTemplates->count() > 0)
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Saved Email Templates</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($emailTemplates as $template)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $template->name }}</h5>
                                        <div>{!! $template->content !!}</div>
                                        <form method="post" action="{{ route('email_template.destroy', $template->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mt-2">Delete</button>
                                        </form>
                                        <div>
                                            <button type="button" class="btn btn-warning mt-2" onclick="populateTemplate('{{ $template->name }}', '{{ $template->content }}')">pop</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    var editor;

    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#email_template'))
        .then(newEditor => {
            editor = newEditor;
            console.log('Editor was initialized', editor);
        })
        .catch(error => {
            console.error('Error initializing editor:', error);
        });

    function populateTemplate(templateName, templateContent) {
        // Set template name
        document.getElementById('templatename').value = templateName;

        // Log template content for debugging
        console.log('Template content:', templateContent);

        // Set CKEditor content
        if (editor) {
            editor.setData(templateContent);
        }
    }
</script>








