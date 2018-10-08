@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')

  <div class="content-wrapper">
    <section class="content container-fluid">

       <!-- page content starts here -->     
        <div class="content-header content-header1">
           
           <h1 style="float:left;">View Contact Us Data</h1>

           <span class="search-controls" style="float:right;">
             @if(count($data)=='0')
             <a href="{{url('admin/add_contactus')}}" class="btn btn-default fill">  Add Data </a>
             @else
              <a href="{{route('admin.edit_contactus', encrypt($data->id))}}" class="btn btn-default fill">  Edit Data </a> 
             @endif
            </span>
      
        </div>
           
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table   table-responsive no-padding video-list1">
                <thead>
                <tr>
                  <th># ID </th>
                  <th> Lanuages and Phone Number </th>
                  <th> Email </th>
                  <th> Iframe </th>
                </tr>
                </thead>
                <tbody>
                  @if (!empty($data))
                  
                  @php
                  $data1=json_decode($data->data);
                  
                  @endphp
                <tr>
                  <td>{{$data->id}}</td>
                  <td>
                    @foreach ($data1 as $key => $value)
                    <strong>{{$key}} </strong> : {{$value}} <br>
                    @endforeach
                   </td>
                  <td>{{$data->email}}</td>
                  <td>{!! $data->iframe !!}</td>
                </tr>

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