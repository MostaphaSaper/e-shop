@extends('layouts.front')

@section('title')
    Welcome Here
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5" >
        <div class="container">
            <div class="row">
                <h2>Trending Teams</h2>
                <div class="owl-carousel product-carousel owl-theme">
                    @foreach ($product as $item)
                        <div class="item">
                            <a style="text-decoration: none !important;color: #000" href="{{url('category/'.$item->category->name.'/'.$item->name)}}" style="">
                            <div class="card" >
                                <img src="{{asset('assets/uploads/products/'.$item->image)}}" class="cate-img" alt="">
                                <div class="card-body">
                                    <h5>{{$item->name}} </h5>
                                    <small class="float-start">{{$item->selling_price}}</small>
                                    <span class="float-end"><s>{{$item->original_price}}</s></span>
                                </div>
                            </div>
                            </a>
                        </div>
                     @endforeach
                </div>
               
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Leagues</h2>
                <div class="owl-carousel product-carousel owl-theme">
                    @foreach ($category as $item)
                        <div class="item">
                            <a href="{{url('view-category/'.$item->slug)}}" style="text-decoration: none !important;color: #000">
                                <div class="card">
                                <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="cate-img" alt="">
                                    <div class="card-body " style="height: 120px">
                                        <h5>{{$item->name}} </h5>
                                        <p>{{$item->meta_descrip}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                     @endforeach
                </div>
               
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.product-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection