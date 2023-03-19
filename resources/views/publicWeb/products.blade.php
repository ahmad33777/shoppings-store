@extends('publicWeb.layouts.productLayout')
@section('content')
<!-- Navigation -->
<nav class="nav">
    <div class="navigation container">
        <div class="logo">
            <h1>Nouh Store</h1>
        </div>

        <div class="menu">
            <div class="top-nav">
                <div class="logo">
                    <h1>Nouh Store</h1>
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




    </div>
</nav>

<!-- All Products -->
<section class="section all-products" id="products" style="padding-top: 0px; margin-bottom: 100px;">
    <div class="top container">
        <h1>All Products </h1>
        <form action="{{ url('ecommerce/products/search/'.$store_id) }}" method="POST">
            @csrf
            <input type="text" name="search" placeholder="Search value">
            <button type="submit">search</button>
        </form>
    </div>
    <div class="product-center container">
        @if($products->count()<=0) <h1>This store is Empty</h1> @endif
            @foreach($products as $product) <div class="product">
                <div class="product-header">
                    <img src="{{$product->image}}" alt="">
                    <ul class="icons">
                        <a href="{{ url('ecommerce/product/Details/'.$product->id) }}">
                            <span><i class="bx bx-show"></i></span>
                        </a>

                    </ul>
                </div>
                <div class="product-footer">
                    <a href="{{ url('ecommerce/product/Details/'.$product->id)}}">
                        <h3>{{ $product->name}}</h3>
                    </a>
                    <h4 class="price">Price : ${{ $product->base_price }} </h4>
                    @if($product->flag == 1 )
                    <h4 class="price" style="color:#243a6f; font-size: 12px;"> <i class="bx bxs-star"></i>
                        Discount : %{{ $product->discount_price }} </h4>
                    @endif
                </div>
            </div>
            @endforeach
    </div>

</section>


@stop