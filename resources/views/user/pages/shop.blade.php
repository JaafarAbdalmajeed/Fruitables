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
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Fresh fruits shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input id="searchInput" type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <div class="col-6"></div>

                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3 mt-3">
                                            <h4>Categories</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a onclick="getProducts('Apples')" ><i class="fas fa-apple-alt me-2"></i>Apples</a>
                                                        <span>(3)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a onclick="getProducts('Oranges')" ><i class="fas fa-apple-alt me-2"></i>Oranges</a>
                                                        <span>(5)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a onclick="getProducts('strawberry')" ><i class="fas fa-apple-alt me-2"></i>Strawbery</a>
                                                        <span>(2)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a onclick="getProducts('Banana')" ><i class="fas fa-apple-alt me-2"></i>Banana</a>
                                                        <span>(8)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div  class="d-flex justify-content-between fruite-name">
                                                        <a onclick="getProducts('Pumpkin')" ><i class="fas fa-apple-alt me-2"></i>Pumpkin</a>
                                                        <span>(5)</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Price</h4>
                                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="1" max="100" step="0.10" value="0" onchange="updatePriceDisplay(this.value)">
                                            <output id="amount" name="amount">0</output>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div id="tab-1-products" class="row g-4 justify-content-center">

                                </div>
                                <nav aria-label="Page navigation">
                                    <ul id="paginationF" class="pagination d-flex justify-content-center mt-5">
                                        <!-- Pagination links will be added dynamically here -->
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">Fruitables</h1>
                                <p class="text-secondary mb-0">Fresh products</p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Why People Like us!</h4>
                            <p class="mb-4">typesetting, remaining essentially unchanged. It was
                                popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                            <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Shop Info</h4>
                            <a class="btn-link" href="">About Us</a>
                            <a class="btn-link" href="">Contact Us</a>
                            <a class="btn-link" href="">Privacy Policy</a>
                            <a class="btn-link" href="">Terms & Condition</a>
                            <a class="btn-link" href="">Return Policy</a>
                            <a class="btn-link" href="">FAQs & Help</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Account</h4>
                            <a class="btn-link" href="">My Account</a>
                            <a class="btn-link" href="">Shop details</a>
                            <a class="btn-link" href="">Shopping Cart</a>
                            <a class="btn-link" href="">Wishlist</a>
                            <a class="btn-link" href="">Order History</a>
                            <a class="btn-link" href="">International Orders</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>Address: 1429 Netus Rd, NY 48247</p>
                            <p>Email: Example@gmail.com</p>
                            <p>Phone: +0123 4567 8910</p>
                            <p>Payment Accepted</p>
                            <img src="img/payment.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    function loadProducts(page) {
        $.ajax({
            type: "GET",
            url: "{{ route('products.index') }}",
            dataType: "json",
            data: {
                page: page // Send the current page number to the backend
            },

            success: function (response) {
                let products = response.data
                let productCards = ''; // Define productCards variable here
                products.forEach(product => {
                    productCards += `
                        <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <a href="/shop/product/${product.id}">
                                                        <img src="{{ asset('') }}${product.image}" class="img-fluid w-100 rounded-top" alt="">
                                                    </a>
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">${product.subcategory.category.name}</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="/shop/product/${product.id}">
                                                    <h4>${product.name}</h4>
                                                </a>
                                                <p style="width: 100%; height: auto; max-height: 50px; overflow: hidden;">${product.description}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$${product.price} / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    `;
                });
                $("#tab-1-products").html(productCards);
                $("#paginationF").html('');
                for (let i = 1; i <= response.last_page; i++) {
                    $("#paginationF").append(`<li class="m-1 pe-auto page-item"><a class="rounded page-link" onclick="loadProducts(${i})">${i}</a></li>`);
                }
            },
            error: function () {
            }
        });
    }
    function searchLetter(letter) {
        $.ajax({
            type: "GET",
            url: "{{(route('products.search'))}}", // Replace "search.php" with your server-side script URL
            data: { letter: letter },
            success: function (response) {
                let products = response
                let productCards = ''; // Define productCards variable here
                products.forEach(product => {
                    productCards += `
                        <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <a href="/shop/product/${product.id}">
                                                        <img src="{{ asset('') }}${product.image}" class="img-fluid w-100 rounded-top" alt="">
                                                    </a>
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="/shop/product/${product.id}">
                                                    <h4>${product.name}</h4>
                                                </a>
                                                <p style="width: 100%; height: auto; max-height: 50px; overflow: hidden;">${product.description}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$${product.price} / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    `;
                });
                $("#tab-1-products").html(productCards);
                $("#paginationF").html('');
                for (let i = 1; i <= response.last_page; i++) {
                    $("#paginationF").append(`<li class="m-1 pe-auto page-item"><a class="rounded page-link" onclick="loadProducts(${i})">${i}</a></li>`);
                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(error);
            }
        });
    }
    function getProducts(category) {
        $.ajax({
            type: "GET",
            url: "{{route('category.products')}}", // Update the URL to point to your endpoint
            data: { category: category },
            success: function (response) {
                    let products = response
                    let productCards = ''; // Define productCards variable here
                    products.forEach(product => {
                        productCards += `
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <a href="/shop/product/${product.id}">
                                                        <img src="{{ asset('') }}${product.image}" class="img-fluid w-100 rounded-top" alt="">
                                                    </a>
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <a href="/shop/product/${product.id}">
                                                        <h4>${product.name}</h4>
                                                    </a>
                                                    <p style="width: 100%; height: auto; max-height: 50px; overflow: hidden;">${product.description}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">$${product.price} / kg</p>
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        `;
                    });
                    $("#tab-1-products").html(productCards);
                    $("#paginationF").html('');
                    for (let i = 1; i <= response.last_page; i++) {
                        $("#paginationF").append(`<li class="m-1 pe-auto page-item"><a class="rounded page-link" onclick="loadProducts(${i})">${i}</a></li>`);
                    }
                },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(error);
            }
        });
    }

    function updatePriceDisplay(value) {
        document.getElementById("amount").textContent = "$" + value;
        getProductsPrice(value);
    }

function getProductsPrice(price) {
    $.ajax({
        type: "GET",
        url: "{{route('price.products')}}",
        data: { price: price },
        success: function (response) {
            let products = response.data;
            let productCards = ''; // Define productCards variable here
            products.forEach(product => {
                productCards += `
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <a href="/shop/product/${product.id}">
                                    <img src="{{ asset('') }}${product.image}" class="img-fluid w-100 rounded-top" alt="">
                                </a>
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <a href="/shop/product/${product.id}">
                                    <h4>${product.name}</h4>
                                </a>
                                <p style="width: 100%; height: auto; max-height: 50px; overflow: hidden;">${product.description}</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$${product.price} / kg</p>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            $("#tab-1-products").html(productCards);
            $("#paginationF").html('');
            for (let i = 1; i <= response.last_page; i++) {
                $("#paginationF").append(`<li class="m-1 pe-auto page-item"><a class="rounded page-link" onclick="loadProducts(${i})">${i}</a></li>`);
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


    $(document).ready(function () {
        loadProducts(1);
        $("#searchInput").keyup(function() {
            let letter = $(this).val().trim();
            if(letter !== '') {
                searchLetter(letter);

            } else {
                loadProducts(1);
            }


        })






    });
</script>
@endpush
