@extends('admin.layouts.app')
@section('css') 
  <link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <style>
     .dataTables_wrapper .table>tbody>tr>td:last-child {
      text-align: left !important;
    }
  </style>
  <link rel="stylesheet" href="{{ URL::asset('css/sweetalert.css')}}">
@endsection
@php $i=1; @endphp
@php $j=2; @endphp
@php $k=3; @endphp
@section('content')
  <div class="content-wrapper">
    <section class="content container-fluid">
        <div class="content-header content-header1">
           <h1 style="float:left;">View Driver User</h1>

           <span class="search-controls" style="float:right;">
             
             <a href="{{route('driver.register')}}" class="btn btn-default fill"> Add Driver </a>  
            </span>
        </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table   table-responsive no-padding video-list1">
                <thead>
                <tr>
                  <th># ID </th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>License Number</th>
                  <th>Aadhar Number</th>
                  <th>Pan Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @if (!empty($data))
                  @foreach($data as $d)
                <tr>
                  <td>{{$d->driverId}}</td>
                  <td>{{$d->driverName}}</td>
                  <td>{{$d->email}}</td>
                  <td>{{$d->phone}}</td>
                  <td>{{$d->licenseNumber}}</td>
                  <td>{{$d->nationalIdNumber}}</td>
                  <td>{{$d->panNumber}}</td>
                  <td>@if($d->status ==0) <span style="color:red;"> Inactive </span> @else <span style="color:green;"> Active </span> @endif</td>
                  <td>
                    <a href="{{route('admin.driver_profile',encrypt($d->driverId))}}" style="margin-bottom:25px;">
                    <i class="fa fa-eye"></i>
                    </a>
                    
                    @if($d->status ==0)
                    <a href="#" onclick="alertApprove<?php echo $i;?>(<?php echo $i;?>,{{ $d->driverId }})" ><i class="fa fa-check"></i></a>
                    @else
                    <a href="#" onclick="alertApprove<?php echo $j;?>(<?php echo $k;?>,{{ $d->driverId }})" ><i class="fa fa-close" style="color:red!important"></i></a>
                    @endif
                  </td>
                  
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
<script src="{{ URL::asset('js/sweetalert.min.js')}}"></script>
<script>

            function alertApprove<?php echo $i;?>(index,user_id){
                
                                
                var APP_URL = {!! json_encode(url('/')) !!}
                var token=$('input[name="_token"]').val();
                swal({
                        title: "Are you sure?",
                        text: "You active the Driver Man!",
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        confirmButtonText: "Yes, active it!",
                        showLoaderOnConfirm: true,
                    },
                    function(){
                        $.ajax(
                            {
                                type: "post",
                                url: APP_URL+"/admin/approve_driver",
                                data: {user_id:user_id,index:index,_token:token},
                                success: function(data){
                                    $("#share-records-image"+index).hide();
                                }
                            }
                        )
                            .done(function(data) {
                                swal("success!", "Approve successfully !", "success");
                                $('#orders-history').load(document.URL +  ' #orders-history');
                                
                                location.reload(true);
                            })
                            .error(function(data) {
                                swal("Oops", "We couldn't connect to the server!", "error");
                            });
                    });
            };
        </script>
<script>

            function alertApprove<?php echo $j;?>(index,user_id){
                
                                
                var APP_URL = {!! json_encode(url('/')) !!}
                var token=$('input[name="_token"]').val();
                swal({
                        title: "Are you sure?",
                        text: "You In active The Driver Man!",
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        confirmButtonText: "Yes, Inactive it!",
                        showLoaderOnConfirm: true,
                    },
                    function(){
                        $.ajax(
                            {
                                type: "post",
                                url: APP_URL+"/admin/approve_driver",
                                data: {user_id:user_id,index:index,_token:token},
                                success: function(data){
                                    $("#share-records-image"+index).hide();
                                }
                            }
                        )
                            .done(function(data) {
                                swal("success!", "Approve successfully !", "success");
                                $('#orders-history').load(document.URL +  ' #orders-history');
                                
                                location.reload(true);
                            })
                            .error(function(data) {
                                swal("Oops", "We couldn't connect to the server!", "error");
                            });
                    });
            };
        </script>
@endsection
@endsection