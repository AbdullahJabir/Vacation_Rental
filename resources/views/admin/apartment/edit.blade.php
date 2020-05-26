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
                            <form method="POST" action="{{ route('apartment.update',$apartment->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">room_name</label>
                                            <input type="text" class="form-control" name="room_name" value="{{ $apartment->room_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Max Person</label>
                                            <input type="text" class="form-control" name="bed" value="{{ $apartment->bed}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Size</label>
                                            <input type="text" class="form-control" name="size" value="{{ $apartment->size}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">View</label>
                                            <input type="text" class="form-control" name="view" value="{{ $apartment->view}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Bed Num</label>
                                            <input type="text" class="form-control" name="bed" value="{{ $apartment->bed}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <a href="{{ route('apartment.index') }}" class="btn btn-danger">Back</a>
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