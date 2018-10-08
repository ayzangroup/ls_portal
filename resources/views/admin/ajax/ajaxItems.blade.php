<div id="individual" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-12">
            <div class="video-grid">
                <div class="control-bar">      
                    <span class="display-entries">
                        <form>
                        <span>Show</span>
                         <select id="ddlPage" name="ddlPage" onchange="ajaxLoad('{{url('admin/items-management')}}?pg='+this.value)">
                        
                        <!--ajaxLoad('{{url('admin/user-management')}}?pg='+this.value -->
                            <option {{ ( request()->session()->get('pgit') == 5 ) ? 'selected' : '' }} value="5">5</option>
                            <option {{ ( request()->session()->get('pgit') == 10 ) ? 'selected' : '' }} value="10">10</option>
                            <option  {{ ( request()->session()->get('pgit') == 15 ) ? 'selected' : '' }} value="15">15</option>
                        </select>
                        <span>Users</span>
                        </form>
                    </span><!-- display-users -->
                    <span class="search-controls">
                        <a href="#" data-toggle="modal" data-target="#add-user" class="edit-user btn btn-default fill"  data-itemcode="" data-packageid=""data-categoryid="" 
                        data-itemdesc="" data-itemstatus="" data-itemid="" data-price="" data-quantity="">Add Item</a>  
                        <span class="search-video search_box">
                            <!-- <form id="frmIndSearch" name="frmIndSearch">  -->
                                <!-- <input name="_token" type="hidden" value="{!! csrf_token() !!}" /> -->
                                <input class="search" id="search"
                                value="{{ request()->session()->get('searchit') }}"
                                onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/items-management')}}?searchit='+this.value)"
                                placeholder="Search Name" name="search"
                                type="text" id="search"/>
                                <button id="btnIndvSearch" name="btnIndvSearch" onclick="ajaxLoad('{{url('admin/items-management')}}?searchit='+$('#search').val())"><i class="fa fa-search"></i></button>
                            <!-- </form> -->
                        </span> 
                       
                        
                        <span class="search-video">
                            <form>
                                <select type="text" class="category" id="ddlActive" name="ddlActive" onchange="ajaxLoad('{{url('admin/items-management')}}?filter='+this.value)">
                                    <option  value="-1">select</option>
                                    <!-- <option {{ ( request()->session()->get('filterit') == 0 ) ? 'selected' : '' }} value="0">Inactive</option>
                                    <option {{ ( request()->session()->get('filterit') == 1 ) ? 'selected' : '' }} value="1">Active</option> -->
                                </select>
                            </form>
                        </span>
                        
                        <!-- || (request()->session()->has('filterit') && request()->session()->get('filterit') != -1) -->
                        @if((request()->session()->has('searchit') && request()->session()->get('searchit') != ''))
                            <span class="search-video">
                            <a href="javascript:void(0);" onclick="javascript:window.location.reload(true/false);" class="">clear</a>
                            <span>
                        @endif     
                    </span><!-- search-controls -->      
                </div><!-- control-bar -->
                <?php
                $itemsPreference = $itemsPreference["data"];
                
                //  echo "<pre>";
                //     print_r($itemPackage);
                //     echo "</pre>";
             ?>
                <div class="box-body table-responsive no-padding video-list">
                    <table class="table table-hover">
                        <tbody><tr align="center">
                            <!-- <th class="center"><span><input type="checkbox" class="check-all first"></span></th> -->
                            <!-- <th class="center">Profile</th> -->
                            
                            
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/items-management?fieldit=itemId&sortit='.(request()->session()->get('sortit')=='asc'?'desc':'asc'))}}')">LS ID</a>
                                {{request()->session()->get('fieldit')=='itemId'?(request()->session()->get('sortit')=='asc'?'&#9652;':'&#9662;'):''}} 
                            </th>
                            <th class="center">
                                <a href="javascript:ajaxLoad('{{url('admin/items-management?fieldit=itemCode&sortit='.(request()->session()->get('sortit')=='asc'?'desc':'asc'))}}')">Name</a>
                                {{request()->session()->get('fieldit')=='itemCode'?(request()->session()->get('sortit')=='asc'?'&#9652;':'&#9662;'):''}}
                            </th>
                            <th class="center">
                                Item Description
                            </th>
                            <th class="center">Category</th>
                            <th class="center">Packaging</th>
                            <th class="center">Status</th>
                            <th class="center">Actions</th>
                        </tr>
                        <?php $p = 0; ?>
                        @foreach($itemsPreference as $users)
                    
                            <tr>
                               
                                <td>
                                    <span>{{ $users->itemId }}</span>
                                </td>
                                <td>
                                    <span>{{ $users->itemCode }}</span>
                                </td>
                               
                                <td>
                                    <span>{{ $users->itemDesc }}</span>
                                </td>
                                <td>
                                <?php
                                    $cate = "";
                                    if($users->itemId == $itemCategory[$p]["itemId"])
                                    $cate = $itemCategory[$p]["categoryName"];
                                ?>
                                    <span><?php echo $cate; ?></span>
                                </td>
                                <td>
                                <?php
                                    $pack = "";
                                    if($users->itemId == $itemPackage[$p]["itemId"])
                                    $pack = $itemPackage[$p]["package"];
                                ?>
                                    <span><?php echo $pack; ?></span>
                                </td>
                                
                                @if($users->itemStatus == 1)
                                <td><span>Active</span></td>
                                @else
                                <td><span>Inactive</span></td>
                                @endif
                                <td class="actions center">
                                    <span>
                                    <a href="#" data-toggle="modal" class="edit-user" data-target="#add-user" data-itemcode="{{ $users->itemCode }}" data-packageid="{{ $itemPackage[$p]["pckgId"] }}"
                                    data-categoryid="{{ $itemCategory[$p]["categoryId"] }}" data-itemdesc="{{ $users->itemDesc }}" data-itemstatus="{{ $users->itemStatus }}"
                                     data-itemid="{{ $users->itemId }}" data-price="{{ $users->itemsPreferences[0]->price }}" data-quantity="{{ $users->itemsPreferences[0]->quantity }}"><i class="icon edit-c"></i></a>
                                     
                                    </span>
                                </td>
                            </tr>
                            <?php $p++; ?>       
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
                {{ $itemDetails->links() }}
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