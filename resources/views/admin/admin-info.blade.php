
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
                    <h3 class="mb-3">
                        <strong>
                            Admin Info
                        </strong>

                    </h3>
                    @if (Session::has('inserted'))
                    <div class="mb-3">
                        <strong role="alert" class="alert alert-success">
                            {{Session::get('inserted')}}
                        </strong>
                    </div>
                    @endif
                    @if (Session::has('updated'))
                    <div>
                        <strong role="alert" class="alert alert-success">
                            {{Session::get('updated')}}
                        </strong>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                   <form action="{{route('admin.info.post')}}" method="POST">
                    @csrf
@if (count($infos))
<h4 class="text-center"><strong>Required Informations</strong></h4>
<hr>
<div class="form-group text-center">
    <label for="email" >Email</label>
    <input required type="email" value='{{$infos[0]->email}}' name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
  </div>
  <div class="form-group text-center">
   <label for="phone">Phone</label>
   <input required type="text" value='{{$infos[0]->phone}}' name="phone" id="phone" class="form-control" placeholder="" aria-describedby="helpId">
 </div>
 <div class="form-group text-center">
   <label for="address">Address</label>
   <input required type="text" value='{{$infos[0]->address}}' name="address" id="address" class="form-control" placeholder="" aria-describedby="helpId">
 </div>
 <hr>
 <h4 class="text-center"><strong>Optional Informations</strong></h4>
<hr>
 <div class="form-group text-center">
   <label for="fb">Facebook link</label>
   <input type="text" value='{{$infos[0]->facebook}}' name="fb" id="fb" class="form-control" placeholder="" aria-describedby="helpId">
 </div>
 <div class="form-group text-center">
   <label for="tw">Twitter link</label>
   <input type="text" value='{{$infos[0]->twitter}}' name="tw" id="tw" class="form-control" placeholder="" aria-describedby="helpId">
 </div>
 <div class="form-group text-center">
   <label for="ins">Instagram link</label>
   <input type="text" value='{{$infos[0]->instagram}}' name="ins" id="ins" class="form-control" placeholder="" aria-describedby="helpId">
 </div>
 <div class="form-group text-center">
   <label for="ln">Linkedin link</label>
   <input type="text" value='{{$infos[0]->linkedin}}' name="ln" id="ln" class="form-control" placeholder="" aria-describedby="helpId">
 </div>
 @else
 <h4 class="text-center"><strong>Required Informations</strong></h4>
<hr>

                       <div class="form-group text-center">
                         <label for="email">Email</label>
                         <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                       </div>
                       <div class="form-group text-center">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group text-center">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <hr>
                      <h4 class="text-center"><strong>Optional Informations</strong></h4>
                     <hr>
                      <div class="form-group text-center">
                        <label for="fb">Facebook link</label>
                        <input type="text" name="fb" id="fb" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group text-center">
                        <label for="tw">Twitter link</label>
                        <input type="text" name="tw" id="tw" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group text-center">
                        <label for="ins">Instagram link</label>
                        <input type="text" name="ins" id="ins" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group text-center">
                        <label for="ln">Linkedin link</label>
                        <input type="text" name="ln" id="ln" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>

                      @endif
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection

