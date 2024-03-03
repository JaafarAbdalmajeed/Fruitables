@extends('layouts.user')

@section('content')
@include('user.navbar')

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
            <h1 class="text-center text-white display-6">Checkout</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Checkout</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Billing details</h1>
                <form action="#">
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                        <input type="text" class="form-control firstname" name="fname">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                                        <input type="text" class="form-control lastname" name="lname">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3 ">Address <sup>*</sup></label>
                                <input type="text" class="form-control address" name="address" placeholder="House Number Street Name">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3 ">City<sup>*</sup></label>
                                <input type="text" class="form-control city" name="city">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Country<sup>*</sup></label>
                                <input type="text" class="form-control country" name="country">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                                <input type="text" class="form-control postcode">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Mobile<sup>*</sup></label>
                                <input type="tel" class="form-control mobile" name="mobile">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Email Address<sup>*</sup></label>
                                <input type="email" class="form-control email" name="email">
                            </div>
                            <hr>
                            <div class="form-item">
                                <textarea name="order-note" class="form-control order-note" spellcheck="false" cols="30" rows="11" placeholder="Oreder Notes (Optional)"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-5">
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
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Transfer-1" name="Transfer" value="Transfer">
                                        <label class="form-check-label" for="Transfer-1">Direct Bank Transfer</label>
                                    </div>
                                    <p class="text-start text-dark">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Payments-1" name="Payments" value="Payments">
                                        <label class="form-check-label" for="Payments-1">Check Payments</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1" name="Delivery" value="Delivery">
                                        <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1" name="Paypal" value="Paypal">
                                        <label class="form-check-label" for="Paypal-1">Paypal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="button" id="btn-place-order" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary place">Place Order</button>
                                <a href="" type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-success razorpay_btn">pay with Razorpay</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->


        <!-- Footer Start -->
        @include('user.footer')
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    function fetchData() {
        $.ajax({
            type: "GET",
            url: "/checkout/fetch",
            dataType: "json",
            success: function(response) {
                var totalPrice = 0;
                var cartItems = '';

                response.forEach(item => {
                    var itemTotal = item.quantity * item.product.price;
                    totalPrice += itemTotal;

                    cartItems += `
                        <tr>
                            <td>
                                <div class="d-flex align-items-center mt-2">
                                    <img src="{{asset('')}}${item.product.image}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                </div>
                            </td>
                            <td class="py-5">${item.product.name}</td>
                            <td class="py-5">$${item.product.price.toFixed(2)}</td>
                            <td class="py-5">${item.quantity}</td>
                            <td class="py-5">$${itemTotal.toFixed(2)}</td>
                        </tr>
                    `;
                });

                cartItems += `
                    <tr>
                        <td colspan="4" class="py-5">Subtotal</td>
                        <td class="py-5">$${totalPrice.toFixed(2)}</td>
                    </tr>
                `;

                cartItems += `
                    <tr>
                        <td colspan="4" class="py-5">Shipping</td>
                        <td class="py-5">
                            <div class="form-check text-start">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-1" name="Shipping-1" value="Free Shipping">
                                <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                            </div>
                            <div class="form-check text-start">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-2" name="Shipping-2" value="Flat Rate: $15.00">
                                <label class="form-check-label" for="Shipping-2">Flat rate: $15.00</label>
                            </div>
                            <div class="form-check text-start">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-3" name="Shipping-3" value="Local Pickup: $8.00">
                                <label class="form-check-label" for="Shipping-3">Local Pickup: $8.00</label>
                            </div>
                        </td>
                    </tr>
                `;

                cartItems += `
                    <tr>
                        <td colspan="4" class="py-5"><strong>Total</strong></td>
                        <td class="py-5"><strong>$${totalPrice.toFixed(2)}</strong></td>
                    </tr>
                `;

                $("table tbody").html(cartItems);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    fetchData();

    $(".razorpay_btn").click(function (e) {
        e.preventDefault();
        var firstname = $(".firstname").val();
        var lastname = $(".lastname").val();
        var address = $(".address").val();
        var city = $(".city").val();
        var country = $(".country").val();
        var postcode = $(".postcode").val();
        var mobile = $(".mobile").val();
        var email = $(".email").val();
        var order_note = $(".order-note").val();

        $.ajax({
            type: "POST",
            url: "/proceed-to-pay",
            data: {
                firstname: firstname,
                lastname: lastname,
                address: address,
                city: city,
                country: country,
                postcode: postcode,
                mobile: mobile,
                email: email,
                order_note: order_note
            },
            success: function (response) {
                alert(response.total_price);
            }
        });
    });

    $("#btn-place-order").click(function (e) {
            e.preventDefault();

            var firstname = $(".firstname").val();
            var lastname = $(".lastname").val();
            var address = $(".address").val();
            var city = $(".city").val();
            var country = $(".country").val();
            var postcode = $(".postcode").val();
            var mobile = $(".mobile").val();
            var email = $(".email").val();
            var order_note = $(".order-note").val();

            $.ajax({
                type: "POST",
                url: "{{ route('place-order') }}",
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    address: address,
                    city: city,
                    country: country,
                    postcode: postcode,
                    mobile: mobile,
                    email: email,
                    order_note: order_note,
                    "_token": "{{ csrf_token() }}" // Add CSRF token
                },
                success: function (response) {
                    alert("Order placed successfully!");
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Error placing order. Please try again.");
                }
            });
        });
});


</script>

@endpush
