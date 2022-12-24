@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Category Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="text-align: center">NAME</th>
                        <th style="text-align: center">Discription</th>
                        <th style="text-align: center">Image</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td style="text-align: center">{{$item->name}}</td>
                            <td >{{$item->description}}</td>
                            <td style="text-align: center">
                                <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="cate-img" alt="An Image HERE">
                            </td>
                            <td style="text-align: center">
                                <a href="{{url('edit-category/'.$item->id)}}" class = "btn btn-primary">EDIT</a>
                                <a href="{{url('delete-category/'.$item->id)}}" class = "btn btn-danger">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection    