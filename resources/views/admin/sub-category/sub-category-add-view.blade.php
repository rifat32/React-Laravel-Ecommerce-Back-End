
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
<h3 class="mb-3"><strong>Add Sub Category</strong> </h3>
@if (Session::has('subCategoryAdded'))
<div class="mb-3">
    <strong role="alert" class="alert alert-success">
        {{Session::get('subCategoryAdded')}}
    </strong>
</div>
@endif
               </div>
               <div class="card-body">
                <form action="{{route('subCategory.store')}}" method="POST">
                   @csrf
                    <div class="form-group">
                      <label for="category">Add Sub Category</label>
                      <input  type="text" name="subCategory" id="subCategory" class="form-control" placeholder="sub category name" >
                    </div>
                    <div class="form-group">
                      <label for="category">of Category</label>
                      <select  class="form-control" name="category" id="category">
                       @foreach ($categories as $category)
                           <option value="{{$category->category}}">{{$category->category}}</option>
                       @endforeach
                      </select>
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
<h3 class="mb-3"><strong>All Sub Categories</strong> </h3>
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
<div class="col-8 offset-2">
    <table class="table table-striped ">
        <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Categoty</th>
                <th>Sub Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($subCategories as $subCategory)
                <tr>
                    <td scope="row">{{$subCategory->id}}</td>
                    <td>{{$subCategory->category}}</td>
                    <td>{{$subCategory->sub_category}}</td>
                    <td>
                        <a href="{{route('subCategory.edit',$subCategory->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('subCategory.delete',$subCategory->id)}}" class="btn btn-danger">Delete</a>
                    </td>
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

