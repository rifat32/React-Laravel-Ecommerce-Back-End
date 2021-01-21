
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
<h3 class="mb-3"><strong>Front Images</strong> </h3>
@if (Session::has('inserted'))
<div class="mb-3">
    <strong role="alert" class="alert alert-success">
        {{Session::get('inserted')}}
    </strong>
</div>
@endif
               </div>
               <div class="card-body">
                <form action="{{route('admin.front.image.post')}}" method="POST">
                   @csrf
                    <div class="form-group">
                      <label for="link">Image Link</label>
                      <input type="text" name="link" id="link" class="form-control" placeholder="Image Link" aria-describedby="helpId">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
               </div>
           </div>
       </div>

   </div>
   <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
<h3 class="mb-3"><strong>All Images</strong> </h3>
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
                    @foreach ($links as $link)
                    <div class="col-4">
                    <img src="{{$link->link}}" style="width: inherit; height:220px;" alt="Fromt Image">
                    <div>
                        <a href="{{route('admin.front.image.destroy',$link->id)}}" class="btn btn-danger btn-block">Delete</a>
                    </div>
                    </div>

                    @endforeach
                </div>


            </div>
        </div>
    </div>

</div>

</div>


@endsection

