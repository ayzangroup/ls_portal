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

           <h1 style="float:left;">View Offer</h1>



           <span class="search-controls" style="float:right;">

             

             <a href="{{route('admin.add_offers')}}" class="btn btn-default fill"> Add Data </a>  

            </span>

        </div>

           

          <div class="box">

            <!-- /.box-header -->

            <div class="box-body">



              <table id="example1" class="table   table-responsive no-padding video-list1">

                <thead>

                <tr>

                  <th># ID </th>

                  <th>Offer Code</th>

                  <th>Offer Description</th>

                  <th>Image</th>

                  <th>Offer Type</th>

                  <th>Offer Start Date</th>

                  <th>Offer End Date</th>

                  <th>Offer Total Days</th>

                  <th>User Name</th>

                  <th>User Type</th>

                  <th>Min Order Value</th>

                  <th>Discount Value(%)</th>

                  <th>Max Discount Value</th>

                  <th>Status</th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                  @if (!empty($data))

                  @foreach($data as $d)

                <tr>

                  <td>{{$d->id}}</td>

                  <td>{{$d->offerCode}}</td>

                  <td>{{$d->offerDescription}}</td>

                  <td><img src="{{URL::asset('images/offers_images/'.$d->offerImage)}}" style="height:100px;width:75px;"></td>

                  <td>{{$d->offerType}}</td>

                  <td>{{$d->offerStartDate}}</td>

                  <td>{{$d->offerEndDate}}</td>

                  <td>{{$d->offerTotalDays}}</td>
                  

                  <td>@foreach($d->username as $userDetail) @if($userDetail != '') @if($d->userType=='user') {{$userDetail->indvCustEmail}}, @else {{$userDetail->corpoarateEmail}}, @endif @endif @endforeach</td>

                  <td>{{$d->userType}}</td>

                  <td>{{$d->minOrderValue}}</td>

                  <td>{{$d->discountPercent}}</td>

                  <td>{{$d->maxdiscVal}}</td>

                  <td >@if($d->status == '1') <span style="color:green">publish </span> @else <span style="color:red"> unpublish  </span>@endif </td>

                  <td>

                    <a href="{{route('admin.edit_offers',encrypt($d->id))}}" style="margin-bottom:25px;">

                                                            <i class="fa fa-pencil"></i>

                    </a>
                    @if($d->status == '0')
                    <a href="#publish{{$d->id}}" data-toggle="modal"><i class="fa fa-check"></i></a>
                    @else
                    <a href="#unpublish{{$d->id}}" data-toggle="modal"><i class="fa fa-close"  style="color:red"></i></a>
                    @endif

                    <a href="#delete{{$d->id}}" data-toggle="modal"><i class="fa fa-trash"></i></a>

                  </td>



                </tr>

                <!-- Delete Model -->



                                <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Delete Offer</h4>

                                                </div>

                                            <form action="{{route('admin.delete_offers')}}" method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body"> Are you want delete the offer. </div>

                                                <input type="hidden" name="id" value="{{$d->id}}">

                                                <div class="modal-footer">

                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

                                                    <input type="submit" class="btn green">

                                                </div>

                                            </form>

                                            </div>

                                    </div>

                                </div>

                                <!-- unpublish Model -->



                                <div class="modal fade" id="unpublish{{ $d->id }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Unpublish Offer</h4>

                                                </div>

                                            <form action="{{route('admin.unpublish_offers')}}" method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body"> Are you want unpublish this offer. </div>

                                                <input type="hidden" name="id" value="{{$d->id}}">

                                                <div class="modal-footer">

                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

                                                    <input type="submit" class="btn green">

                                                </div>

                                            </form>

                                            </div>

                                    </div>

                                </div>

                                <!-- publish Model -->



                                <div class="modal fade" id="publish{{ $d->id }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Publish Offer</h4>

                                                </div>

                                            <form action="{{route('admin.publish_offers')}}" method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body"> Are you want publish the offer. </div>

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