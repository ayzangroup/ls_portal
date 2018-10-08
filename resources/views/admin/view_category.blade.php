@extends('admin.layouts.app')

@section('css')

<link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')



  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header content-header1">

           <h1 style="float:left;">View Category Management</h1>

        </div>





        <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-category"  method="post" action="{{route('admin.submit_category')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">

                

                <div class="form-group">

                    <label class="col-md-2">Category Name:<span class="required"> * </span></label>

                      <div class="col-md-8">  

                        <input type="text" name="categoryName" class="form-control">

                      </div>

                    <input type="submit" class="btn btn-primary col-md-2">

                </div>

               </div>

                 

            </form>

            



          </div><!-- /.box-content -->

        </div><!-- box -->

           

          <div class="box">

            <!-- /.box-header -->

            <div class="box-body">



              <table id="example1" class="table   table-responsive no-padding video-list1">

                <thead>

                <tr>

                  <th># ID </th>

                  <th>Name </th>

                  <th>Slug</th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                  @if (!empty($data))



                  @foreach($data as $d)



                <tr>

                  <td>{{$d->categoryId}}</td>

                  <td>{{$d->categoryName}}</td>

                  <td>{{$d->categorySlug}}</td>

                  <td>

                    <a href="#edit{{$d->categoryId}}" data-toggle="modal"><i class="fa fa-pencil"></i>

                    </a>

                    <a href="#delete{{$d->categoryId}}" data-toggle="modal"><i class="fa fa-trash"></i></a>

                  </td>

                </tr>

                <!-- Delete Model -->



                    <div class="modal fade" id="delete{{ $d->categoryId }}" tabindex="-1"  aria-hidden="true" role="basic">

                            <div class="modal-dialog modal-sm">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                        <h4 class="modal-title">Delete Category</h4>

                                    </div>

                                <form action="{{route('admin.delete_category')}}" method="post">

                                {{csrf_field() }}

                                    <div class="modal-body"> Are you want delete the Category. </div>

                                    <input type="hidden" name="id" value="{{$d->categoryId}}">

                                    <div class="modal-footer">

                                        <button type="button" class="btn" style="border: 1px solid;background: white;width:80px ! important" data-dismiss="modal">Close</button>

                                        <input type="submit" class="btn green">

                                    </div>

                                </form>

                                </div>

                        </div>

                    </div>



              

                     <!-- Edit Model -->



                                <div class="modal fade" id="edit{{ $d->categoryId }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Edit Category</h4>

                                                </div>

                                            <form action="{{route('admin.update_category')}}"  method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body">

                                                    <label >Category Name:<span class="required"> * </span></label>

                                                </div>

                                                <div class="modal-body"> 

                                                    <input type="text" name="categoryName" class="form-control" value="{{$d->categoryName}}" required="required">

                                                </div>

                                                <input type="hidden" name="id" value="{{$d->categoryId}}">

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

<script>

             $(document).ready(function(){

                $('.add-category').validate({



                    rules: {                       

                        categoryName: {

                            required: true

                        }                        

                    }

                });

            });

        </script>



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