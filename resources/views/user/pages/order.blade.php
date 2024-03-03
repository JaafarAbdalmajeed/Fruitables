@extends('layouts.user')

@section('content')
        <!-- Navbar start -->
        @include('user.navbar')
        <!-- Navbar End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Order</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Order</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p id="total-price" class="mb-0">$96.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $3.00</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Ukraine.</p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p id="total-price-shipping" class="mb-0 pe-4">$99.00</p>
                            </div>
                            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Footer End -->
        @include('user.footer')

        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
            function fetchData() {
                totalPrice = 0
                $.ajax({
                    type: "GET",
                    url: "/order/fetch",
                    dataType: "json",
                    success: function (response) {
                        var orderItems = ''; // Initialize the variable to store table rows
                        response.forEach(item => {
                            totalPrice += (item.quantity * item.product.price)
                            orderItems += `
                                <tr data-item-id="${item.product.id}">
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('') }}${item.product.image}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">${item.product.name}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">${item.product.price} $</p>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                            </div>
                                            <input type="text" id="quantity-${item.quantity}"  class="form-control form-control-sm text-center border-0" value="${item.quantity}">
                                            <div class="input-group-btn">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">${(item.quantity * item.product.price).toFixed(2)} $</p>
                                    </td>
                                </tr>
                            `;
                        });


                        // Insert the generated HTML into the table body
                        $("table tbody").html(orderItems);
                        $("#total-price").text((totalPrice).toFixed(2))
                        $("#total-price-shipping").text((totalPrice + 3).toFixed(2))


                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
        }

        $(document).ready(function () {
            fetchData()

        });
</script>
@endpush
