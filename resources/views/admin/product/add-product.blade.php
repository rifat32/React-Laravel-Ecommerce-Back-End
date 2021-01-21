

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
<h3 class="mb-3"><strong>Add Product</strong> </h3>
@if (Session::has('noCate'))
<div class="mb-3">
    <strong role="alert" class="alert alert-danger">
        {{Session::get('noCate')}}
    </strong>
</div>
@endif
@if (Session::has('inserted'))
<div class="mb-3">
    <strong role="alert" class="alert alert-success">
        {{Session::get('inserted')}}
    </strong>
</div>
@endif
               </div>
               <div class="card-body">
                <form action="{{route('product.store')}}" method="POST">
                   @csrf
                    <div class="form-group">
                      <label for="custom_id">Custom Id <span class="text-danger">*</span></label>
                      <input  required type="text" name="custom_id" id="custom_id" class="form-control" placeholder="custom id" value="{{ old('custom_id') }}" >
                      <small>higher custom ids will be displayed first. this is editable.</small>
                    </div>
                    <div class="form-group">
                      <label for="name">Product Name <span class="text-danger">*</span></label>
                      <input required type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="descriptionIntroduction">Description Introduction <span class="text-danger">*</span></label>
                        <input required type="text" name="descriptionIntroduction" id="descriptionIntroduction" class="form-control" placeholder="Description Introduction"
                        value="{{ old('descriptionIntroduction') }}">
                      </div>
                      <div class="form-group">
                        <label for="descriptionFeatures">Description Features Introduction <span class="text-danger">*</span></label>
                        <input required type="text" name="descriptionFeatures" id="descriptionFeatures" class="form-control" placeholder="Description Features"
                        value="{{ old('descriptionFeatures') }}"
                        >
                      </div>
                      <div class="form-group">
                        <label for="currentPrice">Current Price <span class="text-danger">*</span></label>
                        <input required type="text" name="currentPrice" id="currentPrice" class="form-control" placeholder="Current Price"
                        value="{{ old('currentPrice') }}">
                      </div>
                      <div class="form-group">
                        <label for="previousPrice">Previous Price <span class="text-primary">(optional)</span></label>
                        <input  type="text" name="previousPrice" id="previousPrice" class="form-control" placeholder="Previous Price"
                        value="{{ old('previousPrice') }}">
                      </div>
                      <div class="form-group">
                        <label for="image_1">Image link 1<span class="text-danger">*</span></label>
                        <input required type="text" name="image_1" id="image_1" class="form-control" placeholder="image 1"
                        value="{{ old('image_1') }}">
                      </div>
                      <div class="form-group">
                        <label for="image_2">Image link 2 <span class="text-danger">*</span></label>
                        <input required  type="text" name="image_2" id="image_2" class="form-control" placeholder="image 2"
                        value="{{ old('image_2') }}">
                      </div>
                      <div class="form-group">
                        <label for="image_3">Image link 3 <span class="text-danger">*</span></label>
                        <input  required type="text" name="image_3" id="image_3" class="form-control" placeholder="image 3"
                        value="{{ old('image_3') }}">
                      </div>

                      <h4 class="bg-danger">Select One between category and sub category. otherwise this will throw error.</h4>
                      <div class="form-group">
                          <label for="category">Select Category</label>
                          <select class="custom-select" name="category" id="category">
                              <option value="-1">None</option>
                              @foreach ($categories as $category)
                              <option value="{{$category->category}}">{{$category->category}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="sub_category">Select Sub Category</label>
                        <select class="custom-select" name="sub_category" id="sub_category">
                            <option value="-1">None</option>
                            @foreach ($sub_categories as $sub_category)
                            <option value="{{$sub_category->sub_category}}">{{$sub_category->sub_category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag <span class="text-danger">*</span></label>
                        <input required type="text" name="tag" id="tag" class="form-control" placeholder="tag"
                        value="{{ old('tag') }}">
                        <small>tags are useful for finding this product at the search result.</small>
                      </div>
                      <div class="form-group">
                        <label for="stock">Stock <span class="text-primary">(Optional)</span></label>
                        <input  type="text" name="stock" id="stock" class="form-control" placeholder="stock"
                        value="{{ old('stock') }}">
                      </div>
                      <div class="form-group">
                        <label for="sizes">Sizes <span class="text-primary">(Optional)</span></label>
                        <input  type="text" name="sizes" id="sizes" class="form-control" placeholder="stock"
                        value="{{ old('sizes') }}">
                        <small>write with space in between.</small>
                      </div>
                      <div class="form-group">
                        <label for="colors">Colors <span class="text-primary">(Optional)</span></label>
                        <input  type="text" name="colors" id="colors" class="form-control" placeholder="colors"
                        value="{{ old('colors') }}">
                        <small>write hex color without # and with space in between.</small>
                      </div>




                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
               </div>
           </div>
       </div>

   </div>


</div>


@endsection

