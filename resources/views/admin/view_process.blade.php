@extends('admin.layouts.app')

@section('css')

<link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')



  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header content-header1">

           <h1 style="float:left;">View Process</h1>



           <span class="search-controls" style="float:right;">

             

             @if(count($data)<=2)

             <a href="{{url('admin/add_process')}}" class="btn btn-default fill"> Add Data </a>  

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

                  <th> Title </th>

                  <th>Image</th>

                  <th>Description </th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                  @if (!empty($data))

                  

                  @foreach($data as $d)

                <tr>

                  <td>{{$d->id}}</td>

                  <td>{{$d->title}}</td>

                  <td><img src="{{URL::asset('images/process_images/'.$d->logo)}}" style="height:100px;width:75px;"></td>

                  <td>{{$d->description}}</td>

                  <td>

                    <a  href="{{route('admin.edit_process',encrypt($d->id))}}" style="    margin-bottom: 10px;">

                                                            <i class="fa fa-pencil"></i>

                    </a>

                    

<!--                     <a href="#delete{{$d->id}}" data-toggle="modal"><i class="fa fa-trash"></i></a>

                     -->

                  </td>

                </tr>

                <!-- Delete Model -->



                                <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Delete Process</h4>

                                                </div>

                                            <form action="{{route('admin.delete_process')}}" method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body"> Are you want delete the process. </div>

                                                <input type="hidden" name="id" value="{{$d->id}}">

                                                <div class="modal-footer">

                                                    <button type="button" class="btn" style="border: 1px solid;background: white;width:80px ! important" data-dismiss="modal">Close</button>

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