
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
<h3 class="mb-3"><strong>Edit Sub Category</strong> </h3>
@if (Session::has('updated'))
<div class="mb-3">
    <strong role="alert" class="alert alert-success">
        {{Session::get('updated')}}
    </strong>
</div>
@endif
               </div>
               <div class="card-body">
                <form action="{{route('subCategory.update')}}" method="POST">
                   @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$subCategory[0]->id}}">
                      <label for="category">Edit Sub Category</label>
                      <input type="text" name="subCategory" id="category" class="form-control" value="{{$subCategory[0]->sub_category}}" >
                    </div>
                    <div class="form-group">
                        <label for="category">of Category</label>
                        <select  class="form-control" name="category" id="category">
                         @foreach ($categories as $category)
                             <option
                             @if ($category->category === $subCategory[0]->category)
                                 selected
                             @endif
                             value="{{$category->category}}">{{$category->category}}</option>
                         @endforeach
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
               </div>
           </div>
       </div>

   </div>


</div>


@endsection

