@extends('layouts.admin')

@section('title', 'Order')

@section('content')
@include('admin.order.create')
@include('admin.order.edit')

<a href="{{route('order.history.index')}}" class="btn btn-warning float-end m-2">Orders History</a>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Orders</h3>

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
                    <td>Order Date</td>
                    <td>Tracking Number</td>
                    <td>Total Price</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Summernote -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script>
    function loadTable() {
            $.ajax({
                type: "GET",
                url: "{{ route('order.fetch') }}",
                dataType: "json",

                success: function (response) {
                    var tableBody = '';

                    response.forEach(order => {
                        var date = new Date(order.created_at);
                        var formattedDate = `${date.getDate()}-${date.getMonth() + 1}-${date.getFullYear()}`;

                        tableBody += `
                        <tr>
                            <td>${formattedDate}</td>
                            <td>${order.id}</td>
                            <td>${order.tracking_no}</td>
                            <td>${order.total_price}</td>
                            <td>${order.status === '0' ? 'pending' : 'completed'}</td>
                            <td><a href="view-order-details/${order.id}" class="btn btn-danger delete-btn">View</a></td>
                        </tr>
                        `;
                    });
                    $('tbody').html(tableBody);
                }
            });
    }

    function updateProduct(formData){
            $.ajax({
                type: "POST",
                url: "{{route('order.update')}}",
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
                url: "{{route('order.delete')}}",
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

    $(document).ready(function () {
        loadTable()

        $(document).on('click', '.delete-btn', function() {
                var orderId = $(this).data('id');
                deleteOrder(orderId);
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

            $("#edit-submit").click(function(event) {
                event.preventDefault();

                let id = $('#orderId').val();


                let formData = new FormData();
                formData.append('id', id);

                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                formData.append('_token', csrfToken);

                updateOrder(formData);
            });

    });



</script>
@endpush
