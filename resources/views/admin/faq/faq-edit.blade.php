
@extends('layouts.admin')

@section('content')
<style>
    .form-control{
        border: 2px solid black;
    }
</style>

<div class="container-fluid">
   <div class="row">
       <div class="col-6 offset-3">
           <div class="card">
               <div class="card-header text-center">
<h3 class="mb-3"><strong>Faq</strong> </h3>
@if (Session::has('updated'))
<div class="mb-3">
    <strong role="alert" class="alert alert-success">
        {{Session::get('updated')}}
    </strong>
</div>
@endif
               </div>
               <div class="card-body">
                <form action="{{route('admin.faq.update')}}" method="POST">
                   @csrf
                   <input type="hidden" name="id" value="{{$faq[0]->id}}">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$faq[0]->title}}">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" name="description" id="description" rows="3">{{$faq[0]->description}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
               </div>
           </div>
       </div>

   </div>


</div>


@endsection

