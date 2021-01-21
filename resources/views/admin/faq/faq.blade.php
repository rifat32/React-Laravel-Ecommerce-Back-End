
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
@if (Session::has('inserted'))
<div class="mb-3">
    <strong role="alert" class="alert alert-success">
        {{Session::get('inserted')}}
    </strong>
</div>
@endif
               </div>
               <div class="card-body">
                <form action="{{route('admin.faq.post')}}" method="POST">
                   @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" name="description" id="description" rows="3"></textarea>
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
<h3 class="mb-3"><strong>All Faqs</strong> </h3>
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
                    <table class="table table-stripped table-responsive">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                  <tr>
                      <td>
                          {{$faq->id}}
                      </td>
                      <td>
                        {{$faq->title}}
                    </td>
                    <td>
                        {{$faq->description}}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.faq.edit',$faq->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('admin.faq.destroy',$faq->id)}}">Delete</a>
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


@endsection

