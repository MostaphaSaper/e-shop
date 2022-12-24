@extends('layouts.front')

@section('title')
    Welcome Here
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h2 class="mb-0">Home/Cart</h2>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
            @php
                $total = 0;
            @endphp
            @foreach ($cartitems as $item )
            <div class="row product_data">
                <div class="col-md-3 my-auto">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" style="height: 70px; width:70px" alt="image">
                </div>
                <div class="col-md-3 my-auto" style="align-items: center;">
                    <h2>{{$item->products->name}}</h2>
                </div>
                <div class="col-md-2 my-auto" style="align-items: center;">
                    <h2>{{$item->products->selling_price}}$ </h2>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                    <label for="quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width: 130px">
                        <button class="input-group-text changeQty decrement-btn">-</button>
                        <input type="text" name="quantity " value="{{$item->prod_qty}}" class="form-control qty-input text-center">
                        <button class="input-group-text changeQty increment-btn">+</button>
                    </div>
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger delete-cart-item"> <i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>
            <br>
            @php $total += $item->products->selling_price* $item->prod_qty @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h2>
                <input type="hidden" value="Total Price = {{$total}}$">
                <button class="btn btn-success float-end" >Proceed to Checkout</button>
            </h2>
            
        </div>
    </div>
</div>
@endsection