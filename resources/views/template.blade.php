<title>Email Template</title>
@extends('dashboard')
@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="post" action="{{ route('email_template.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Template Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bx-message-dots'></i></span>
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
                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#emailSentModal">Save Template</button>    <br>
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
                                                <button type="button" class="btn btn-warning mt-2" onclick="openEditModal('{{ $template->name }}', '{{ $template->content }}')">Edit</button>
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

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="editTemplateName">Template Name</label>
                        <input type="text" name="editTemplateName" id="editTemplateName" class="form-control" placeholder="Template Name">
                    </div>
                    <div>
                        <textarea name="editTemplateContent" id="editTemplateContent"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveEditedTemplate()">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

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

    function openEditModal(templateName, templateContent) {
        // Set template name and content in the modal
        document.getElementById('editTemplateName').value = templateName;
        document.getElementById('editTemplateContent').value = templateContent;

        // Open the modal
        var myModal = new bootstrap.Modal(document.getElementById('editModal'));
        myModal.show();

        // Initialize CKEditor inside the modal
        if (!editor) {
            ClassicEditor
                .create(document.querySelector('#editTemplateContent'))
                .then(newEditor => {
                    editor = newEditor;
                    console.log('Editor was initialized', editor);
                })
                .catch(error => {
                    console.error('Error initializing editor:', error);
                });
        }
    }

    function saveEditedTemplate() {
        // Get edited template name and content from the modal
        var editedTemplateName = document.getElementById('editTemplateName').value;
        var editedTemplateContent = document.getElementById('editTemplateContent').value;

        // Update the template name and content on the main page
        document.getElementById('templatename').value = editedTemplateName;
        if (editor) {
            editor.setData(editedTemplateContent);
        }

        // Close the modal
        var myModal = new bootstrap.Modal(document.getElementById('editModal'));
        myModal.hide();
    }
</script>
