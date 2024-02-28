@extends('layouts.admin')

@section('content')

@include('admin.product.create')
@include('admin.product.edit')
@include('admin.product.assign')

<button class="mb-2 btn btn-success btn-create" data-bs-toggle="modal" data-bs-target="#createModal">Create</button>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Products</h3>

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
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap" id="productTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category</th>
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
        <!-- /.card-body -->
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function createProduct(formData) {
            $.ajax({
                type: "POST",
                url: "{{route('product.create')}}",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (response) {

                    $('#createModal').modal('hide');
                    loadTable();
                    let name = $('#name').val('');
                    $('#description').val('');
                    $('#price').val('');
                    $('#quantity').val('');
                    $('#image').val('');
                    $('#listCategories').val('');
                },
                error: function (xhr, status, error) {
                    console.error(error);
                    let name = $('#name').val('');
                    $('#description').val('');
                    $('#price').val('');
                    $('#quantity').val('');
                    $('#image').val('');
                    $('#listCategories').val('');

                }
            });
        }
        function updateProduct(formData){
            $.ajax({
                type: "POST",
                url: "{{route('product.update')}}",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,

                success: function (response) {
                    $('#editModal').modal('hide');
                    loadTable();
                    $('#prductId').val('');
                    $('#editName').val('');
                    $('#editDescription').val('');
                    $('#editPrice').val('');
                    $('#editQuantity').val('');
                    $('#listCategoriesEdit').val('');
                    $('#editImageInput').val('');
                },
                error: function(response) {
                    $('#editModal').modal('hide');
                    $('#prductId').val('');
                    $('#editName').val('');
                    $('#editDescription').val('');
                    $('#editPrice').val('');
                    $('#editQuantity').val('');
                    $('#listCategoriesEdit').val('');
                    $('#editImageInput').val('');

                }
            });
        }

        function deleteProduct(productId){
            $.ajax({
                type: "DELETE",
                url: "{{route('product.delete')}}",
                data: {
                    id:productId
                },
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function (response) {
                    loadTable();
                }
            });
        }


        function loadSubcategories(list){
            $.ajax({
                type: "GET",
                url: "{{route('subcategory.fetch')}}",
                dataType: "json",
                success: function (response) {
                    response.forEach(subcategory => {
                        $(`#${list}`).append(
                            `<option value="${subcategory.id}">${subcategory.name}</option>`
                        );
                    });
                }
            });
        }

        function loadTable() {
            $.ajax({
                type: "GET",
                url: "{{ route('product.fetch') }}",
                dataType: "json",
                success: function (response) {
                    var tableBody = '';
                    response.forEach(product => {
                        tableBody += `
                        <tr>
                            <td>${product.id}</td>
                            <td><img src="{{ asset('') }}${product.image}" alt="Product Image" width="100"></td>
                            <td>${product.name}</td>
                            <td >${product.description}</td>
                            <td>${product.price}</td>
                            <td>${product.quantity}</td>
                            <td>${product.subcategory.name}</td>
                            <td>${product.created_at}</td>
                            <td>${product.updated_at}</td>
                            <td>${product.deleted_at}</td>
                            <td><button class="btn btn-primary edit-btn" data-name="${product.name}" data-id="${product.id}" data-description="${product.description}" data-price="${product.price}" data-quantity="${product.quantity}" data-image="${product.image}">Edit</button></td>
                            <td><button class="btn btn-danger delete-btn" data-id="${product.id}">Delete</button></td>
                        </tr>
                        `;
                    });
                    $('#productTable tbody').html(tableBody);
                }
            });
        }

        $(document).ready(function () {
            loadTable();

            $('.btn-create').click(function() {
                loadSubcategories('listCategories')
            });

            $('.btn-assign').click(function() {
                $('#assignModal').modal('show');
            });

            $(document).on('click', '.edit-btn', function() {
                $('#editModal').modal('show');
                loadSubcategories('listCategoriesEdit')

                var productId = $(this).data('id');
                var productName = $(this).data('name');
                var productDescription = $(this).data('description');
                var productPrice = $(this).data('price');
                var productQuantity = $(this).data('quantity');
                var productImage = $(this).data('image');

                $('#productId').val(productId);
                $('#editName').val(productName);
                $('#editDescription').val(productDescription);
                $('#editPrice').val(productPrice);
                $('#editQuantity').val(productQuantity);
                $('#editImageView').attr('src', `{{asset('${productImage}')}}`);


            });

            $(document).on('click', '.delete-btn', function() {
                var productId = $(this).data('id');
                deleteProduct(productId);
            });

            $('#searchBtn').click(function() {
                var searchTerm = $('#searchInput').val();
            });

            $("#createModal").on("hidden.bs.modal", function() {
                $("#listCategories").empty();
                $('#listCategories').append(
                    `<option value="">Choose</option>`
                );
            })

            $("#editModal").on("hidden.bs.modal", function() {
                $("#listCategoriesEdit").empty();
                $('#listCategoriesEdit').append(
                    `<option value="">Choose</option>`
                );
            })


            $('#create-submit').click(function (event) {
                event.preventDefault();
                let name = $('#name').val();
                let description = $('#description').val();
                let price = $('#price').val();
                let quantity = $('#quantity').val();
                let image = $('#image').prop('files')[0];
                let category = $('#listCategories').val();

                // Create FormData object
                let formData = new FormData();
                formData.append('name', name);
                formData.append('description', description);
                formData.append('price', price);
                formData.append('quantity', quantity);
                formData.append('image', image);
                formData.append('subcategory_id', category);
                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                formData.append('_token', csrfToken);


                createProduct(formData);
            });

            $("#edit-submit").click(function(event) {
                event.preventDefault();

                let id = $('#productId').val();
                let name = $('#editName').val();
                let description = $('#editDescription').val();
                let price = $('#editPrice').val();
                let quantity = $('#editQuantity').val();
                let subcategory = $('#listCategoriesEdit').val();

                let image = $('#editImageInput').prop('files')[0];

                let formData = new FormData();
                formData.append('id', id);
                formData.append('name', name);
                formData.append('description', description);
                formData.append('price', price);
                formData.append('quantity', quantity);
                if (image) {
                    formData.append('image', image);
                }
                if (subcategory) {
                    formData.append('subcategory_id', subcategory);
                }
                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                formData.append('_token', csrfToken);

                updateProduct(formData);
            });
        });
    </script>
@endpush
