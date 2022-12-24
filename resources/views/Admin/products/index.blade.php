@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Product Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="text-align: center">Category</th>
                        <th style="text-align: center">NAME</th>
                        <th style="text-align: center">Selling Price</th>
                        <th style="text-align: center">Image</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td style="text-align: center">{{$item->category->name}}</td>
                            <td style="text-align: center">{{$item->name}}</td>
                            <td style="text-align: center">{{$item->selling_price}}</td>
                            <td style="text-align: center">
                                <img src="{{asset('assets/uploads/products/'.$item->image)}}" class="cate-img" alt="An Image HERE">
                            </td>
                            <td style="text-align: center">
                                <a href="{{url('edit-prod/'.$item->id)}}" class = "btn btn-primary btn-sm">EDIT</a>
                                <a href="{{url('delete-prod/'.$item->id)}}" class = "btn btn-danger btn-sm" >DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection    