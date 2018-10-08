@extends('admin.layouts.app')

@section('css')

<link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

<style>

table.dataTable{

  border-collapse: collapse !important;

  border: 1px solid #e4e8e9 !important;

}

</style>

@endsection

@section('content')



  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header content-header1">

           <h1 style="float:left;">View Price</h1>



           <span class="search-controls" style="float:right;">

             

             <a href="{{route('admin.add_price')}}" class="btn btn-default fill"> Add Data </a>  

            </span>

        </div>

           

          <div class="box">

            <!-- /.box-header -->

            <div class="box-body">



              <table id="example1" class="table   table-responsive no-padding video-list1">

                <thead>

                <tr>

                  <th>#ID </th>

                  <th> Item Name </th>

                  <th> Price </th>

                  <th> Discount</th>

                  <th> Margin </th>

                  <th> Tax </th>

                  <th> Last Price </th>

                  <th> Remark </th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                  @if (!empty($data))

                  

                  @foreach($data as $d)

                <tr>

                  <td>{{$d->custPriceListId}}</td>

                  <td>{{ucfirst($d->item_name)}}</td>

                  <td>{{$d->costPrice}}</td>

                  <td>{{$d->discount}}</td>

                  <td>{{$d->margin}}</td>

                  <td>{{$d->tax}}</td>

                  <td>{{$d->rate}}</td>

                  <td>{{$d->remarks}}</td>

                  <td>

                    <a  href="{{route('admin.edit_price',encrypt($d->custPriceListId))}}">

                    <i class="fa fa-pencil"></i>

                    </a>

                    <a href="#delete{{$d->custPriceListId}}"  data-toggle="modal"><i class="fa fa-trash"></i></a>

                  </td>

                </tr>

                <!-- Delete Model -->



                                <div class="modal fade" id="delete{{ $d->custPriceListId }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Delete Price</h4>

                                                </div>

                                            <form action="{{route('admin.delete_price')}}" method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body"> Are you want delete the price. </div>

                                                <input type="hidden" name="id" value="{{$d->custPriceListId}}">

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