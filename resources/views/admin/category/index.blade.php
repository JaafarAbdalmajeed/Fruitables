@extends('layouts.admin')

@section('title', 'Category')

@section('content')
@include('admin.category.create')
@include('admin.category.edit')

<button class="mb-2 btn btn-success btn-create" data-bs-toggle="modal" data-bs-target="#createModal">Create</button>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Categories</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Created At</td>
                    <td>Updated At</td>
                    <td>Deleted At</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    function deleteCategory(categoryId) {
        $.ajax({
            type: "DELETE",
            url: "{{ route('category.delete') }}",
            data: {
                id: categoryId,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                loadTable();
                console.log(response);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error(xhr.responseText);
            }
        });
    }

    function editCategory(categoryId, categoryName) {
        alert(categoryId)
        alert(categoryName)
        $.ajax({
            type: "PUT",
            url: "{{ route('category.update') }}",
            data: {
                id: categoryId,
                name: categoryName
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function(response) {
                loadTable();
                console.log(response);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error(xhr.responseText);
            }
        });
    }

    function loadTable() {
        $.ajax({
            type: "GET",
            url: "{{route('category.fetch')}}",
            dataType: "json",
            success: function(response) {
                var tableRows = "";
                $.each(response, function(index, category) {
                    tableRows += "<tr>";
                    tableRows += "<td>" + category.id + "</td>";
                    tableRows += "<td>" + category.name + "</td>";
                    tableRows += "<td>" + category.created_at + "</td>";
                    tableRows += "<td>" + category.updated_at + "</td>";
                    tableRows += "<td>" + category.deleted_at + "</td>";
                    tableRows += "<td><button class='btn btn-primary btn-edit' data-bs-toggle='modal' data-bs-target='#editModal' data-id='" + category.id + "'>Edit</button></td>";
                    tableRows += "<td><button class='btn btn-danger btn-delete' data-id='" + category.id + "'>Delete</button></td>";
                    tableRows += "</tr>";
                });
                $("table tbody").html(tableRows);
                $("#createModal").modal("hide");
            }
        });
    }

    $(document).ready(function() {
        loadTable();


        $(document).on('click', '.btn-edit', function() {
            var categoryId = $(this).data('id');
            var categoryName = $(this).closest('tr').find('td:eq(1)').text();
            $('#editInputName').val(categoryName);
            $('#editInputId').val(categoryId);
            $('#editModal').modal('show');
        });

        $(document).on('submit', '#createForm', function(event) {
            event.preventDefault();
            var category = $("#createInputName").val();
            $.ajax({
                type: "POST",
                url: "{{route('category.create')}}",
                data: {
                    name: category,
                },
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    loadTable();
                    $('#createInputName').val('');
                    console.log(response);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error(xhr.responseText);
                    $('#createInputName').val('');

                }
            });
        });

        $(document).on('click', '.btn-delete', function() {
            var categoryId = $(this).data('id');
            deleteCategory(categoryId);
        });

        $(document).on('submit', '#editForm', function(event) {
            event.preventDefault();
            var categoryId = $("#editInputId").val();
            var categoryName = $("#editInputName").val();
            editCategory(categoryId, categoryName);
        });
    });
</script>
@endpush
