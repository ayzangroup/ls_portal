@extends('admin.layouts.app')

@section('css') 

  <link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

  <script src="{{URL::asset('/Datepicker/datepicker.css')}}"></script>

@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header content-header1">

           <h1 style="float:left;">View Refer Code Detail</h1>

        </div>

           

          <div class="box">

            <!-- /.box-header -->

            <div class="box-body">



              <table id="example1" class="table   table-responsive no-padding video-list1">

                <thead>

                <tr>

                  <th># ID </th>

                  <th>Refer Point Earned</th> 

                  <th>Introduced Point Earned</th>

                  <th>Introduced Point Status</th>

                  <th>Max Point Spent</th>

                  <th>Rate Per Point</th>

                  <th>Point Used</th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                  @if (!empty($refer))

                <tr>

                  <td>{{$refer->id}}</td>

                  <td>{{$refer->pointearned}}</td>

                  <td>{{$refer->introducepointearned}}</td>

                  <td>@if($refer->introducepointstatus=='1') Yes @else No @endif</td>

                  <td>{{$refer->pointspent}}</td>

                  <td>{{$refer->rateperpoint}}</td>

                  <td>@if($refer->pointsUsed=='1') Yes @else No @endif</td>

                  
                  <td>

                    <a href="{{route('admin.edit_refercodedetail',encrypt($refer->id))}}" style="margin-bottom:25px;">

                                                            <i class="fa fa-pencil"></i>

                    </a>

                    @if($refer->pointsUsed == '0')
                    <a href="#publish{{$refer->id}}" data-toggle="modal"><i class="fa fa-check"></i></a>
                    @else
                    <a href="#unpublish{{$refer->id}}" data-toggle="modal"><i class="fa fa-close" style="color:red !important"></i></a>
                    @endif

                  </td>



                </tr>

                                <div class="modal fade" id="unpublish{{ $refer->id }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Unpublish Refer Code Point</h4>

                                                </div>

                                            <form action="{{route('admin.unpublish_refercodedetail')}}" method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body"> Are you want unpublish Refer Code Point. </div>

                                                <input type="hidden" name="id" value="{{$refer->id}}">

                                                <div class="modal-footer">

                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

                                                    <input type="submit" class="btn green">

                                                </div>

                                            </form>

                                            </div>

                                    </div>

                                </div>

                                <!-- publish Model -->



                                <div class="modal fade" id="publish{{ $refer->id }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Publish Refer Code Point</h4>

                                                </div>

                                            <form action="{{route('admin.publish_refercodedetail')}}" method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body"> Are you want publish the Refer Code Point. </div>

                                                <input type="hidden" name="id" value="{{$refer->id}}">

                                                <div class="modal-footer">

                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

                                                    <input type="submit" class="btn green">

                                                </div>

                                            </form>

                                            </div>

                                    </div>

                                </div>

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

<script src="{{URL::asset('/Datepicker/bootstrap-datepicker.js')}}"></script>
<script>
$('#datepicker').datepicker("destroy");
</script>

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