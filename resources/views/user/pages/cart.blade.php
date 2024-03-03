@extends('layouts.user')

@section('content')
        <!-- Navbar start -->
        @include('user.navbar')
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
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
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
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
                            <a href="{{route('user.checkout')}}" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">Proceed Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->





        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        totalPrice = 0
        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/cart/fetch",
                dataType: "json",
                success: function (response) {
                    var cartItems = ''; // Initialize the variable to store table rows
                    response.forEach(item => {
                        totalPrice += (item.quantity * item.product.price)
                        cartItems += `
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
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="updateQuantity(${item.id}, 'minus', ${item.quantity})">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" id="quantity-${item.quantity}"  class="form-control form-control-sm text-center border-0" value="${item.quantity}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="updateQuantity(${item.id}, 'plus', ${item.quantity})">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">${(item.quantity * item.product.price).toFixed(2)} $</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" onclick="removeItem(${item.id})">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });


                    // Insert the generated HTML into the table body
                    $("table tbody").html(cartItems);
                    $("#total-price").text((totalPrice).toFixed(2))
                    $("#total-price-shipping").text((totalPrice).toFixed(2))
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        function updateQuantity(id, action, quantity) {

            if (action === 'minus' && quantity > 1) {
                quantity--; // Decrease quantity if action is 'minus' and quantity is greater than 1
            } else if (action === 'plus') {
                quantity++; // Increase quantity if action is 'plus'
            }

            $.ajax({
                type: "POST", // or "PUT" if your route and controller method expect PUT requests
                url: "{{ route('cart.quantity') }}",
                data: {
                    id: id,
                    quantity: quantity
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function(response) {
                    var cartItems = ''; // Initialize the variable to store table rows
                    response.cartItems.forEach(item => {
                        cartItems += `
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
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="updateQuantity(${item.id}, 'minus', ${item.quantity})">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" id="quantity-${item.id}" class="form-control form-control-sm text-center border-0" value="${item.quantity}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="updateQuantity(${item.id}, 'plus', ${item.quantity})">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">${(item.quantity * item.product.price).toFixed(2)} $</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" onclick="removeItem(${item.id})">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    // Insert the generated HTML into the table body
                    $("table tbody").html(cartItems);
                },

                error: function (xhr, status, error) {
                    // Handle error response
                    console.error('AJAX Error:', error);
                    alert("Failed to update quantity. Please try again later.");
                }
            });
        }

        function removeItem(id) {
            alert(id)
            $.ajax({
                type: "DELETE",
                url: `/cart/delete/${id}`,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    fetchData();
                }
            });
        }
        $(document).ready(function () {
            fetchData()

        });
    </script>
@endpush
