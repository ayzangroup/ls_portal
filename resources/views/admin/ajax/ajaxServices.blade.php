<div id="individual" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-12">
            <div class="video-grid">
                <div class="control-bar">      
                    <span class="display-entries">
                        <form>
                        <span>Show</span>
                         <select id="ddlPage" name="ddlPage" onchange="ajaxLoad('{{url('admin/services')}}?pg='+this.value)">
                        
                        <!--ajaxLoad('{{url('admin/user-management')}}?pg='+this.value -->
                            <option {{ ( request()->session()->get('pgc') == 5 ) ? 'selected' : '' }} value="5">5</option>
                            <option {{ ( request()->session()->get('pgc') == 10 ) ? 'selected' : '' }} value="10">10</option>
                            <option  {{ ( request()->session()->get('pgc') == 15 ) ? 'selected' : '' }} value="15">15</option>
                        </select>
                        <span>Users</span>
                        </form>
                    </span><!-- display-users -->
                    <span class="search-controls">
                        <a href="#" data-toggle="modal" data-target="#add-user" class="btn btn-default fill" data-servicename=""
                                    data-serviceslug=""  
                                     data-serviceid="">Add Services</a>  
                        <span class="search-video search_box">
                            <!-- <form id="frmIndSearch" name="frmIndSearch">  -->
                                <!-- <input name="_token" type="hidden" value="{!! csrf_token() !!}" /> -->
                                <input class="search" id="search"
                                value="{{ request()->session()->get('searchc') }}"
                                onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/services')}}?searchc='+this.value)"
                                placeholder="Search Name" name="search"
                                type="text" id="search"/>
                                <button id="btnIndvSearch" name="btnIndvSearch" onclick="ajaxLoad('{{url('admin/services')}}?searchc='+$('#search').val())"><i class="fa fa-search"></i></button>
                            <!-- </form> -->
                        </span> 
                       
                        <span class="search-video">
                            <form>
                                <select type="text" class="category" id="ddlActive" name="ddlActive">
                                    <option value="0">select</option>
                                    
                                    
                                </select>
                            </form>
                        </span> 
                        <!-- || (request()->session()->has('filterc') && request()->session()->get('filterc') != -1) -->
                        @if((request()->session()->has('searchc') && request()->session()->get('searchc') != ''))
                            <span class="search-video">
                            <a href="javascript:void(0);" onclick="javascript:window.location.reload(true/false);" class="">clear</a>
                            <span>
                        @endif     
                    </span><!-- search-controls -->      
                </div><!-- control-bar -->
                <div class="box-body table-responsive no-padding video-list">
                    <table class="table table-hover">
                        <tbody><tr align="center">
                            <!-- <th class="center"><span><input type="checkbox" class="check-all first"></span></th> -->
                            <!-- <th class="center">Profile</th> -->
                            
                            
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/services?fieldc=serviceId&sortc='.(request()->session()->get('sortc')=='asc'?'desc':'asc'))}}')">LS ID</a>
                                {{request()->session()->get('fieldc')=='serviceId'?(request()->session()->get('sortc')=='asc'?'&#9652;':'&#9662;'):''}} 
                            </th>
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/services?fieldc=serviceName&sortc='.(request()->session()->get('sortc')=='asc'?'desc':'asc'))}}')">Name</a>
                                {{request()->session()->get('fieldc')=='serviceName'?(request()->session()->get('sortc')=='asc'?'&#9652;':'&#9662;'):''}}
                            </th>
                            <th class="center">
                                Service Slug
                            </th>
                            <th class="center">Created On</th>
                            <th class="center">Actions</th>
                        </tr>
                        @foreach($serviceDetails as $users)
                            <tr>
                               
                                <td>
                                    <span>{{ $users->serviceId }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->serviceName }}</span>
                                </td>
                               
                                <td>
                                    <span>{{ $users->serviceSlug }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->createdOn }}</span>
                                </td>
                                <td class="actions center">
                                    <span>
                                    <a href="#" data-toggle="modal" class="edit-user" data-target="#add-user" data-servicename="{{ $users->serviceName }}"
                                    data-serviceslug="{{ $users->serviceSlug }}"  
                                     data-serviceid="{{ $users->serviceId }}"><i class="icon edit-c"></i></a>
                                   
                                    </span>
                                </td>
                            </tr>       
                        @endforeach
                    </tbody></table>
                </div><!-- video-list -->        
            </div><!-- card -->
        </div>
        <div class="col-sm-12">           
            <div class="col-xs-12 col-md-5 full-xs">
                <!-- <div class="dataTables_info" id="" role="status" aria-live="polite">Showing 1 to 10 entries of 50</div> -->
            </div>
                        
            <div class="col-xs-12 col-md-7 full-xs">
                <div class="dataTables_paginate paging_simple_numbers pull-right">
                <nav aria-label="Page navigation">
                {{ $serviceDetails->links() }}
                    <!-- <ul class="pagination">
                        <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>
                    </ul> -->
                    </nav>
                </div>
            </div>           
        </div>
    </div><!--/.row-->
</div>