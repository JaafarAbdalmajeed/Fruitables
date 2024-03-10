@extends('layouts.admin')

@section('content')

@include('admin.user.create')
@include('admin.user.edit')
@include('admin.user.assign')

<button class="mb-2 btn btn-success btn-create" data-bs-toggle="modal" data-bs-target="#createModal">Create</button>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" id="searchInput" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="button" id="searchBtn" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap" id="productTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Deleted At</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        function loadTable(){
            $.ajax({
                type: "GET",
                url: "{{route('admin.user.fetch')}}",

                dataType: "json",
                success: function (response) {
                    table = ''
                    response.forEach(user => {
                        table += `
                        <tr>
                            <td>${user.id}</td>
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td>${user.role}</td>
                            <td>${user.created_at}</td>
                            <td>${user.updated_at}</td>
                            <td>${user.deleted_at}</td>
                            <td><button class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#editModal' id="btn-edit" data-id=${user.id} data-name=${user.name} data-email=${user.email} data-role=${user.role}>Edit</button></td>
                            <td><button class="btn btn-danger" id="btn-delete" data-id="${user.id}">Delete</button></td>
                        </tr>
                        `;
                        $("table tbody").html(table);
                    });
                }
            });
        }

        function createUser(formDate) {
            $.ajax({
                type: "POST",
                url: "{{route('admin.user.create')}}",
                data: formDate,
                processData: false,
                contentType: false,

                dataType: "json",
                success: function (response) {

                Swal.fire({
                    icon: 'success',
                    title: 'User Created!',
                    text: response.message
                });

                    loadTable();
                    $('#createModel').modal('hide');
                    $("#name").val('');
                    $("#email").val('');
                    $("#role").val('');
                    $("#password").val('');
                    $("#password-repeat").val('');

                    resetCreateForm()
                },
                error: function (xhr, status, error) {
                    var errorMessage = "Error occurred while creating the user. Please try again later.";

                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMessage = xhr.responseJSON.errors.join('<br>');
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        html: errorMessage
                    });
                }

            });
        }

        function updateUser(formDate) {
            $.ajax({
                type: "POST",
                url: "{{route('admin.user.update')}}",
                data: formDate,
                processData: false,
                contentType: false,

                dataType: "json",
                success: function (response) {
                    Swal.fire({
                    icon: 'success',
                    title: 'User Created!',
                    text: response.message
                });
                    loadTable();
                    $('#editModel').modal('hide');
                    resetCreateForm()
                    $("#editId").val('');
                    $("#editName").val('');
                    $("#editEmail").val('');
                    $("#editRole").val('');

                },
                error: function (xhr, status, error) {
                    var errorMessage = "Error occurred while creating the user. Please try again later.";

                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMessage = xhr.responseJSON.errors.join('<br>');
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        html: errorMessage
                    });
                }
            });
        }

        function deleteUser(id) {
            $.ajax({
                type: "DELETE",
                url: "{{ route('admin.user.delete') }}",
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function (response) {
                    loadTable();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message
                    });
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while deleting the user.'
                    });
                }
            });
        }
        function resetCreateForm() {
            $('#name').val('');
            $('#description').val('');
            $('#price').val('');
            $('#quantity').val('');
            $('#image').val('');
            $('#listCategories').val('');
        }


        $(document).ready(function () {
            loadTable()
            $("#create-submit").on("click", function (event) {
                event.preventDefault();
                let name = $("#name").val();
                let email = $("#email").val();
                let role = $("#role").val();
                let password = $("#password").val();
                let passwordRepeat = $("#password-repeat").val();

                let formData = new FormData()
                formData.append('name', name);
                formData.append('email', email);
                formData.append('role', role);
                formData.append('password', password);
                formData.append('passwordRepeat', passwordRepeat);
                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                formData.append('_token', csrfToken);

                createUser(formData);
            });



            $(document).on("click", "#btn-edit", function () {
                let id = $(this).data("id");
                let name = $(this).data("name");
                let email = $(this).data("email");
                let role = $(this).data("role");
                $("#editId").val(id);
                $("#editName").val(name);
                $("#editEmail").val(email);
                $("#editRole").val(role);
            });
            $(document).on("click", "#btn-delete" ,function() {
                let id = $(this).data("id");
                alert(id)

                // Show SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this user!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                        deleteUser(id);

                });
            });



            $("#edit-submit").click(function(event){
                event.preventDefault();
                let id = $("#editId").val();
                let name = $("#editName").val();
                let email = $("#editEmail").val();
                let role = $("#editRole").val();
                let formData = new FormData()
                formData.append('id', id);
                formData.append('name', name);
                formData.append('email', email);
                formData.append('role', role);
                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                formData.append('_token', csrfToken);
                updateUser(formData);
            })

        });
    </script>
@endpush
