

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
@if (Session::has('updated'))
<div class="mb-3">
    <strong role="alert" class="alert alert-success">
        {{Session::get('updated')}}
    </strong>
</div>
@endif
               </div>
               <div class="card-body">
                <form action="{{route('product.update')}}" method="POST">
                   @csrf
                   <input type="hidden" name="id"  value="{{$product[0]->id}}">
                    <div class="form-group">
                      <label for="custom_id">Custom Id <span class="text-danger">*</span></label>
                      <input  required type="text" name="custom_id" id="custom_id" class="form-control" placeholder="custom id"
                      @if (old('custom_id'))
                      value="{{ old('custom_id') }}"
                      @else
                      value="{{$product[0]->custom_id}}"
                      @endif
                      >

                      <small>higher custom ids will be displayed first. this is editable.</small>
                    </div>
                    <div class="form-group">
                      <label for="name">Product Name <span class="text-danger">*</span></label>
                      <input required type="text" name="name" id="name" class="form-control" placeholder="Name"
                      @if (old('name'))
                      value="{{ old('name') }}"
                      @else
                      value="{{$product[0]->name}}"
                      @endif
                      >
                    </div>
                    <div class="form-group">
                        <label for="descriptionIntroduction">Description Introduction <span class="text-danger">*</span></label>
                        <input required type="text" name="descriptionIntroduction" id="descriptionIntroduction" class="form-control" placeholder="Description Introduction"
                        @if (old('descriptionIntroduction'))
                        value="{{ old('descriptionIntroduction') }}"
                        @else
                        value="{{$product[0]->descriptionIntroduction}}"
                        @endif
                        >
                      </div>
                      <div class="form-group">
                        <label for="descriptionFeatures">Description Features Introduction <span class="text-danger">*</span></label>
                        <input required type="text" name="descriptionFeatures" id="descriptionFeatures" class="form-control" placeholder="Description Features"
                        @if (old('descriptionFeatures'))
                        value="{{ old('descriptionFeatures') }}"
                        @else
                        value="{{$product[0]->descriptionFeatures}}"
                        @endif
                        >
                      </div>
                      <div class="form-group">
                        <label for="currentPrice">Current Price <span class="text-danger">*</span></label>
                        <input required type="text" name="currentPrice" id="currentPrice" class="form-control" placeholder="Current Price"
                        @if (old('currentPrice'))
                        value="{{ old('currentPrice') }}"
                        @else
                        value="{{$product[0]->currentPrice}}"
                        @endif
                        >
                      </div>
                      <div class="form-group">
                        <label for="previousPrice">Previous Price <span class="text-primary">(optional)</span></label>
                        <input  type="text" name="previousPrice" id="previousPrice" class="form-control" placeholder="Previous Price"
                        @if (old('previousPrice'))
                        value="{{ old('previousPrice') }}"
                        @else
                        value="{{$product[0]->previousPrice}}"
                        @endif
                        >
                      </div>
                      <div class="form-group">
                        <label for="image_1">Image link 1<span class="text-danger">*</span></label>
                        <input required type="text" name="image_1" id="image_1" class="form-control" placeholder="image 1"
                        @if (old('image_1'))
                        value="{{ old('image_1') }}"
                        @else
                        value="{{$product[0]->image_1}}"
                        @endif
                        >
                        <div class="row">
                            <div class="col-6 offset-3">
                                <img src="{{$product[0]->image_1}}" alt="product img"
                                style="height: 150px; width:150px; ">
                            </div>
                        </div>

                      </div>
                      <div class="form-group">
                        <label for="image_2">Image link 2 <span class="text-danger">*</span></label>
                        <input required  type="text" name="image_2" id="image_2" class="form-control" placeholder="image 2"
                        @if (old('image_2'))
                        value="{{ old('image_2') }}"
                        @else
                        value="{{$product[0]->image_2}}"
                        @endif
                        >
                        <div class="row">
                            <div class="col-6 offset-3">
                                <img src="{{$product[0]->image_2}}" alt="product img"
                                style="height: 150px; width:150px; ">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="image_3">Image link 3 <span class="text-danger">*</span></label>
                        <input  required type="text" name="image_3" id="image_3" class="form-control" placeholder="image 3"
                        @if (old('image_3'))
                        value="{{ old('image_3') }}"
                        @else
                        value="{{$product[0]->image_3}}"
                        @endif
                        >
                        <div class="row">
                            <div class="col-6 offset-3">
                                <img src="{{$product[0]->image_3}}" alt="product img"
                                style="height: 150px; width:150px; ">
                            </div>
                        </div>
                      </div>

                      <h4 class="bg-danger">Select One between category and sub category. otherwise this will throw error.</h4>
                      <div class="form-group">
                          <label for="category">Select Category</label>
                          <select class="custom-select" name="category" id="category">
                              <option value="-1">None</option>

                              @foreach ($categories as $category)
                              <option
                              @if ($category->category === $product[0]->category)
                                  selected
                              @endif
                              value="{{$category->category}}">{{$category->category}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="sub_category">Select Sub Category</label>
                        <select class="custom-select" name="sub_category" id="sub_category">
                            <option value="-1">None</option>
                            @foreach ($sub_categories as $sub_category)
                            <option
                            @if ($sub_category->sub_category === $product[0]->category)
                                  selected
                              @endif
                            value="{{$sub_category->sub_category}}">{{$sub_category->sub_category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag <span class="text-danger">*</span></label>
                        <input required  type="text" name="tag" id="tag" class="form-control" placeholder="tag"
                        @if (old('tag'))
                        value="{{ old('tag') }}"
                        @else
                        value="{{$product[0]->tags}}"
                        @endif>
                        <small>tags are useful for finding this product at the search result.</small>
                      </div>
                      <div class="form-group">
                        <label for="stock">Stock <span class="text-primary">(Optional)</span></label>
                        <input  type="text" name="stock" id="stock" class="form-control" placeholder="stock"
                        @if (old('stock'))
                        value="{{ old('stock') }}"
                        @else
                        value="{{$product[0]->stock}}"
                        @endif>
                      </div>
                      <div class="form-group">
                        <label for="sizes">Sizes <span class="text-primary">(Optional)</span></label>
                        <input  type="text" name="sizes" id="sizes" class="form-control" placeholder="stock"
                        @if (old('sizes'))
                        value="{{ old('sizes') }}"
                        @else
                        value="{{$product[0]->sizes}}"
                        @endif
                        >
                        <small>write with space in between.</small>
                      </div>
                      <div class="form-group">
                        <label for="colors">Colors <span class="text-primary">(Optional)</span></label>
                        <input  type="text" name="colors" id="colors" class="form-control" placeholder="colors"
                        @if (old('colors'))
                        value="{{ old('colors') }}"
                        @else
                        value="{{$product[0]->colors}}"
                        @endif
                        >
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


