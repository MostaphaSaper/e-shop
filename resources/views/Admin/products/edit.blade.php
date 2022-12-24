@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 style="text-align: center">Edit/Update Product</h2>
        </div>
        <div class="card-body">
            <form action="{{url('update-prod/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id" >
                            <option selected>{{$product->category->name}}</option>
                          </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$product->name}}" name="name">
                    </div> 
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{$product->slug}}" name="slug">
                    </div> 
                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control">{{$product->small_description}}</textarea>
                    </div> 
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$product->description}}</textarea>
                    </div> 
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{$product->original_price}}" name="Original_Price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{$product->selling_price}}" name="Selling_Price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">TAX</label>
                        <input type="number" class="form-control" value="{{$product->tax}}" name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" value="{{$product->qty}}" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$product->status == "1" ? 'checked' : ''}} name="status">
                    </div> 
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$product->trending == "1" ? 'checked' : ''}} name="trending">
                    </div> 
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Titles</label>
                        <input type="text" class="form-control" value="{{$product->meta_title}}" name="meta_title">
                    </div> 
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea class="form-control" rows="3" name="meta_keyword">{{$product->meta_keyword}}</textarea>
                    </div>  
                    <div class="col-md-12 mb-3">
                        <label for="">Meta_Description</label>
                        <textarea class="form-control" rows="3" name="meta_description">{{$product->meta_description}}</textarea>
                    </div> 
                    @if ($product->image)
                        <img src="{{asset('assets/uploads/products/'.$product->image)}}" class="cate-img" alt="">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </div>
    </div>

@endsection    