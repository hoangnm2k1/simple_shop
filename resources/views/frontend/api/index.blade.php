{{--
<!doctype html> --}}
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('frontend\assets\img\favicon.png') }}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ URL::asset('frontend\assets\css\bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend\assets\css\plugin.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend\assets\css\bundle.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend\assets\css\style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend\assets\css\responsive.css') }}">
    <script src="{{ URL::asset('frontend\assets\js\vendor\modernizr-2.8.3.min.js') }}"></script>

</head>

<body>

    <!-- Add your site or application content here -->

    <!--pos page start-->
    <div class="pos_page">
        <div class="container">
            <div class="pos_page_inner">
                <!--header area -->
                <div class="header_area">
                    @include('frontend.api.header-top')
                    {{-- <div class="header_middel">
                        <div class="row align-items-center">
                            <!--logo start-->
                            <div class="col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="index.html"><img
                                            src="{{ URL::asset('frontend\assets\img\logo\logo.jpg.png') }}" alt=""></a>
                                </div>
                            </div>
                            <!--logo end-->
                            <div class="col-lg-9 col-md-9">
                                <div class="header_right_info">
                                    <div class="search_bar">
                                        <form action="#">
                                            <input placeholder="Search..." type="text">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                    <div class="shopping_cart">
                                        <!--mini cart-->
                                        @include('frontend.api.cart')
                                        <!--mini cart end-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @include('frontend.api.header-middel')
                    @include('frontend.api.header-bottom')
                </div>

                <!--header end -->
                <div class=" pos_home_section">
                    <div class="row pos_home">
                        <div class="col-lg-3 col-md-8 col-12">
                            @include('frontend.layout.sidebar')
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <!--banner slider start-->
                            @include('frontend.layout.slide')
                            <!--banner slider start-->
                            {{-- @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif --}}
                            {{-- content --}}
                            <!--new product area start-->
                            <div class="new_product_area">
                                <div class="block_title">
                                    <h3>New Products</h3>
                                </div>
                                <div class="row">
                                    <div class="product_active owl-carousel" id="new-products"></div>
                                </div>
                            </div>
                            <!--new product area start-->

                            <!--featured product start-->
                            <div class="featured_product">
                                <div class="block_title">
                                    <h3>Featured Products</h3>
                                </div>
                                <div class="row">
                                    <div class="product_active owl-carousel" id="featured-products">
                                    </div>
                                </div>
                            </div>
                            <!--featured product end-->
                            <!--banner area start-->
                            @include('frontend.layout.banner')
                            <!--banner area end-->

                            <!--brand logo strat-->
                            @include('frontend.layout.logo')
                            <!--brand logo end-->
                        </div>
                    </div>
                </div>
                <!--pos home section end-->
            </div>
            <!--pos page inner end-->
        </div>
    </div>
    <!--pos page end-->

    <!--footer area start-->
    @include('frontend.api.detail')
    <!--footer area end-->

    <!-- modal area start -->


    <!-- modal area end -->

    <!-- all js here -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        fetch('http://127.0.0.1:8000/api/new-products')
            .then(response => response.json())
            .then(data => {
                let str = data.map((p) => {
                    return `
                        <div class="col-lg-3">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a href="javascript:"><img src="/dashboard/uploads/${p.img_url}" alt=""></a>
                                    <div class="product_action">
                                        <button class="btn-add-to-cart" onclick = "addToCart(${p.id}, 1)"><a href = "javascript:"><i class="fa fa-shopping-cart"></i> Add to cart</a></button>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <span class="product_price">${p.price}</span>
                                    <h3 class="product_title"><a href="javascript:">${p.name}</a></h3>
                                </div>
                                <div class="product_info">
                                    <ul>
                                        <li><a href="javascript:" title="Add to Wishlist" class="wishList">Add to Wishlist</a></li>
                                        <li><a href="" data-toggle="modal" data-target="#modal_box" title="Quick view" onclick="getDetail(${p.id})">View Detail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `;
                }).join("");
                document.getElementById("new-products").innerHTML = str;
            });

        fetch('http://127.0.0.1:8000/api/featured-products')
            .then(response => response.json())
            .then(data => {
                let str = data.map((p) => {
                    return `
                        <div class="col-lg-3" >
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a href="javascript:"><img src="/dashboard/uploads/${p.img_url}" alt=""></a>
                                    <div class="product_action">
                                        <button class="btn-add-to-cart" onclick = "addToCart(${p.id}, 1)"><a href = "javascript:"><i class="fa fa-shopping-cart"></i> Add to cart</a></button>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <span class="product_price">${p.price}</span>
                                    <h3 class="product_title"><a href="single-product.html">${p.name}</a></h3>
                                </div>
                                <div class="product_info">
                                    <ul>
                                        <li><a href="javascript:" title="Add to Wishlist" class="wishList">Add to Wishlist</a></li>
                                        <li><a href="" data-toggle="modal" data-target="#modal_box" title="Quick view" onclick="getDetail(${p.id})">View Detail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `;
                }).join("");
                document.getElementById("featured-products").innerHTML = str;
            });


    </script>

    <script>
        //     function addToCart(id, quantity) {
    //     $.ajax({
    //         url: 'http://127.0.0.1:8000/api/cart/' + id + '/' + quantity,
    //         type: 'GET',
    //     }).done(function(response) {
    //         // console.log('Response:', response);
    //         if(response.products) {
    //             fetchCartData();
    //             alertify.success("Đã thêm sản phẩm vào giỏ");
    //         } else {
    //             console.error('Error:', response.error);
    //         }
    //     })
    // }

    function addToCart(id, quantity) {
        fetch(`http://127.0.0.1:8000/api/cart/${id}/${quantity}`)
            .then(response => response.json())
            .then(data => {
                console.log('Response:', data);
                if(data.products) {
                    fetchCartData();
                    alertify.success("Đã thêm sản phẩm vào giỏ");
                } else {
                    console.error('Error:', data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    $(document).on('click', '.wishList', function() {
        alertify.alert("Chức năng này chưa được cập nhật.", function(){
            alertify.message('OK');
        })
    });

    function getDetail(id) {
        fetch('http://127.0.0.1:8000/api/detail-product/' + id)
        .then(response => response.json())
        .then(data => {
            let str =
                `<div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="/dashboard/uploads/${data.img_url}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>${data.name}</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">${Number(data.price).toLocaleString()}đ</span>
                                </div>
                                <div class="modal_content mb-10">
                                    <p>${data.category.name}</p>
                                </div>
                                <div class="modal_add_to_cart mb-15">
                                    <form action="#">
                                        <input min="1" max="100" value="1" type="number" name="quantity" id="quantity-${id}">
                                        <a href="javascript:" class="btn-add-in-detail" onclick="addToCart(${id}, document.getElementById('quantity-${id}').value)">add to cart</a>
                                     </form>
                                </div>
                                <div class="modal_description mb-15">
                                    <p>Mua đi, sự mua của bạn là niềm vui của chúng tôi</p>
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            document.getElementById('show').innerHTML = str;
        })
    }

    /* product activation */
    $( window ).on( "load", function() {
        event.preventDefault();
        $('.product_active').owlCarousel({
            animateOut: 'fadeOut',
            loop: true,
            nav: true,
            autoplay: false,
            autoplayTimeout: 8000,
            items: 3,
            dots: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                1200: {
                    items: 3,
                },
            }
        });
    })
    </script>

    <script src="{{ URL::asset('frontend\assets\js\vendor\jquery-1.12.0.min.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\popper.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\ajax-mail.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\plugins.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\main-copy.js') }}"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />

</body>
<style>
    .product_thumb>a>img {
        height: 370px !important;
        width: 310px !important;
    }

    .product_action>a>button {
        color: white;
        background-color: #018576;
        font-size: inherit;
        font-size: 13px;
    }

    .btn-add-to-cart {
        border: 1px solid #018576;
        width: 100%;
        padding: 0;
    }

    li a span {
        position: absolute;
        top: 5px;
        margin-left: 1px;
    }

    .modal_social ul li a {
        /* display: inline-block; */
        display: grid;
        place-items: center;
    }

    .modal_tab_img a img {
        height: 370px;
        width: 310px;
    }

    .btn-add-in-detail {
        background: none;
        border: 1px solid #444;
        margin-left: 10px;
        font-size: 12px;
        font-weight: 700;
        height: 38px;
        line-height: 18px;
        padding: 10px 15px;
        text-transform: uppercase;
        background: #444;
        color: #fff;
        border-radius: 5px;
        -webkit-transition: .3s;
        transition: .3s;
        cursor: pointer;
    }
</style>

{{--

</html> --}}