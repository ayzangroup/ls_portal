@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')

  <div class="content-wrapper">
    <section class="content container-fluid">

       <!-- page content starts here -->     
        <div class="content-header content-header1">
           <h1 style="float:left;">View Contact Us Messages</h1>
        </div>
           
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table   table-responsive no-padding video-list1">
                <thead>
                <tr>
                  <th># ID </th>
                  <th> Name </th>
                  <th>Email</th>
                  <th>Phone </th>
                  <th>Message </th>
                </tr>
                </thead>
                <tbody>
                  @if (!empty($data))
                  
                  @foreach($data as $d)
                <tr>
                  <td>{{$d->id}}</td>
                  <td>{{ucfirst($d->name)}}</td>
                  <td>{{$d->email}}</td>
                  <td>{{$d->phone}}</td>
                  <td>{{ucfirst($d->message)}}</td>
                </tr>

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