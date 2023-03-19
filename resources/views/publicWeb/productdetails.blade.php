@extends('publicWeb.layouts.productLayout')
@section('content')
<nav class="nav">
    <div class="navigation container">
        <div class="logo">
            <h1>Nouh Store</h1>
        </div>

        <div class="menu">
            <div class="top-nav">
                <div class="logo">
                    <h1>Nouh store</h1>
                </div>
                <div class="close">
                    <i class="bx bx-x"></i>
                </div>
            </div>

            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{url('ecommerce/home')}}" class="nav-link">Home</a>
                </li>
            </ul>
        </div>
        <a href="{{url('ecommerce/home')}}" class="cart-icon">
            <i class="bx ">Home</i>
        </a>


    </div>
</nav>
<div class="container">
    @if(session()->has('status'))
    @if(session('status'))
    <div class="alert  alert-success" role="alert"> Purchase completedy </div>
    @else
    <div class="alert  alert-danger" role="alert">Purchase not completed/div>
    </div>
    @endif
    @endif




    <!-- Product Details -->
    <section class="section product-detail">
        <div class="details container-md">
            <div class="left">
                <div class="main">
                    <img src="{{   $product->image}}" alt="">
                </div>

            </div>
            <div class="right">
                <h1> {{ $product->name }}</h1>
                <h3 class="price">Base price : ${{ $product->base_price}} </h3>
                @if($product->flag == 1 )
                <span style="font-weight: bold;"> Discount : % {{ $product->discount_price}}</span>
                <h4 class="price"><i class="bx bxs-star"></i> The price after discount :
                    ${{ $product->base_price -($product->base_price*( $product->discount_price/100 ))}}
                </h4>

                @endif
                <form action="{{ url('ecommerce/products/purchaseTransactio/'.$product->id) }}" method="POST"
                    class="form" id="form_submit_id">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="button" id="buy_id" class="addCart" style="border: none;">Buy</button>
                </form>
                <h3>Description</h3>
                <p>
                    {{ $product->description}}
                </p>
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script type="text/javascript">
    $('#buy_id').click(function(e) {
        e.preventDefault();
        var confarmValue = confirm('Are you sure to buy');
        if (confarmValue) {
            $('#form_submit_id').submit();
        }
    });
    </script>


    @stop