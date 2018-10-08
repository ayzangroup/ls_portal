@extends('admin.layouts.app')
@section('css') 
  <link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
  <div class="content-wrapper">
    <section class="content container-fluid">
        <div class="content-header content-header1">
           <h1 style="float:left;">Admin User</h1>

           <span class="search-controls" style="float:right;">
             
             <a href="{{url('admin/add_register')}}" class="btn btn-default fill"> Add Data </a>  
            </span>

        </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table   table-responsive no-padding video-list1">
                <thead>
                <tr>
                  <th># ID </th>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Action </th>
                </tr>
                </thead>
                <tbody>
                  @if (!empty($data))
                  @foreach($data as $d)
                <tr>
                  <td>{{$d->id}}</td>
                  <td>{{$d->name}}</td>
                  <td>{{$d->email}}</td>
                  <td>
                   <a href="#edit{{$d->id}}"  data-toggle="modal">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <a href="#delete{{$d->id}}" data-toggle="modal"><i class="fa fa-trash"></i></a>
                  </td>
                  </tr>

                  <!-- Delete Model -->

                                <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1"  aria-hidden="true" role="basic">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Delete Admin User</h4>
                                                </div>
                                            <form action="{{route('admin.delete_admin')}}" method="post">
                                            {{csrf_field() }}
                                                <div class="modal-body"> Are you want delete the Admin Data. </div>
                                                <input type="hidden" name="id" value="{{$d->id}}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn green">
                                                </div>
                                            </form>
                                            </div>
                                    </div>
                                </div>


                      <!-- Edit Model -->

                                <div class="modal fade" id="edit{{ $d->id }}" tabindex="-1"  aria-hidden="true" role="basic">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Edit Admin Data</h4>
                                                </div>
                                            <form action="{{route('admin.edit_admin')}}" method="post">
                                            {{csrf_field() }}
                                                <div class="modal-body">
                                                    <label >Name:<span class="required"> * </span></label>
                                                </div>
                                                <div class="modal-body"> 
                                                    <input type="text" name="name" class="form-control" value="{{$d->name}}">
                                                </div>
                                                <div class="modal-body">
                                                    <label >Email:<span class="required"> * </span></label>
                                                </div>
                                                <div class="modal-body"> 
                                                    <input type="email" name="email" class="form-control" value="{{$d->email}}" readonly>
                                                </div>
                                                <div class="modal-body">
                                                    <label >Password:<span class="required"> * </span></label>
                                                </div>
                                                <div class="modal-body"> 
                                                    <input type="password" name="password" class="form-control" value="{{$d->password}}">
                                                </div>
                                                <input type="hidden" name="id" value="{{$d->id}}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn green">
                                                </div>
                                            </form>
                                            </div>
                                    </div>
                                </div>

                @endforeach
                @else
                <tr>
                    Data is no exist.
                </tr>
                @endif
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      
          <!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@section('js')
<script src="{{URL::asset('/admin_theme/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('/admin_theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- <script src="{{URL::asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script> -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection
@endsection