@extends('admin.layouts.app')
@section('css') 
  <link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <style>
     .dataTables_wrapper .table>tbody>tr>td:last-child {
      text-align: left !important;
    }
  </style>
@endsection
@section('content')
  <div class="content-wrapper">
    <section class="content container-fluid">
        <div class="content-header content-header1">
           <h1 style="float:left;">Normal User</h1>
        </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table   table-responsive no-padding video-list1">
                <thead>
                <tr>
                  <th># ID </th>
                  <th> LsCustId </th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Gender</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @if (!empty($data))
                  @foreach($data as $d)
                <tr>
                  <td>{{$d->indvCustId}}</td>
                  <td>{{$d->indvLsCustId}}</td>
                  <td>{{$d->indvCustName}}</td>
                  <td>{{$d->indvCustEmail}}</td>
                  <td>{{$d->indvCustMobile}}</td>
                  <td>{{$d->gender}}</td>
                  <td>@if($d->status ==0) Inactive @else Active @endif</td>
                  
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