@include('frontend.layout.header')

<style>
    .nav-item a {
        color: black !important;
    }

    .sidebar img {
        max-width: 100%;
    }

    .validation-error {
        color: red;
    }
    td img {
        width: 240px;
        height: 240px;
    }
    .form-group.in {
        display: flex;
        flex-direction: column;
    }

    .form-group.in .form-select {
        flex-grow: 1;
    }

    /* .form-group .btn {
        width: fit-content;
        display: inline-block;
        margin-right: 10px;
    } */

</style>
<div class="container row">
    <form class="col-8 offset-2" method="POST" action="{{ route('cart.showCheckout.pay')}}">
        @csrf
        <div class="form-group in mb-2">
            <label class="form-label">Name: </label>
            <input value="" name="name" class="form-control" type="text"
                placeholder="Enter name"  id="name"/>
        </div>
        <div class="form-group in mb-2">
            <label class="form-label">Country: </label>
            <select name="country_id" class="form-select"  id="country_id">
                <option value="2">bangladesh</option>
                <option value="3">Algeria</option>
                <option value="4">Afghanistan</option>
                <option value="5">Ghana</option>
                <option value="6">Albania</option>
                <option value="7">Bahrain</option>
                <option value="8">Colombia</option>
                <option value="9">Dominican Republic</option>
            </select>
        </div>
        <div class="form-group in mb-2">
            <label class="form-label">Street Address: </label>
            <input value="" name="street" class="form-control" type="text"
                placeholder="Enter street"  id="street"/>
        </div>
        <div class="form-group in mb-2">
            <label class="form-label">Town/ City: </label>
            <input value="" name="city" class="form-control" type="text"
                placeholder="Enter town/city"  id="city"/>
        </div>
        <div class="form-group in mb-2">
            <label class="form-label">Phone: </label>
            <input value="" name="phone" class="form-control" type="text"
                placeholder="Enter phone"  id="phone"/>
        </div>
        <div class="form-group in mb-2">
            <label class="form-label">Email: </label>
            <input value="" name="email" class="form-control" type="email"
                placeholder="Enter email"  id="email"/>
        </div>
        <div class="form-group mb-2">
            <a href="{{ route('cart.showCheckout.pay')}}" style="text-decoration: none">
                <button class="btn btn-primary">Proceed to pay</button>
            </a>
            <div class="btn btn-dark" >Cancel</div>
        </div>
    </form>
</div>
    <script>
        document.querySelector('.btn-dark').addEventListener('click', function() {
            document.getElementById('name').value = '';
            document.getElementById('price').value = '';
            document.getElementById('image').value = '';
            document.getElementById('category_id').value = '1';
        });
    </script>
@include('frontend.layout.footer')
<script src="{{ URL::asset('frontend\assets\js\vendor\jquery-1.12.0.min.js') }}"></script>
<script src="{{ URL::asset('frontend\assets\js\popper.js') }}"></script>
<script src="{{ URL::asset('frontend\assets\js\bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('frontend\assets\js\ajax-mail.js') }}"></script>
<script src="{{ URL::asset('frontend\assets\js\plugins.js') }}"></script>
<script src="{{ URL::asset('frontend\assets\js\main.js') }}"></script>

<link rel="stylesheet" href="{{ URL::asset('frontend\assets\css\bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('frontend\assets\css\plugin.css') }}">
<link rel="stylesheet" href="{{ URL::asset('frontend\assets\css\bundle.css') }}">
<link rel="stylesheet" href="{{ URL::asset('frontend\assets\css\style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('frontend\assets\css\responsive.css') }}">
<script src="{{ URL::asset('frontend\assets\js\vendor\modernizr-2.8.3.min.js') }}"></script>

