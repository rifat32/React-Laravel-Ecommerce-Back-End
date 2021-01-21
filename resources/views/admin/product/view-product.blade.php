
@extends('layouts.admin')

@section('content')


<div class="container-fluid">

   <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
<h3 class="mb-3"><strong>All Products</strong> </h3>
@if (Session::has('deleted'))
<div class="mb-3">
    <strong role="alert" class="alert alert-danger">
        {{Session::get('deleted')}}
    </strong>
</div>
@endif
            </div>
            <div class="card-body">
                <div class="row">
<div class="col-10 offset-1">
    <table class="table table-striped table-responsive ">
        <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Custom Id</th>
                <th>Name</th>
                <th>Category or SubCategory</th>
                <th>Image 1</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr >
                    <td scope="row">{{$product->id}}</td>
                    <td>{{$product->custom_id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category}}</td>
                    <td><img class="img img-responsive" style="height:100px;width:100px" src='{{$product->image_1}}'></td>
                    <td>
                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach


            </tbody>
    </table>
    {{$products->links()}}
</div>


                </div>


            </div>
        </div>
    </div>

</div>

</div>


@endsection


