@extends('admin.layouts.app')

@section('css')

<link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')



  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header content-header1">

           <h1 style="float:left;">View Place Order</h1>

        </div>

           

          <div class="box">

            <!-- /.box-header -->

            <div class="box-body">



              <table id="example1" class="table   table-responsive no-padding video-list1">

                <thead>

                <tr>

                  <th># orderId </th>

                  <th> User Name </th>

                  <th>User Email</th>

                  <th>User Phone</th>

                  <th>PickUp Date</th>

                  <th>Delivery Date </th>

                  <th>Service Name </th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                  @if (!empty($place_order))

                  

                  @foreach($place_order as $d)

                <tr>

                  <td>{{$d->orderId}}</td>

                  <td>{{$d->username}}</td>

                  <td>{{$d->email}}</td>

                  <td>{{$d->mobile}}</td>

                  <td>{{$d->actPickUpDate}}</td>

                  <td>{{$d->actDeliveryDate}}</td>

                  <td>{{$d->serviceName}}</td>

                  <td>
                    <a href="{{route('admin.order_details',encrypt($d->orderId))}}" style="margin-bottom:25px;">

                    <i class="fa fa-eye"></i>

                    </a>
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

@endsection

@endsection