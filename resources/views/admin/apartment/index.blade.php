@extends('layouts.app')

@section('title','Slider')
@push('css')

<!-- <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css"> -->

@endpush

@section('main-content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	@include('layouts.partials.msg')
            	<a href="{{route('apartment.create')}}" class="btn btn-info">Add New</a>

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Apartment Room</h4>

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
                          Room Name</th>
                        <th >
                         Max Person
                        </th>

                        <th >
                         Roome Size
                        </th>
                        <th >
                         View
                        </th>
                        <th >
                         Bed Num
                        </th>
                        <th >
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
                       <td>{{$slider->room_name}}</td>
                       <td>{{$slider->max_person}}</td>
                       <td>{{$slider->size}}</td>
                      
                       <td>{{$slider->view}}</td>
                       <td>{{$slider->bed}}</td>
                        <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/slider/'.$slider->image) }}" style="height: 120px; width: 200px"></td>
                       <td>{{$slider->created_at->diffForHumans()}}</td>
                       <td>{{$slider->updated_at->diffForHumans()}}</td>


                        <td>
                    <a><button class="btn btn-danger" onclick="deleteData({{ $slider->id }})" type="submit">Delete</button></a>
                </td>
                        <!-- <td>
                        <a href="{{ route('apartment.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>

                          <form id="delete-form-{{ $slider->id }}" action="{{ route('apartment.destroy',$slider->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                              </form>
                                  <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                       document.getElementById('delete-form-{{ $slider->id }}').submit();
                                  }else {
                                                    event.preventDefault();
                                          }"><i class="material-icons">delete</i></button>
                                              </td> -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
	$(document).ready(function() {
    $('#table').DataTable();
} );


   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteData(id){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : "{{ url('apartment') }}" + '/' + id,
                        type : "POST",
                        data : {'_method' : 'DELETE'},
                       /* success: function(){
                            swal({
                                title: "Success!",
                                text : "Post has been deleted \n Click OK to refresh the page",
                                icon : "success",
                            },
                            function(){ 
                                location.reload();
                            });
                        },*/
                          success: function(){
                            swal({
                                title: "Success!",
                                text : "Post has been deleted \n Click OK to refresh the page",
                                icon : "success",
                            }).then(function() {
                                location.reload();
                            });
                        },
                        error : function(){
                            swal({
                                title: 'Opps...',
                                text : data.message,
                                type : 'error',
                                timer : '1500'
                            })
                        }
                    })
                } else {
                swal("Your imaginary file is safe!");
                }
            });
        }
</script>

@endpush