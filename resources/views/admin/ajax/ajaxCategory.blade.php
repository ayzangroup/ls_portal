<div id="individual" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-12">
            <div class="video-grid">
                <div class="control-bar">      
                    <span class="display-entries">
                        <form>
                        <span>Show</span>
                         <select id="ddlPage" name="ddlPage" onchange="ajaxLoad('{{url('admin/categories')}}?pg='+this.value)">
                        
                        <!--ajaxLoad('{{url('admin/user-management')}}?pg='+this.value -->
                            <option {{ ( request()->session()->get('pgca') == 5 ) ? 'selected' : '' }} value="5">5</option>
                            <option {{ ( request()->session()->get('pgca') == 10 ) ? 'selected' : '' }} value="10">10</option>
                            <option  {{ ( request()->session()->get('pgca') == 15 ) ? 'selected' : '' }} value="15">15</option>
                        </select>
                        <span>Users</span>
                        </form>
                    </span><!-- display-users -->
                    <span class="search-controls">
                        <a href="#" data-toggle="modal" data-target="#add-user" class="btn btn-default fill" data-categoryname=""
                                    data-categoryslug="" data-parentcategory="0"
                                     data-categoryid="">Add Category</a>  
                        <span class="search-video search_box">
                            <!-- <form id="frmIndSearch" name="frmIndSearch">  -->
                                <!-- <input name="_token" type="hidden" value="{!! csrf_token() !!}" /> -->
                                <input class="search" id="search"
                                value="{{ request()->session()->get('searchca') }}"
                                onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/categories')}}?searchca='+this.value)"
                                placeholder="Search Name" name="search"
                                type="text" id="search"/>
                                <button id="btnIndvSearch" name="btnIndvSearch" onclick="ajaxLoad('{{url('admin/categories')}}?searchca='+$('#search').val())"><i class="fa fa-search"></i></button>
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
                        @if((request()->session()->has('searchca') && request()->session()->get('searchca') != ''))
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
                                <a href="javascript:ajaxLoad('{{url('admin/categories?fieldca=categoryId&sortca='.(request()->session()->get('sortca')=='asc'?'desc':'asc'))}}')">Category ID</a>
                                {{request()->session()->get('fieldca')=='categoryId'?(request()->session()->get('sortca')=='asc'?'&#9652;':'&#9662;'):''}} 
                            </th>
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/categories?fieldca=categoryName&sortca='.(request()->session()->get('sortca')=='asc'?'desc':'asc'))}}')">Category Name</a>
                                {{request()->session()->get('fieldca')=='categoryName'?(request()->session()->get('sortca')=='asc'?'&#9652;':'&#9662;'):''}}
                            </th>
                            <th class="center">
                                Category Slug
                            </th>
                            <th class="center">
                                Parent Category
                            </th>
                            
                            <th class="center">Actions</th>
                        </tr>
                        @foreach($categoryDetails as $users)
                            <tr>
                               
                                <td>
                                    <span>{{ $users->categoryId }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->categoryName }}</span>
                                </td>
                               
                                <td>
                                    <span>{{ $users->categorySlug }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->parentCategoryId }}</span>
                                </td>
                                <?php
                                    $parent = 0;
                                    if(isset($users->parentCategoryId) && $users->parentCategoryId != "")
                                    $parent = $users->parentCategoryId;
                                ?>
                                <td class="actions center">
                                    <span>
                                    <a href="#" data-toggle="modal" class="edit-user" data-target="#add-user" data-categoryname="{{ $users->categoryName }}"
                                    data-categoryslug="{{ $users->categorySlug }}" data-parentcategory="<?php echo $parent; ?>"
                                     data-categoryid="{{ $users->categoryId }}"><i class="icon edit-c"></i></a>
                                   
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
                {{ $categoryDetails->links() }}
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