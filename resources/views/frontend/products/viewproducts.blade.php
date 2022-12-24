@extends('layouts.front')

@section('title')
    {{$category->name}}
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h2 class="mb-0">Collection/{{$category->name}}</h2>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h3>{{$category->name}}</h3>
                    @foreach ($products as $prod)
                        <div class="col-md-3 mb-3">
                                <div class="card">
                                    <a style="text-decoration: none !important;color: #000" href="{{url('category/'.$category->name.'/'.$prod->name)}}">
                                            <img src="{{asset('assets/uploads/products/'.$prod->image)}}" class="cate-img" alt="">
                                        <div class="card-body" >
                                            <h5>{{$prod->name}} </h5>
                                            <small class="float-start">{{$prod->selling_price}}</small>
                                            <span class="float-end"><s>{{$prod->original_price}}</s></span>
                                        </div>
                                    </a>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection