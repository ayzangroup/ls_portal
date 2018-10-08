<div id="individual" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-12">
            <div class="video-grid">
                <div class="control-bar">      
                    <span class="display-entries">
                        <form>
                        <span>Show</span>
                         <select id="ddlPage" name="ddlPage" onchange="ajaxLoad('{{url('admin/user-management')}}?pg='+this.value)">
                        
                        <!--ajaxLoad('{{url('admin/user-management')}}?pg='+this.value -->
                            <option {{ ( request()->session()->get('pg') == 5 ) ? 'selected' : '' }} value="5">5</option>
                            <option {{ ( request()->session()->get('pg') == 10 ) ? 'selected' : '' }} value="10">10</option>
                            <option  {{ ( request()->session()->get('pg') == 15 ) ? 'selected' : '' }} value="15">15</option>
                        </select>
                        <span>Users</span>
                        </form>
                    </span><!-- display-users -->
                    <span class="search-controls">
                        <a href="#" data-toggle="modal" data-target="#add-user" class="btn btn-default fill">Add User</a>  
                        <span class="search-video search_box">
                            <!-- <form id="frmIndSearch" name="frmIndSearch">  -->
                                <!-- <input name="_token" type="hidden" value="{!! csrf_token() !!}" /> -->
                                <input class="search" id="search"
                                value="{{ request()->session()->get('search') }}"
                                onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/user-management')}}?search='+this.value)"
                                placeholder="Search Name" name="search"
                                type="text" id="search"/>
                                <button id="btnIndvSearch" name="btnIndvSearch" onclick="ajaxLoad('{{url('admin/user-management')}}?search='+$('#search').val())"><i class="fa fa-search"></i></button>
                            <!-- </form> -->
                        </span> 
                        <span class="search-video">
                            <form>
                                <select type="text" class="category" id="ddlActive" name="ddlActive" onchange="ajaxLoad('{{url('admin/user-management')}}?filter='+this.value)">
                                    <option {{ ( request()->session()->get('filter') == 0 ) ? 'selected' : '' }} value="0">Inactive</option>
                                    <option {{ ( request()->session()->get('filter') == 1 ) ? 'selected' : '' }} value="1">Active</option>
                                    
                                </select>
                            </form>
                        </span>
                        <!-- || (request()->session()->has('filterc') && request()->session()->get('filterc') != -1) -->
                        @if((request()->session()->has('search') && request()->session()->get('search') != ''))
                            <span class="search-video">
                            <a href="javascript:void(0);" onclick="javascript:window.location.reload(true/false);" class="">clear</a>
                            <span>
                        @endif      
                    </span><!-- search-controls -->      
                </div><!-- control-bar -->
                <div class="box-body table-responsive no-padding video-list">
                    <table class="table table-hover">
                        <tbody><tr align="center">
                            
                            <!-- <th class="center">Profile</th> -->
                            
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/user-management?field=indvCustName&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Name</a>
                                {{request()->session()->get('field')=='indvCustName'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
                            </th>
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/user-management?field=indvLsCustId&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">LS ID</a>
                                {{request()->session()->get('field')=='indvLsCustId'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}} 
                            </th>
                            <th class="center">
                            <a href="javascript:ajaxLoad('{{url('admin/user-management?field=indvCustEmail&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Email</a>
                                {{request()->session()->get('field')=='indvCustEmail'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
                            </th>
                            <th class="center">Mobile</th>
                            <th class="center">Gender</th>
                            <th class="center">Status</th>
                            <th class="center">Actions</th>
                        </tr>
                        @foreach($userDetails as $users)
                            <tr>
                                <!-- <td class="check center">
                                    <span><input type="checkbox" class="checkbox" id="indvUserCheck" name="indvUserCheck"></span>
                                </td> -->
                                <!-- <td class="center">
                                    <span><a href="#" class="profile"><img src="dist/img/default-user-pic.png" width="36" height="36" alt="thumb"></a></span>
                                </td> -->
                                <!-- <td>
                                    <span><a href="#">{{ $users["basic"]["indvCustName"]}}</a></span>
                                </td>
                                <td><span>{{ $users["basic"]["indvLsCustId"]}}</span></td>
                                <td>
                                    <span>{{{ $users["basic"]["indvCustEmail"]}}}</span>
                                </td>
                                <td><span>{{ $users["basic"]["indvCustMobile"]}}</span></td>
                                <td><span>{{ $users["basic"]["gender"]}}</span></td>
                                @if($users["basic"]["indvCustStatus"] == 1)
                                <td><span>Active</span></td>
                                @else
                                <td><span>Inactive</span></td>
                                @endif -->
                                <td>
                                    <span>{{ $users->indvCustName }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->indvLsCustId }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->indvCustEmail }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->indvCustMobile }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->gender }}</span>
                                </td>
                                @if($users->indvCustStatus == 1)
                                <td><span>Active</span></td>
                                @else
                                <td><span>Inactive</span></td>
                                @endif
                                <td class="actions center">
                                    <span>
                                    <a href="#" data-toggle="modal" class="edit-user" data-target="#add-edit-user" data-custname="{{ $users->indvCustName }}"
                                    data-email="{{ $users->indvCustEmail }}" data-mobile="{{ $users->indvCustMobile }}" data-gender="{{ $users->gender }}" 
                                    data-status="{{ $users->indvCustStatus }}" data-userid="{{ $users->indvCustId }}"><i class="icon edit-c"></i></a>
                                    <!-- <a href="#"><i class="icon statistics-c"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#block"><i class="icon block-c"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#delete-contact"><i class="icon trash-c"></i></a> -->
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
                {{ $userDetails->links() }}
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