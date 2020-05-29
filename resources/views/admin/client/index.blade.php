@extends('layouts.app')

@section('title','Slider')
@push('css')

<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">

@endpush

@section('main-content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	@include('layouts.partials.msg')
            	<a href="{{route('client.create')}}" class="btn btn-info">Add New</a>

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Client FeedBack</h4>

                  @if(session('successMsg'))
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Alhamdulillah </b>{{ session('successMsg') }}</span>
                  </div>

                  @endif
                 
                </div>
                <div class="card-body">
                  <div class="card-content table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th >
                          ID
                        </th>
                        <th >
                          Client Name</th>
                        <th >
                        title
                        </th>

                        <th >
                         Description
                        </th>
                        
                        <th style="width: 20%" >
                          Image
                        </th>
                        <th >
                          Created At
                        </th>
                        <th>
                          Updated At
                        </th>
                        <th>
                        Action
                      </th>
                      
                      </thead>
                      <tbody>

                       @foreach($apartment as $key=>$slider)
                   <tr>
                       <td>{{$key +1}}</td>
                       <td>{{$slider->client_name}}</td>
                       <td>{{$slider->client_title}}</td>
                       <td>{{$slider->client_description}}</td>
                      
                       
                        <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/client/'.$slider->image) }}" style="height: 120px; width: 200px"></td>
                       <td>{{$slider->created_at->diffForHumans()}}</td>
                       <td>{{$slider->updated_at->diffForHumans()}}</td>
                        <td>
                        <a href="{{ route('client.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>

                          <form id="delete-form-{{ $slider->id }}" action="{{ route('client.destroy',$slider->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                              </form>
                                  <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                       document.getElementById('delete-form-{{ $slider->id }}').submit();
                                  }else {
                                                    event.preventDefault();
                                          }"><i class="material-icons">delete</i></button>
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

@push('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script>
	(document).ready(function() {
    $('#table').DataTable();
} );
</script>

@endpush