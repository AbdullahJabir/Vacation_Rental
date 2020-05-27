@extends('layouts.app')

@section('title','apartment')
@push('css')


@endpush

@section('main-content')

<div class="content" style="font-size: 22px">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
              	       @include('layouts.partials.msg')
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add Apartments Room</h4>
                 
                </div>
                <div class="card-body">
                  <div class="card-content">
                  	<form action="{{route('apartment.store')}}" method="POST" enctype="multipart/form-data">
                  		@csrf

                  		<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Room Name </label>
                          <input type="text" class="form-control" name="room_name">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12" styl>
                        <div class="form-group">
                          <label class="bmd-label-floating">Max Person</label>
                         
                          <input type="text" class="form-control" name="max_person"> 
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <div class="col-md-12" styl>
                        <div class="form-group">
                          <label class="bmd-label-floating">Room Size</label>
                          
                           <input type="text" class="form-control" name="size"> 
                        </div>
                      </div>
                    </div>

                      <div class="row">
                      <div class="col-md-12" styl>
                        <div class="form-group">
                          <label class="bmd-label-floating">Room View</label>
                         
                           <input type="text" class="form-control" name="view"> 
                        </div>
                      </div>
                    </div>

                      <div class="row">
                      <div class="col-md-12" styl>
                        <div class="form-group">
                          <label class="bmd-label-floating">Bed </label>
                         
                          <input type="text" class="form-control" name="bed"> 
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                      	<label class="bmd-label-floating">Image</label>
                        <input type="file" name="image">
                      </div>
                    </div>
                    <a href="{{route('apartment.index')}}" class="btn btn-danger">Back</a>
                  		<button class="btn btn-primary" type="submit">Save</button>
                  	</form>
                    
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

@endsection

@push('scripts')


@endpush