<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Coron - Fashion eCommerce Bootstrap4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <style>
        .product_thumb > a > img {
            height: 75px !important;
            width: 70px !important;
        }
    </style>
    <body>
    @include('frontend.layout.header')

    <!-- Add your site or application content here -->

    <!--pos page start-->
    <div class="pos_page">
        <div class="container">
            <!--pos page inner-->
            <div class="pos_page_inner">
                <!--header area -->
                <!--header end -->
                    <!--breadcrumbs area start-->
                <div class="breadcrumbs_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <ul>
                                    <li><a href="index.html">home</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li>Shopping Cart</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <!--breadcrumbs area end-->



                    <!--shopping cart area start -->
                <div class="shopping_cart_area">
                    <form action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table_desc">
                                        <div class="cart_page table-responsive">
                                            <table>
                                        <thead>
                                            <tr>
                                                <th class="product_remove">Delete</th>
                                                <th class="product_thumb">Image</th>
                                                <th class="product_name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{ dd(Session::get('_token'))}} --}}
                                            @foreach ($cart->cartDetails as $c)

                                                <tr>
                                                    <td class="product_remove">
                                                        <a href="{{ route('cart.deleteCart', [$c->id])}}" onclick="return confirm('Wanna delete?')"><i class="fa fa-trash-o"></i></a>

                                                    </td>
                                                    <td class="product_thumb"><a href="#"><img src="{{ asset('dashboard/uploads/'.$c->product->img_url) }}" alt=""></a></td>
                                                    <td class="product_name"><a href="#"></a>{{ $c->product->name }}</td>
                                                    <td class="product-price" id="price">{{ $c->price }}</td>
                                                    <td class="product_quantity">
                                                        <input class="quant" onchange="handleChange(this, {{$c->id}}, '{{ Session::get('_token') }}')" data-cart-id="{{ $c->id }}" min="1" max="100" value="{{ $c->quantity }}" type="number">
                                                    </td>
                                                    <td class="product_total" id="total">{{ $c->quantity * $c->price }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        </div>
                                        <div class="cart_submit">
                                            <button type="submit">update cart</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!--coupon code area start-->
                            <div class="coupon_area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="coupon_code">
                                            <h3>Coupon</h3>
                                            <div class="coupon_inner">
                                                <p>Enter your coupon code if you have one.</p>
                                                <input placeholder="Coupon code" type="text">
                                                <button type="submit">Apply coupon</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="coupon_code">
                                            <h3>Cart Totals</h3>
                                            <div class="coupon_inner">
                                                <div class="cart_subtotal">
                                                    <p>Subtotal</p>
                                                    <p class="cart_amount">£215.00</p>
                                                </div>
                                                <div class="cart_subtotal ">
                                                    <p>Shipping</p>
                                                    <p class="cart_amount"><span>Flat Rate:</span> £255.00</p>
                                                </div>
                                                <a href="#">Calculate shipping</a>

                                                <div class="cart_subtotal">
                                                    <p>Total</p>
                                                    <p class="cart_amount">£215.00</p>
                                                </div>
                                                <div class="checkout_btn">
                                                    <a href="{{ route('cart.showCheckout') }}">Proceed to Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--coupon code area end-->
                        </form>
                    </div>
                    <!--shopping cart area end -->

            </div>
            <!--pos page inner end-->
        </div>
    </div>

    <!--pos page end-->
    @include('frontend.layout.footer')
    <script src="{{ URL::asset('frontend\assets\js\vendor\jquery-1.12.0.min.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\popper.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\ajax-mail.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\plugins.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\main.js') }}"></script>

    <script>
        function handleChange(e, idProduct, token){
            window.location.assign(`/cart/update-cart?token=${token}&id=${idProduct}&quantity=${e.value}`);
            // location.reload(true);


        }
    </script>
