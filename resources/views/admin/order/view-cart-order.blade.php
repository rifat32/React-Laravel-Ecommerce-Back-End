
@extends('layouts.admin')

@section('content')


<div class="container-fluid">

   <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
<h3><strong>Order Id #{{$order[0]->id + 5000}}</strong> </h3>
<h3><strong>Total: {{$total}} 	&#2547;</strong></h3>


            </div>
            <div class="card-body">
                <div class="row">
<div class="col-12">
    <table class="table table-striped  ">
        <thead class="thead-inverse">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Message</th>

            </tr>
            </thead>
            <tbody>

                <tr >
                    <td>{{$order[0]->userName}}</td>
                    <td>{{$order[0]->userEmail}}</td>
                    <td>{{$order[0]->userPhone}}</td>
                    <td>{{$order[0]->userAddress}}</td>
                    <td>{{$order[0]->userMessage}}</td>

                </tr>



            </tbody>
    </table>

</div>

                </div>


            </div>
            <div class="card-body">
                <div class="row">
<div class="col-12">
    <table class="table table-striped  ">
        <thead class="thead-inverse">
            <tr>
                <th>Product Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>productQuantity</th>

            </tr>
            </thead>
            <tbody>
                @foreach ($cartOrders as $cartOrder)
                <tr >
                    <td scope="row">{{$cartOrder->productId}}</td>
                    <td><img style="height: 100px; width:100px" src="{{$cartOrder->image_1}}" alt="Product Image"> </td>
                    <td>{{$cartOrder->name}}</td>
                    <td>{{$cartOrder->currentPrice}}</td>
                    <td>{{$cartOrder->productQuantity}}</td>

                </tr>
                @endforeach


            </tbody>
    </table>

</div>

                </div>


            </div>
        </div>
    </div>

</div>

</div>


@endsection


