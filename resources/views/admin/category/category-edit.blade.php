
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
<h3 class="mb-3"><strong>Edit Category</strong> </h3>
@if (Session::has('updated'))
<div class="mb-3">
    <strong role="alert" class="alert alert-success">
        {{Session::get('updated')}}
    </strong>
</div>
@endif
               </div>
               <div class="card-body">
                <form action="{{route('category.update')}}" method="POST">
                   @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$category[0]->id}}">
                      <label for="category">Edit Category</label>
                      <input type="text" name="category" id="category" class="form-control" value="{{$category[0]->category}}" >
                    </div>
                    <h4 class="bg-danger">Has child category? Be Careful!!!</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="childCat" id="yes" value="1"
                        @if ($category[0]->has_child == 1)
                        checked
                    @endif
                        >
                        <label class="form-check-label" for="yes">
                         Yes
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="childCat" id="no" value="0"
                        @if ($category[0]->has_child == 0)
                            checked
                        @endif
                        >
                        <label class="form-check-label" for="no">
                          No
                        </label>
                      </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
               </div>
           </div>
       </div>

   </div>


</div>


@endsection

