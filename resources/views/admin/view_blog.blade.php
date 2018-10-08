@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')

  <div class="content-wrapper">
    <section class="content container-fluid">

       <!-- page content starts here -->     
        <div class="content-header content-header1">
           <h1 style="float:left;">View Blog</h1>

           <span class="search-controls" style="float:right;">
             
            @if(count($data)==0)
             <a href="{{route('admin.add_blog')}}" class="btn btn-default fill"> Add Data </a>
             @else
              <a href="{{route('admin.add_blog')}}" class="btn btn-default fill"> Edit Data </a>
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
                  <th>Heading</th>
                  <th>Description</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tbody>
                  @if (!empty($data))
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->heading}}</td>
                  <td>{{$data->description}}</td>
                  <td><img src="{{URL::asset('images/blog_images/'.$data->image)}}" style="height:100px;width:75px;"></td>
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