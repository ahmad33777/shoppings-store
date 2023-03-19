@extends('publicWeb.layouts.mainlayout')
@section('content')


<!-- Featured -->
<section class="section featured">
    <div class="title">
        <h1>All Stores </h1>
    </div>

    <div class="product-center container">
        @foreach($stores as $store)
        <div class="product">
            <div class="product-header">
                <img src="{{ $store->logo }}" alt="">
                <ul class="icons">
                    <a href="{{url('ecommerce/products/'. $store->id)}}">
                        <span><i class="bx bx-show"></i></span>
                    </a>
                </ul>
            </div>
            <div class="product-footer">
                <a href="{{url('ecommerce/products/'. $store->id)}}">
                    <h3>{{ $store->name}} </h3>
                </a>
                <div class="rating">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bx-star"></i>
                </div>
                <h4 class="price"> {{ $store->address}}</h4>
            </div>
        </div>
        @endforeach


    </div>
</section>






@stop