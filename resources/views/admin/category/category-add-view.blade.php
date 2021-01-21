
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
<h3 class="mb-3"><strong>Add Category</strong> </h3>
@if (Session::has('inserted'))
<div class="mb-3">
    <strong role="alert" class="alert alert-success">
        {{Session::get('inserted')}}
    </strong>
</div>
@endif
@if (Session::has('exist'))
<div class="mb-3">
    <strong role="alert" class="alert alert-danger">
        {{Session::get('exist')}}
    </strong>
</div>
@endif
               </div>
               <div class="card-body">
                <form action="{{route('category.store')}}" method="POST">
                   @csrf
                    <div class="form-group">
                      <label for="category">Add Category</label>
                      <input type="text" name="category" id="category" class="form-control" placeholder="category name" >
                    </div>
                    <h4 class="bg-danger">Has child category? Be Careful!!!</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="childCat" id="yes" value="1" checked>
                        <label class="form-check-label" for="yes">
                         Yes
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="childCat" id="no" value="0" checked>
                        <label class="form-check-label" for="no">
                          No
                        </label>
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
<h3 class="mb-3"><strong>All Categories</strong> </h3>
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
                <th>Category</th>
                <th>has child (boolean)</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td scope="row">{{$category->id}}</td>
                    <td>{{$category->category}}</td>
                    <td>{{$category->has_child}}</td>
                    <td>
                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger">Delete</a>
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

