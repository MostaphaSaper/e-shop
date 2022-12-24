@extends('layouts.front')

@section('title')
    CATEGORIES
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($category as $cate)
                        <div class="col-md-3 mb-3">
                            <a href="{{url('view-category/'.$cate->slug)}}" style="text-decoration: none !important;color: #000">
                                <div class="card">
                                    
                                        <img src="{{asset('assets/uploads/category/'.$cate->image)}}" class="cate-img" alt="">
                                    
                                    <div class="card-body" style="height: 120px">
                                        <h5>{{$cate->name}} </h5>
                                        <p>{{$cate->meta_descrip}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection