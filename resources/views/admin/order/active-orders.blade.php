
@extends('layouts.admin')

@section('content')


<div class="container-fluid">

   <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
<h3 class="mb-3"><strong>Active Orders</strong> </h3>
@if (Session::has('completed'))
<div class="mb-3">
    <strong role="alert" class="alert alert-success">
        {{Session::get('completed')}}
    </strong>
</div>
@endif
@if (Session::has('cancelled'))
<div class="mb-3">
    <strong role="alert" class="alert alert-danger">
        {{Session::get('cancelled')}}
    </strong>
</div>
@endif
            </div>
            <div class="card-body">
                <div class="row">
<div class="col-8 offset-2">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Order Id</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr >
                    <td scope="row">{{$order->id}}</td>
                    <td>
                      <?php
                         $IST = new DateTime($order->created_at, new DateTimeZone('UTC'));
                         $IST->setTimezone(new DateTimeZone('Asia/Dhaka'));
echo $IST->format('Y-m-d H:i:s');
                        ?>
                       </td>
                    <td>
                        <a href="{{route('view.cart.order',$order->id)}}" class="btn btn-primary">View</a>
                        <a href="{{route('order.complete',$order->id)}}" class="btn btn-success">Complete</a>
                        <a href="{{route('order.cancel',$order->id)}}" class="btn btn-danger">Cancel</a>
                    </td>
                </tr>
                @endforeach


            </tbody>
    </table>
    {{$orders->links()}}
</div>


                </div>


            </div>
        </div>
    </div>

</div>

</div>


@endsection


