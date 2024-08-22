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