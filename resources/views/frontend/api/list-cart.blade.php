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
    .product_thumb>a>img {
        height: 75px !important;
        width: 70px !important;
    }
</style>

<body>
    {{-- @include('frontend.layout.header') --}}
    @include('frontend.api.header-top')
    <div class="header_middel">
        <div class="row align-items-center">
            <!--logo start-->
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="#"><img src="{{ URL::asset('frontend\assets\img\logo\logo.jpg.png') }}" alt=""></a>
                </div>
            </div>
            <!--logo end-->
            <div class="col-lg-9 col-md-9">
                <div class="header_right_info">
                    <div class="search_bar">
                        <form action="#">
                            <input placeholder="Search..." type="text" disabled>
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
    </div>
    @include('frontend.api.header-bottom')

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
                                    <li><a href="/api">home</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li>Shopping Cart</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <!--breadcrumbs area end-->
                <!--shopping cart area start -->
                @if (Session::has('Cart'))
                <div class="shopping_cart_area">
                    <form action="#">
                        <div class="row">
                            <div class="col-12">
                                <div class="table_desc">
                                    <div class="cart_page table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product_thumb">Image</th>
                                                    <th class="product_name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product_quantity">Quantity</th>
                                                    <th class="product_total">Total</th>
                                                    <th class="product_remove">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_body">
                                                {{-- @if (Session::has('Cart') != null)
                                                @foreach (Session::get('Cart')->products as $item)
                                                <tr data-id="{{$item['productInfo']->id}}">
                                                    <td class="product_thumb"><a href="#"><img
                                                                src="{{ asset('dashboard/uploads/' . $item['productInfo']->img_url) }}"
                                                                alt=""></a></td>
                                                    <td class="product_name"><a
                                                            href="#"></a>{{$item['productInfo']->name}}</td>
                                                    <td class="product-price" id="price-{{$item['productInfo']->id}}">
                                                        {{number_format($item['productInfo']->price)}}
                                                    </td>
                                                    <td class="product_quantity">
                                                        <input class="quant" type="number" value="{{$item['quantity']}}"
                                                            id="quantity-item-{{$item['productInfo']->id}}" min="1"
                                                            data-id="{{$item['productInfo']->id}}">
                                                    </td>
                                                    <td class="product_total" id="total-{{$item['productInfo']->id}}">
                                                        {{number_format($item['productInfo']->price *
                                                        $item['quantity'])}}</td>
                                                    <td class="product_remove">
                                                        <a href="javascript:"><i class="fa fa-trash-o"
                                                                onclick="deleteListItem({{$item['productInfo']->id}})"></i></a>
                                                        <a href="javascript:"><i class="fa fa-floppy-o" onclick="
                                                                saveListItem({{$item['productInfo']->id}})"
                                                                id="save-cart-item-{{$item['productInfo']->id}}"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif --}}
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="cart_submit">
                                        <button id="delete_all" class="return">return all</button>
                                        <button id="update_all">update cart</button>
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
                                                <p>Total quantity</p>
                                                <p class="cart_amount" id="total_quantity">
                                                    {{number_format(Session::get('Cart')->totalQuantity)}}
                                                </p>
                                            </div>
                                            <div class="cart_subtotal">
                                                <p>Total Price</p>
                                                <p class="cart_amount" id="total_price">{{
                                                    number_format(Session::get('Cart')->totalPrice)}} đ</p>
                                            </div>
                                            <div class="checkout_btn">
                                                <a href="">Proceed to Checkout</a>
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
                @endif
            </div>
            <!--pos page inner end-->
        </div>
    </div>

    <style>
        .cart_submit .return {
            display: inline-block;
            outline: none;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700;
            line-height: 18px;
            padding: 10px 15px;
            height: 38px;
            width: 104.43px;
            min-width: 60px;
            min-height: 32px;
            border: none;
            text-transform: uppercase;
            color: #fff;
            background-color: rgb(88, 101, 242);
            transition: background-color .3s ease, color .3s ease;

            :hover {
                background-color: rgb(71, 82, 196);
            }
        }
    </style>
    <!--pos page end-->
    @include('frontend.layout.footer')

    <script src="{{ URL::asset('frontend\assets\js\vendor\jquery-1.12.0.min.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\popper.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\ajax-mail.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\plugins.js') }}"></script>
    <script src="{{ URL::asset('frontend\assets\js\main.js') }}"></script>
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
    @php
    $totalQuantity = Session::get('Cart')->totalQuantity ?? 0;
    @endphp


    <script>
        //     function deleteListItem(id) {
    //         let confirmed = confirm('Bạn có muốn xoá sản phẩm khỏi giỏ hàng không?');
    //         if(confirmed) {
    //             $.ajax({
    //             url: '/api/list-cart-delete-item/' + id,
    //             type: 'GET',
    //         }).done(function(response) {
    //             console.log('id',id);
    //             if(response) {
    //                 fetchCartData();
    //                 $(`tr[data-id="${id}"]`).remove();
    //                 alertify.success("Đã xoá sản phẩm khỏi giỏ hàng");
    //                 updateTotalQuantity();

    //             } else {
    //                 console.error('Error:', response.error);
    //                 alertify.error("Không xóa được");
    //             }
    //         })
    //     }
    // }

    function deleteListItem(id) {
    let confirmed = confirm('Bạn có muốn xoá sản phẩm khỏi giỏ hàng không?');
    if (confirmed) {
        fetch('/api/list-cart-delete-item/' + id, {
            method: 'GET'
        })
        .then(response => response.json())
        .then(response => {
            // console.log('id', id);
            if (response) {
                fetchCartData();
                document.querySelector(`tr[data-id="${id}"]`).remove();
                alertify.success("Đã xoá sản phẩm khỏi giỏ hàng");
                updateCartTotal();
            } else {
                console.error('Error:', response.error);
                alertify.error("Không xóa được");
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            alertify.error("Có lỗi xảy ra");
        });
    }
}

    function updateCartTotal() {
        fetch('http://127.0.0.1:8000/api/cart', {
            method: 'GET'
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById("total_quantity").textContent = data.totalQuantity > 0 ? `${Number(data.totalQuantity)}` : 0;
                document.getElementById("total_price").textContent = data.totalPrice > 0 ? `${Number(data.totalPrice).toLocaleString()}` : 0;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function saveListItem(id) {
        var quantity = $("#quantity-item-" + id).val();
        fetch('/api/list-cart-update-item/' + id + '/' + quantity, {
            method: 'GET'
        })
        .then(response => response.json())
        .then(data => {
            fetchCartData();
            alertify.success("Cập nhật thành công!");
            updateCartTotal();
            var price = parseFloat($("#price-" + id).text().replace(/\./g, ''));
            var newTotal = price * quantity;
            $("#total-" + id).text(newTotal.toLocaleString());
            }
        )
        .catch(error => {
            console.error('Error:', error);
        });
}

function updateAll() {
    var list = [];
        $("table tbody tr td").each(function() {
            $(this).find("input").each(function() {
                var element = { key: $(this).data("id"), value: $(this).val() };
                list.push(element);
            })
        });
        $.ajax({
            url: "list-cart-update-all",
            type: "POST",
            data: {
                "_token": "{{csrf_token()}}",
                "data" : list,
            }
        }).done(function() {
            fetchCartData();
            alertify.success("Cập nhật lại giỏ hàng");
            updateCartTotal();
            // location.reload();
            getListCart();
        })
 }

 function deleteAll() {
    var list = [];
        $("table tbody tr td").each(function() {
            $(this).find("input").each(function() {
                var element = $(this).data("id");
                list.push(element);
            })
        });
        $.ajax({
            url: "list-cart-delete-all",
            type: "GET",
            data: {
                "data" : list,
            }

        }).done(function() {
            fetchCartData();
            alertify.success("Đã trả lại hết hàng");
            updateCartTotal();
            getListCart();
        })
 }

/*
function deleteAll() {
    $.ajax({
        url: "list-cart-delete-all",
        type: "GET",
    }).done(function() {
        fetchCartData();
        alertify.success("Đã trả lại hết hàng");
        updateCartTotal();
        getListCart();
    });
}
*/
    document.getElementById('update_all').addEventListener('click', function(event) {
    event.preventDefault();
    updateAll();
});

    document.getElementById('delete_all').addEventListener('click', function(event) {
    event.preventDefault();
    deleteAll();
});

    async function getListCart() {
        let res = await fetch('http://127.0.0.1:8000/api/cart');
        let data = await res.json();

        if (data && data.products) {
            let str = data.products.map((p) => {
                return `
                <tr data-id = "${p.productInfo.id}">
                    <td class = "product_thumb"><a href = "#"><img src = "http://127.0.0.1:8000/dashboard/uploads/${p.productInfo.img_url}"></a></td>
                    <td class="product_name"><a href="#"></a>${p.productInfo.name}</td>
                    <td class="product-price" id="price-${p.productInfo.id}">${Number(p.productInfo.price).toLocaleString()}</td>
                    <td class="product_quantity">
                        <input class="quant" type="number" value="${p.quantity}" id="quantity-item-${p.productInfo.id}"
                        min="1" data-id="${p.productInfo.id}">
                    </td>
                    <td class="product_total" id="total-${p.productInfo.id}">
                        ${Number(p.productInfo.price * p.quantity).toLocaleString()}
                    </td>
                    <td class="product_remove">
                        <a href="javascript:"><i class="fa fa-trash-o" onclick="deleteListItem(${p.productInfo.id})"></i></a>
                        <a href="javascript:"><i class="fa fa-floppy-o" onclick="saveListItem(${p.productInfo.id})"
                            id="save-cart-item-${p.productInfo.id}"></i></a>
                    </td>
                </tr>
                `;
            }).join("");
            document.getElementById("table_body").innerHTML = str;
        }
    }
    getListCart();
    </script>