@extends('layouts.app')

@section('room_name','Slider')

@push('css')

@endpush

@section('main-content')
   <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
              	       @include('layouts.partials.msg')
                <div class="card-header card-header-primary">
                  <h4 class="card-room_name ">Add sliders</h4>
                 
                </div>
                <div class="card-body">
                  <div class="card-content">
                            <form method="POST" action="{{ route('client.update',$apartment->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label"> Client name</label>
                                            <input type="text" class="form-control" name="client_name" value="{{ $apartment->client_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="client_title" value="{{ $apartment->client_title}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Description</label>
                                            <!-- <input type="text" class="form-control" name="size" value="{{ $apartment->size}}"> -->

                                             <textarea class="form-control" maxlength="550" name="client_description"id="comment" placeholder="maxlength 550 character" value="{{ $apartment->client_description}}"></textarea>
                                        </div>
                                    </div>
                                </div>

                            
                            

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <a href="{{ route('client.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush