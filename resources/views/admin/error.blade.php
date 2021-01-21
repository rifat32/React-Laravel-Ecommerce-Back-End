
@extends('layouts.admin')

@section('content')


<div class="container-fluid">
   <div class="row">
       <div class="col-6 offset-3">
           <div class="card">
               <div class="card-header text-center">
<h3 class="mb-3"><strong>Error Message</strong> </h3>

<div class="mb-3">
    <strong role="alert" class="alert alert-danger" style="line-height: 3rem">
        {{$err}}
    </strong>
</div>

               </div>

           </div>
       </div>

   </div>



@endsection



