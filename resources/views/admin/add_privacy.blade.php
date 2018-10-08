<!DOCTYPE html>

<!--

This is a starter template page. Use this page to start your new project from

scratch. This page gets rid of all links and provides the needed markup only.

-->

<html>

<head>

  @include('admin.includes.head')

</head>



<body class="hold-transition skin-blue-light sidebar-mini">

<div class="wrapper">



  <!-- Main Header -->

  <header class="main-header">

    @include('admin.includes.header')

  </header>



  <aside class="main-sidebar">

    @include('admin.includes.sidebar')

  </aside><!-- left-side menu -->



  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->

       <div class="content-header content-header1">     

        <h1 style="float:left;">Privacy and Policy</h1>

           <span class="search-controls" style="float:right;">

             

             <a href="{{route('admin.view_privacy')}}" class="btn btn-default fill"> View Privacy</a>  

            </span>

        </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal" method="post" action="{{route('admin.submit_privacy')}}">

                

                {{ csrf_field()}} 



                <div class="box-body">

                <div class="form-group">

                    <label >Description:<span class="required"> * </span></label>

                </div>

                    <div class="form-group" style="margin:0px;">

                      @if(!empty($data))

                        <textarea class="form-control mymce" name="description" style="height:200px;">{{ $data->description }}</textarea>

                        <input type="hidden" name="id" value="{{encrypt($data->id)}}">

                      @else

                       <textarea class="form-control mymce" name="description" style="height:200px;"></textarea>

                       @endif

                    </div>

                </div>

              <div class="modal-footer center-btn" style="display: flex;justify-content: center">

                <button type="submit" class="btn btn-default fill pull-left" name="saveBtn" id="saveBtn">Save</button>

                <button type="button" class="btn btn-default outline pull-left" data-dismiss="modal" onclick="history.go(-1);">Cancel</button>

              </div>

          </form>

            



          </div><!-- /.box-content -->

        </div><!-- box -->

      <!-- page content ends here -->



    </section><!-- /.content -->

</div><!-- /.content-wrapper -->



<footer class="main-footer">

@include('admin.includes.footer') 

</footer>



</div>

<!-- ./wrapper -->



@include('admin.includes.foot')



</body>

</html>