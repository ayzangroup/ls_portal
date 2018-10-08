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

           <h1 style="float:left;">View Coupoan</h1>



           <span class="search-controls" style="float:right;">

             

             <a href="{{route('admin.add_coupoan')}}" class="btn btn-default fill"> Add Data </a>  

            </span>

        </div>

           

          <div class="box">

            <!-- /.box-header -->

            <div class="box-body">



              <table id="example1" class="table   table-responsive no-padding video-list1">

                <thead>

                <tr>

                  <th># ID </th>

                  <th>Coupoan Code</th>

                  <th>Coupoan Type</th>

                  <th>Coupoan Category</th>

                  <th>Coupoan Start Date</th>

                  <th>Coupoan End Date</th>

                  <th>Coupoan Total Days</th>

                  <th>Coupoan Use Limit </th>

                  <th>Min Order Value</th>

                  <th>Max Discount Value</th>

                  <th>Discount Value(%)</th>

                  <th>Status</th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                  @if (!empty($coupoan))

                  @foreach($coupoan as $d)

                <tr>

                  <td>{{$d->uniqueId}}</td>

                  <td>{{$d->couponCode}}</td>

                  <td>{{$d->codeType}}</td>

                  <td>{{$d->couponCategory}}</td>

                  <td>{{$d->validFrom}}</td>

                  <td>{{$d->validUpto}}</td>

                  <td>{{$d->couponDays}}</td>

                  <td>{{$d->useLimit}}</td>

                  <td>{{$d->minOrderValue}}</td>

                  <td>{{$d->discVal}}</td>

                  <td>{{$d->discountPercent}}</td>

                  <td>@if($d->status == '1') <span style="color:green">publish </span> @else <span style="color:red"> unpublish  </span>@endif </td>

                  <td>

                    <a href="{{route('admin.edit_coupoan',encrypt($d->uniqueId))}}" style="margin-bottom:25px;">

                                                            <i class="fa fa-pencil"></i>

                    </a>

                    @if($d->status == '0')
                    <a href="#publish{{$d->uniqueId}}" data-toggle="modal"><i class="fa fa-check"></i></a>
                    @else
                    <a href="#unpublish{{$d->uniqueId}}" data-toggle="modal"><i class="fa fa-close" style="color:red !important"></i></a>
                    @endif

                    <a href="#delete{{$d->uniqueId}}" data-toggle="modal"><i class="fa fa-trash"></i></a>

                  </td>



                </tr>

                <!-- Delete Model -->



                                <div class="modal fade" id="delete{{ $d->uniqueId }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Delete Offer</h4>

                                                </div>

                                            <form action="{{route('admin.delete_coupoan')}}" method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body"> Are you want delete the Coupoan. </div>

                                                <input type="hidden" name="uniqueId" value="{{$d->uniqueId}}">

                                                <div class="modal-footer">

                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

                                                    <input type="submit" class="btn green">

                                                </div>

                                            </form>

                                            </div>

                                    </div>

                                </div>

                              <!-- unpublish Model -->



                                <div class="modal fade" id="unpublish{{ $d->uniqueId }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Unpublish Coupoan</h4>

                                                </div>

                                            <form action="{{route('admin.unpublish_coupoan')}}" method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body"> Are you want unpublish this Coupoan. </div>

                                                <input type="hidden" name="id" value="{{$d->uniqueId}}">

                                                <div class="modal-footer">

                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

                                                    <input type="submit" class="btn green">

                                                </div>

                                            </form>

                                            </div>

                                    </div>

                                </div>

                                <!-- publish Model -->



                                <div class="modal fade" id="publish{{ $d->uniqueId }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Publish Coupoan</h4>

                                                </div>

                                            <form action="{{route('admin.publish_coupoan')}}" method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body"> Are you want publish the Coupoan. </div>

                                                <input type="hidden" name="id" value="{{$d->uniqueId}}">

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