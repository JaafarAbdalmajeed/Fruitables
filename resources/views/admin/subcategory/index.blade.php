@extends('layouts.admin')

@section('title', 'Subcategory')
@section('content')

@include('admin.subcategory.create')
@include('admin.subcategory.edit')
@include('admin.subcategory.assign')

<button class="mb-2 btn btn-success btn-create" data-bs-toggle="modal" data-bs-target="#createModal">Create</button>
<button class="mb-2 btn btn-success btn-assign" data-bs-toggle="modal" data-bs-target="#assignModal">Assign</button>

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Subcategories</h3>

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
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Category</td>
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
    <!-- /.card-body -->
  </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI library (sortable module is included) -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


<script>

        function loadTable() {
                $.ajax({
                    type: "GET",
                    url: "{{route('subcategory.fetch')}}",
                    dataType: "json",
                    success: function(response) {
                        var tableRows = "";
                        $.each(response, function(index, subcategory) {
                            tableRows += "<tr>";
                            tableRows += "<td>" + subcategory.id + "</td>";
                            tableRows += "<td>" + subcategory.name + "</td>";
                            tableRows += "<td>" + subcategory.category.name + "</td>";
                            tableRows += "<td>" + subcategory.created_at + "</td>";
                            tableRows += "<td>" + subcategory.updated_at + "</td>";
                            tableRows += "<td>" + subcategory.deleted_at + "</td>";
                            tableRows += "<td><button class='btn btn-primary btn-edit' data-bs-toggle='modal' data-bs-target='#editModal' data-id='" + subcategory.id + "' data-name='"+ subcategory.name + "' >Edit</button></td>";
                            tableRows += "<td><button class='btn btn-danger btn-delete' data-id='" + subcategory.id + "'>Delete</button></td>";
                            tableRows += "</tr>";
                        });
                        $("table tbody").html(tableRows);
                        $("#createModal").modal("hide");
                    }
                });
            }

        function loadCategories(list) {
            $.ajax({
                type: "GET",
                url: "{{route('category.fetch')}}",
                dataType: "json",
                success: function (response) {
                    response.forEach(category => {
                        $(`#${list}`).append(
                            `<option value="${category.id}">${category.name}</option>`
                        );
                    });
                }
            });
        }
        function loadSubcategories() {
            $.ajax({
                type: "GET",
                url: "{{route('subcategory.fetch')}}",
                dataType: "json",
                success: function (response) {
                    response.forEach(subcategory => {
                        $('#listSubcategories').append(
                            `<option value="${subcategory.id}">${subcategory.name}</option>`
                        );
                    });

                }
            });
        }
        function deleteSubcategory(subcategoryId) {
            $.ajax({
                type: "DELETE",
                url: "{{route('subcategory.delete')}}",
                data: {
                    id:subcategoryId
                },
                dataType: "json",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    loadTable();
                    console.log(response)
                },
                error: function(response) {
                    console.log(response)
                }
            });
        }

        function updateSubcategory(subcategoryName, subcategoryId){
            $.ajax({
                method:"PUT",
                url:"{{route('subcategory.update')}}",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: subcategoryId,
                    name:subcategoryName
                },
                dataType: "json",
                success: function() {
                    loadTable();

                    $("#editModal").modal("hide");
                    $("#editInputName").val('');
                    $("#editInputId").val('');

                },
                error: function() {

                    $("#editModal").modal("hide");
                    $("#editInputName").val('');
                    $("#editInputId").val('');

                }
            })
        }

$(document).ready(function () {
    loadTable();

    $(".btn-create").click(function () {
        $("#createModal").modal("show");
        loadCategories("listCategoriesCreate")
    });

    $(document).on("click", ".btn-edit", function () {
        var subcategoryId = $(this).data('id');
        var subcategoryName = $(this).data('name');
        $('#editInputName').val(subcategoryName);
        $('#editInputId').val(subcategoryId);
        $("#editModal").modal("show");
    });

    $(".btn-assign").click(function () {

        $("#assignModal").modal("show");
        loadCategories("listCategories")
        loadSubcategories()
    });

    $("#assignModal").on("hidden.bs.modal", function() {
        $("#listCategories").empty();
        $("#listSubcategories").empty();

        $('#listCategories').append(
            `<option value="">Choose</option>`
        );

        $('#listSubcategories').append(
            `<option value="">Choose</option>`
        );

    });

    $("#createModal").on("hidden.bs.modal", function() {
        $("#listCategoriesCreate").empty();
        $('#listCategoriesCreate').append(
            `<option value="">Choose</option>`
        );
    });

    $("#create-submit").click(function(event){
        event.preventDefault();
        var subcategory = $("#createInputName").val();
        var category = $("#listCategoriesCreate").val();
        $.ajax({
            method:"POST",
            url:"{{route('subcategory.create')}}",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                name: subcategory,
                category_id: category,
            },
            dataType: "json",
            success: function() {
                loadTable();

                $("#createModal").modal("hide");
                $("#createInputName").val('');
                $("#listCategoriesEdit").val('');

            },
            error: function() {

                $("#createModal").modal("hide");
                $("#createInputName").val('');
                $("#listCategoriesEdit").val('');

            }
        })
    })

    $("#edit-submit").click(function(event){
        event.preventDefault();
        var subcategoryName = $("#editInputName").val();
        var subcategoryId = $("#editInputId").val();
        updateSubcategory(subcategoryName, subcategoryId)
    })

    $("#assign-submit").click(function(event){
        event.preventDefault();
        var category = $("#listCategories").val();
        var subcategory = $("#listSubcategories").val();
        $.ajax({
            method:"POST",
            url:"{{route('subcategory.assign')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                category_id: category,
                subcategory_id: subcategory,
            },
            dataType:"json",
            success: function() {
                $("#assignModal").modal("hide");
                swal("Success!", "Subcategory assigned to category.", "success");
                $("#listCategories").val('');
                $("#listSubcategories").val('');

            },
            error: function() {
                $("#assignModal").modal("hide");
                swal("Error!", "An error occurred while assigning subcategory.", "error");
            }
        })
    })

    $(document).on('click', '.btn-delete', function() {
            var subcategoryId = $(this).data('id');
            deleteSubcategory(subcategoryId);
        });
});
</script>
@endpush

