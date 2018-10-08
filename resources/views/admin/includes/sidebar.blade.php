<aside class="main-sidebar">

<section class="sidebar">



      <ul class="sidebar-menu" data-widget="tree">



        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-mercury" ></i><span>Dashboard</span></a></li>



        <li class="treeview">

          <a href="#" class="treeview-order"><i class="fa fa-user" ></i> <span>User</span>

            <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>

          </a>

          <ul class="treeview-menu">

           <li><a href="{{route('admin.view_user')}}"><i class="fa fa-user" ></i><span>Individual User</span></a></li>

           <li><a href="{{route('admin.view_corpuser')}}"><i class="fa fa-user" ></i><span>Corporate User</span></a></li>

           <li><a href="{{route('admin.view_adminuser')}}"><i class="fa fa-user" ></i><span>Panel User </span></a></li>

          </ul>

        </li>



      

        <li><a href="{{route('admin.view_driver')}}"><i class="fa fa-user" ></i><span>Driver </span></a></li>



        <li><a href="{{route('admin.view_laundry')}}"><i class="fa fa-user" ></i><span>Laundryman </span></a></li> 

        

        <li class="treeview">

          <a href="#" class="treeview-order"><i class="fa fa-address-book-o" ></i> <span>Address</span>

            <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>

          </a>

          <ul class="treeview-menu" >

           <li><a href="{{route('admin.view_useraddress')}}"><i class="fa fa-address-book-o" ></i><span>Individual Address</span></a></li>

           <li><a href="{{route('admin.view_corpuseraddress')}}"><i class="fa fa-address-book-o" ></i><span>Corporate Address</span></a></li>

           </ul>

        </li>





        <li class="treeview">

        <!-- <a href="#" class="treeview-order"><i class="fa fa-user" ></i> <span>CMS</span> -->

          <a href="#" ><i class="fa fa-cogs" ></i> <span>CMS</span>

              <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>

          </a>

          <ul class="treeview-menu">

            <li class="treeview">

              <a href="#" ><i class="fa fa-wrench" ></i> <span>FAQ</span>

                  <span class="pull-right-container">

                    <i class="fa fa-angle-left pull-right"></i>

                  </span>

              </a>

              <ul class="treeview-menu">

                <li><a href="{{route('admin.faqtitle')}}"><i class="fa fa-hourglass-end"></i> Faq Title</a></li>

                <li><a href="{{route('admin.view_faq')}}"><i class="fa fa-truck"></i> View Faq</a></li>

              </ul>

            </li>

            <li><a href="{{url('/admin/term_and_condition')}}"><i class="fa fa-venus"></i> Terms And Condition</a></li>

            <li><a href="{{url('/admin/view_privacy')}}"><i class="fa fa-universal-access"></i> Privacy And Policy</a></li>

            <li><a href="{{url('/admin/view_banner')}}"><i class="fa fa-image"></i> Banner</a></li>

             <li><a href="{{route('admin.view_serve')}}"><i class="fa fa-cog"></i> Serve</a></li>

             <li><a href="{{route('admin.view_process')}}"><i class="fa fa-spinner"></i> Process</a></li>

             <li><a href="{{route('admin.view_whyus')}}"><i class="fa fa-question"></i>Why Us</a></li>

             <li><a href="{{route('admin.view_contactus')}}"><i class="fa fa-mobile"></i>Contact Us</a></li>

             <li><a href="{{route('admin.view_blog')}}"><i class="fa fa-tv"></i>Blog</a></li>

          </ul>

        </li>



                



        <li><a href="{{route('admin.view_services')}}"><i class="fa fa-cog" ></i><span>Service </span></a></li>



        <li><a href="{{route('admin.view_category')}}"><i class="fa fa-list-ul" ></i><span>Category </span></a></li>



        <li><a href="{{route('admin.view_packaging')}}"><i class="fa fa-gift" ></i><span>Packaging </span></a></li>



        <li><a href="{{route('admin.view_items')}}"><i class="fa fa-shopping-bag" ></i><span>Items </span></a></li>



        <li><a href="{{route('admin.view_price')}}"><i class="fa fa-inr" ></i><span>Price </span></a></li>



        <li><a href="{{route('admin.view_request')}}"><i class="fa fa-info-circle" ></i><span>Request</span></a></li>



        <li><a href="{{route('admin.view_messages')}}"><i class="fa fa-envelope" ></i><span>Messages</span></a></li>



        <li><a href="{{route('admin.view_offers')}}"><i class="fa fa-umbrella" ></i><span>Offers</span></a></li>

        <li><a href="{{route('admin.view_coupoan')}}"><i class="fa fa-umbrella" ></i><span>Coupoan</span></a></li>

        <li><a href="{{route('admin.view_feedback')}}"><i class="fa fa-umbrella" ></i><span>Feedback</span></a></li>

        <li><a href="{{route('admin.view_complaint')}}"><i class="fa fa-umbrella" ></i><span>Complaints</span></a></li>

        <li><a href="{{route('admin.send_notification')}}"><i class="fa fa-comment" ></i><span>Notification </span></a></li>

        <li><a href="{{route('admin.refercode_detail')}}"><i class="fa fa-comment" ></i><span>Refer Code Detail </span></a></li>

        <li><a href="{{route('admin.send_sms')}}"><i class="fa fa-comment" ></i><span>Send Sms </span></a></li>
        

        <li class="treeview">

          <a href="#" class="treeview-order"><i class="fa fa-shopping-cart" ></i> <span>Order</span>

            <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="{{route('admin.order_history')}}"><i class="fa fa-shopping-cart"></i> Order History</a></li>

            <li><a href="{{route('admin.place_order')}}"><i class="fa fa-truck"></i> Place Order</a></li>

            <li><a href="{{route('admin.cancel_order')}}"><i class="fa fa-truck"></i> Cancel Order</a></li>

          </ul>

        </li>





        <li><a href="#"><i class="fa fa-exchange" ></i><span>Service Transaction </span></a></li>



        



        <li><a href="#"><i class="fa fa-paypal" ></i><span>Payment </span></a></li>



      </ul><!-- /.sidebar-menu -->



    </section><!-- /.sidebar -->

</aside>