@extends('layouts.app')

@section('title','Slider')
@push('css')

<!-- <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css"> -->


<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  -->

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


@endpush

@section('main-content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	@include('layouts.partials.msg')
            	<a href="{{route('blog.create')}}" class="btn btn-info">Add New</a>

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Latest News</h4>

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
                        <th>
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
                        <th>
                        status
                      </th>
                      </thead>
                      <tbody>

                       @foreach($apartment as $key=>$slider)
                   <tr>
                       <td>{{$key +1}}</td>
                       
                       <td>{{$slider->title}}</td>
                       <td>{{$slider->description}}</td>
                      
                       
                        <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/blog/'.$slider->image) }}" style="height: 120px; width: 200px"></td>
                       <td>{{$slider->created_at->diffForHumans()}}</td>
                       <td>{{$slider->updated_at->diffForHumans()}}</td>
                        <td>
                        <a href="{{ route('blog.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>

                          <form id="delete-form-{{ $slider->id }}" action="{{ route('blog.destroy',$slider->id) }}" style="display: none;" method="POST">
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

<td>
                                              <input type="checkbox" data-id="{{ $slider->id }}" name="status" class="js-switch" {{ $slider->status == 1 ? 'checked' : '' }}>
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

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
    $('#table').DataTable();
} );



        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
});

$(document).ready(function(){
    $('.js-switch').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let userId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('users.update.status') }}',
            data: {'status': status, 'user_id': userId},
             success: function (data) {
    toastr.options.closeButton = true;
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.closeDuration = 100;
    toastr.success(data.message);
}
        });
    });
});
</script>


@endpush