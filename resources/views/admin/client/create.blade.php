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
                  <h4 class="card-title ">Add Client FeedBack</h4>
                 
                </div>
                <div class="card-body">
                  <div class="card-content">
                  	<form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
                  		@csrf

                  		<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Client Name </label>
                          <input type="text" class="form-control" name="client_name">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12" styl>
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                         
                          <input type="text" class="form-control" name="client_title"> 
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <div class="col-md-12" styl>
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea class="form-control" maxlength="550" name="client_description"id="comment" placeholder="maxlength 550 character"></textarea>
                           <!-- <input type="text" class="form-control" name="size"> --> 
                        </div>
                      </div>
                    </div>

                     

                    

                    <div class="row">
                      <div class="col-md-12">
                      	<label class="bmd-label-floating">Image</label>
                        <input type="file" name="image">
                      </div>
                    </div>
                    <a href="{{route('client.index')}}" class="btn btn-danger">Back</a>
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