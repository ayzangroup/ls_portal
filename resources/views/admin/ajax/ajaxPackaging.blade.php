<div id="individual" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-12">
            <div class="video-grid">
                <div class="control-bar">      
                    <span class="display-entries">
                        <form>
                        <span>Show</span>
                         <select id="ddlPage" name="ddlPage" onchange="ajaxLoad('{{url('admin/packagings')}}?pg='+this.value)">
                        
                        <!--ajaxLoad('{{url('admin/user-management')}}?pg='+this.value -->
                            <option {{ ( request()->session()->get('pgcp') == 5 ) ? 'selected' : '' }} value="5">5</option>
                            <option {{ ( request()->session()->get('pgcp') == 10 ) ? 'selected' : '' }} value="10">10</option>
                            <option  {{ ( request()->session()->get('pgcp') == 15 ) ? 'selected' : '' }} value="15">15</option>
                        </select>
                        <span>Users</span>
                        </form>
                    </span><!-- display-users -->
                    <span class="search-controls">
                        <a href="#" data-toggle="modal" data-target="#add-user" class="btn btn-default fill" data-packagingname=""
                                    data-packagingtype="" 
                                     data-packagingid="">Add Packaging</a>  
                        <span class="search-video search_box">
                            <!-- <form id="frmIndSearch" name="frmIndSearch">  -->
                                <!-- <input name="_token" type="hidden" value="{!! csrf_token() !!}" /> -->
                                <input class="search" id="search"
                                value="{{ request()->session()->get('searchp') }}"
                                onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/packagings')}}?searchp='+this.value)"
                                placeholder="Search Name" name="search"
                                type="text" id="search"/>
                                <button id="btnIndvSearch" name="btnIndvSearch" onclick="ajaxLoad('{{url('admin/packagings')}}?searchp='+$('#search').val())"><i class="fa fa-search"></i></button>
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
                        @if((request()->session()->has('searchp') && request()->session()->get('searchp') != ''))
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
                                <a href="javascript:ajaxLoad('{{url('admin/packagings?fieldp=packagingId&sortp='.(request()->session()->get('sortp')=='asc'?'desc':'asc'))}}')">Packaging ID</a>
                                {{request()->session()->get('fieldp')=='packagingId'?(request()->session()->get('sortp')=='asc'?'&#9652;':'&#9662;'):''}} 
                            </th>
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/packagings?fieldp=packagingName&sortp='.(request()->session()->get('sortp')=='asc'?'desc':'asc'))}}')">Packaging Name</a>
                                {{request()->session()->get('fieldp')=='packagingName'?(request()->session()->get('sortp')=='asc'?'&#9652;':'&#9662;'):''}}
                            </th>
                            <th class="center">
                                Packaging Type
                            </th>
                            
                            
                            <th class="center">Actions</th>
                        </tr>
                        @foreach($packagingDetails as $users)
                            <tr>
                               
                                <td>
                                    <span>{{ $users->packagingId }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->packagingName }}</span>
                                </td>
                               
                                <td>
                                    <span>{{ $users->packagingType }}</span>
                                </td>
                                
                                <td class="actions center">
                                    <span>
                                    <a href="#" data-toggle="modal" class="edit-user" data-target="#add-user" data-packagingname="{{ $users->packagingName }}"
                                    data-packagingtype="{{ $users->packagingType }}" data-packagingid="{{ $users->packagingId }}"><i class="icon edit-c"></i></a>
                                   
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
                {{ $packagingDetails->links() }}
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