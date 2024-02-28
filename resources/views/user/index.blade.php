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


        <!-- Hero Start -->
        @include('user.hero')
        <!-- Hero End -->


        <!-- Featurs Section Start -->
        @include('user.featurs')
        <!-- Featurs Section End -->


        <!-- Fruits Shop Start-->
        @include('user.fruits')
        <!-- Fruits Shop End-->


        <!-- Featurs Start -->
        @include('user.featurs2')
        <!-- Featurs End -->


        <!-- Vesitable Shop Start-->
        {{-- @include('user.vesitable') --}}
        <!-- Vesitable Shop End -->


        <!-- Banner Section Start-->
        @include('user.banner')
        <!-- Banner Section End -->


        <!-- Bestsaler Product Start -->
        @include('user.bestsaler')
        <!-- Bestsaler Product End -->


        <!-- Fact Start -->
        @include('user.fact')
        <!-- Fact Start -->


        <!-- Tastimonial Start -->
        {{-- @include('user.tastimonial') --}}
        <!-- Tastimonial End -->


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
                let vegetables ='';
                let fruits ='';
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
                                    <div class="col-md-6 col-lg-4 col-xl-3">
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
                                                    <a class="btn border border-secondary rounded-pill px-3 text-primary add-item" data-id="${product.id}"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            $("#tab-1-products").html(productCards);
                            $("#paginationP").html('');
                            for (let i = 1; i <= response.last_page; i++) {
                                $("#paginationP").append(`<li class="page-item"><a class="rounded page-link" onclick="loadProducts(${i})">${i}</a></li>`);
                            }

                        },
                        error: function () {
                        }
                    });
                }
                function loadVegetables(page) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('vegetables.index') }}",
                        dataType: "json",
                        data: {
                            page: page // Send the current page number to the backend
                        },

                        success: function (response) {
                            let vegetables = response.data
                            let vegetablesCards = ''; // Define productCards variable here
                            vegetables.forEach(vegetable => {
                                vegetablesCards += `
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <a href="/shop/product/${vegetable.id}">
                                                    <img src="{{ asset('') }}${vegetable.image}" class="img-fluid w-100 rounded-top" alt="">
                                                </a>
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Vegetables</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="/shop/product/${vegetable.id}">
                                                    <h4>${vegetable.name}</h4>
                                                </a>
                                                <p style="width: 100%; height: auto; max-height: 50px; overflow: hidden;">${vegetable.description}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$${vegetable.price} / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            $("#tab-2-products").html(vegetablesCards);
                            $("#paginationV").html('');
                            for (let i = 1; i <= response.last_page; i++) {
                                $("#paginationV").append(`<li class="page-item"><a class="rounded page-link" onclick="loadProducts(${i})">${i}</a></li>`);
                            }

                        },
                        error: function () {
                        }
                    });
                }
                function loadFruits(page) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('fruits.index') }}",
                        dataType: "json",
                        data: {
                            page: page // Send the current page number to the backend
                        },

                        success: function (response) {
                            let fruits = response.data
                            let fruitsCards = ''; // Define productCards variable here
                            fruits.forEach(fruit => {
                                fruitsCards += `
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <a href="/shop/product/${fruit.id}">
                                                    <img src="{{ asset('') }}${fruit.image}" class="img-fluid w-100 rounded-top" alt="">
                                                </a>
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Vegetables</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="/shop/product/${fruit.id}">
                                                    <h4>${fruit.name}</h4>
                                                </a>
                                                <p style="width: 100%; height: auto; max-height: 50px; overflow: hidden;">${fruit.description}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$${fruit.price} / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            $("#tab-3-products").html(fruitsCards);
                            $("#paginationF").html('');
                            for (let i = 1; i <= response.last_page; i++) {
                                $("#paginationF").append(`<li class="page-item"><a class="rounded page-link" onclick="loadProducts(${i})">${i}</a></li>`);
                            }

                        },
                        error: function () {
                        }
                    });
                }
                function loadBreats(page) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('doughs.index') }}",
                        dataType: "json",
                        data: {
                            page: page // Send the current page number to the backend
                        },

                        success: function (response) {
                            let breats = response.data
                            let BreatsCards = ''; // Define productCards variable here
                            breats.forEach(breat => {
                                BreatsCards += `
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <a href="/shop/product/${breat.id}">
                                                    <img src="{{ asset('') }}${breat.image}" class="img-fluid w-100 rounded-top" alt="">
                                                </a>
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Vegetables</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="/shop/product/${breat.id}">
                                                    <h4>${breat.name}</h4>
                                                </a>
                                                <p style="width: 100%; height: auto; max-height: 50px; overflow: hidden;">${breat.description}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$${breat.price} / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            $("#tab-4-products").html(BreatsCards);
                            $("#paginationB").html('');
                            for (let i = 1; i <= response.last_page; i++) {
                                $("#paginationB").append(`<li class="page-item"><a class="rounded page-link" onclick="loadProducts(${i})">${i}</a></li>`);
                            }

                        },
                        error: function () {
                        }
                    });
                }
                function loadMeats(page) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('meats.index') }}",
                        dataType: "json",
                        data: {
                            page: page // Send the current page number to the backend
                        },

                        success: function (response) {
                            let meats = response.data
                            let MeatsCards = ''; // Define productCards variable here
                            meats.forEach(meat => {
                                MeatsCards += `
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <a href="/shop/product/${meat.id}">
                                                    <img src="{{ asset('') }}${meat.image}" class="img-fluid w-100 rounded-top" alt="">
                                                </a>
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Vegetables</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="/shop/product/${meat.id}">
                                                    <h4>${meat.name}</h4>
                                                </a>
                                                <p style="width: 100%; height: auto; max-height: 50px; overflow: hidden;">${meat.description}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$${meat.price} / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            $("#tab-5-products").html(MeatsCards);
                            $("#paginationM").html('');
                            for (let i = 1; i <= response.last_page; i++) {
                                $("#paginationM").append(`<li class="page-item"><a class="rounded page-link" onclick="loadProducts(${i})">${i}</a></li>`);
                            }

                        },
                        error: function () {
                        }
                    });
                }

                function addItem(id) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('cart.addItem')}}",
                        data: {
                            id:id,
                            quantity:1
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        dataType: "json",
                        success: function (response) {
                        }
                    });
                }

                    $(document).ready(function () {
                        loadProducts(1);
                        loadVegetables(1)
                        loadFruits(1)
                        loadBreats(1)
                        loadMeats(1)
                        $(document).on('click', '.add-item', function() {
                            let itemId = $(this).data("id");
                            addItem(itemId)
                        });
                    });
            </script>
        @endpush







