<div id="individual" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-12">
            <div class="video-grid">
                <div class="control-bar">      
                    <span class="display-entries">
                        <form>
                        <span>Show</span>
                         <select id="ddlPage" name="ddlPage" onchange="ajaxLoad('{{url('admin/corp-user')}}?pg='+this.value)">
                        
                        <!--ajaxLoad('{{url('admin/user-management')}}?pg='+this.value -->
                            <option {{ ( request()->session()->get('pgc') == 5 ) ? 'selected' : '' }} value="5">5</option>
                            <option {{ ( request()->session()->get('pgc') == 10 ) ? 'selected' : '' }} value="10">10</option>
                            <option  {{ ( request()->session()->get('pgc') == 15 ) ? 'selected' : '' }} value="15">15</option>
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
                                value="{{ request()->session()->get('searchc') }}"
                                onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/corp-user')}}?searchc='+this.value)"
                                placeholder="Search Name" name="search"
                                type="text" id="search"/>
                                <button id="btnIndvSearch" name="btnIndvSearch" onclick="ajaxLoad('{{url('admin/corp-user')}}?searchc='+$('#search').val())"><i class="fa fa-search"></i></button>
                            <!-- </form> -->
                        </span> 
                       
                        <span class="search-video">
                            <form>
                                <select type="text" class="category" id="ddlActive" name="ddlActive" onchange="ajaxLoad('{{url('admin/corp-user')}}?filter='+this.value)">
                                    <option {{ ( request()->session()->get('filterc') == 0 ) ? 'selected' : '' }} value="0">Inactive</option>
                                    <option {{ ( request()->session()->get('filterc') == 1 ) ? 'selected' : '' }} value="1">Active</option>
                                    
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
                                <a href="javascript:ajaxLoad('{{url('admin/corp-user?fieldc=corporationName&sortc='.(request()->session()->get('sortc')=='asc'?'desc':'asc'))}}')">Name</a>
                                {{request()->session()->get('fieldc')=='corporationName'?(request()->session()->get('sortc')=='asc'?'&#9652;':'&#9662;'):''}}
                            </th>
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/corp-user?fieldc=corpLsCustId&sortc='.(request()->session()->get('sortc')=='asc'?'desc':'asc'))}}')">LS ID</a>
                                {{request()->session()->get('fieldc')=='corpLsCustId'?(request()->session()->get('sortc')=='asc'?'&#9652;':'&#9662;'):''}} 
                            </th>
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/corp-user?fieldc=concernPerson&sortc='.(request()->session()->get('sortc')=='asc'?'desc':'asc'))}}')">Concern Person</a>
                                {{request()->session()->get('fieldc')=='concernPerson'?(request()->session()->get('sortc')=='asc'?'&#9652;':'&#9662;'):''}} 
                            </th>
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/corp-user?fieldc=concernPersonEmail&sortc='.(request()->session()->get('sortc')=='asc'?'desc':'asc'))}}')">Concern Email</a>
                                {{request()->session()->get('fieldc')=='concernPersonEmail'?(request()->session()->get('sortc')=='asc'?'&#9652;':'&#9662;'):''}}
                            </th>
                            <th class="center">Concern Mobile</th>
                            <th class="center">Corporate Email</th>
                            <th class="center">Status</th>
                            <th class="center">Actions</th>
                        </tr>
                        @foreach($userDetails as $users)
                            <tr>
                                <!-- <td class="check center">
                                    <span><input type="checkbox" class="checkbox" id="indvUserCheck" name="corpUserCheck[]"></span>
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
                                    <span>{{ $users->corporationName }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->corpLsCustId }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->concernPerson }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->concernPersonEmail }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->concerPersonMobile }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->corpoarateEmail }}</span>
                                </td>
                                @if($users->corpCustStatus == 1)
                                <td><span>Active</span></td>
                                @else
                                <td><span>Inactive</span></td>
                                @endif
                                <td class="actions center">
                                    <span>
                                    <a href="#" data-toggle="modal" data-target="#add-edit-user" class="edit-user" data-target="#add-edit-user" data-companyname="{{ $users->corporationName }}"
                                    data-concernperson="{{ $users->concernPerson }}" data-cpemail="{{ $users->concernPersonEmail }}" data-cpmobile="{{ $users->concerPersonMobile }}" 
                                    data-status="{{ $users->corpCustStatus }}" data-userid="{{ $users->corpCustId }}" data-corpemail="{{ $users->corpoarateEmail }}"><i class="icon edit-c"></i></a>
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