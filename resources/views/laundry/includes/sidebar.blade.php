<aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{ route('laundry.dashboard')}}"><img src="{{URL::asset('dist/img/dashboard.png')}}" alt=""> <span>Dashboard</span></a></li>
        <!-- <li><a href="{{ route('user.booking')}}"><img src="{{URL::asset('dist/img/laundry.png')}}" alt=""> <span>Book a Laundry</span></a></li> -->
  <!--       <li><a href="{{ route('user.price_calculator') }}"><i class="fa fa-calculator"></i> <span>Price Calculator</span></a></li> -->
         <li class="treeview">
          <a href="#" class="treeview-order"><img src="{{URL::asset('dist/img/order.png')}}" alt=""> <span>Order</span>
            <span class="pull-right-container ">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <!-- <ul class="treeview-menu">
            <li><a href="{{ route('user.order_history') }}"><i class="fa fa-hourglass-end"></i> Order History</a></li>
            <li><a href="{{ route('user.track') }}"><i class="fa fa-truck"></i> Track Order</a></li>
          </ul> -->
        </li>
        <!-- <li><a href="{{ route('user.calender') }}"><img src="{{URL::asset('dist/img/calendar.png')}}" alt=""> <span>Calendar</span></a></li> -->
        <li><a href="#"><img src="{{URL::asset('dist/img/offer.png')}}" alt=""> <span>Offer </span></a></li>
        <li><a href="#"><i class="fa fa-question-circle"></i> <span>FAQ</span></a></li>
        <!-- <li><a href="{{ route('user.refer') }}"><img src="{{URL::asset('dist/img/refer.png')}}" alt=""> <span>Refer &amp; Earn</span></a></li> -->
        <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> <span>Help</span></a></li>
      </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
  </aside><!-- left-side menu -->