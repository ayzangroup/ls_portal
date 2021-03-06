<!-- Main Header -->

  <header class="main-header">



   <!-- Logo -->

    <a href="{{ route('driver.dashboard')}}" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini">

        <img src="{{URL::asset('dist/img/logo-sm.png')}}" alt="">

      </span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg">

        <img src="{{URL::asset('dist/img/logo.png')}}" alt="">

      </span>

    </a>



    <!-- Header Navbar -->

    <nav class="navbar navbar-static-top" role="navigation">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>

      <!-- Navbar Right Menu -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <!-- <li class="points-list">Points Earned : <span>467</span></li> -->

          <!-- user menu -->

          

            <!-- Menu Toggle Button -->

             @php

                    $user=Auth::guard('driver')->user();
                    $notification=$user->driverNotification;                

            @endphp



          <li class="dropdown user user-menu header-user-profile">

            <a href="#" class="dropdown-toggle user-drop" data-toggle="dropdown">

              @if(!empty($user->socialImage))

              <img src="{{$user->socialImage}}" class="user-image " alt="User Image" >

              @else

              <img src="{{ URL::to('/') }}/dist/img/user.png" class="user-image " alt="User Image">

              @endif

              <h5>{{ $user->driverName }}</h5>

            </a>

            <ul class="dropdown-menu login-dropdown-menu">

              <!-- The user image in the menu -->

              <li>

                <a href="#">

                  <div class="name-details">

                    @if(!empty($user->socialImage))

              <img src="{{$user->socialImage}}" class="user-image " alt="User Image" >

              @else

              <img src="{{ URL::to('/') }}/dist/img/user.png" class="user-image " alt="User Image">

              @endif    

                    <h5>{{ $user->driverName }}</h5>

                    <span>{{ $user->email }}</span>

                  </div>

                </a>

              </li>



              <!-- <li><a href="{{route('user.myprofile')}}"><i class="fa fa-user"></i> <span>My Profile</span></a></li>



              <li><a href="{{ route('user.setting') }}"><i class="fa fa-cog"></i> <span>Setting</span></a></li> -->

              <li>

                <a href="{{ url('driver/logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">



                  <i class="fa fa-sign-out" aria-hidden="true"></i> Logout



                </a> 



                <form id="frm-logout" action="{{ route('driver.logout') }}" method="POST" style="display: none;">



                  {{ csrf_field() }}



               </form> 



              </li>



            </ul>

          </li>



            <!-- notification-menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="{{url('/user/setting#notification')}}" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell">{{count($notification)}}</i>
            </a>

            
            <ul class="dropdown-menu notification-dropdown">
              <h4>Notifications</h4>
               @foreach($notification as $message)

                <li>
                    <div class="notification-bell">
                      <div class="notification-icon">
                      </div>
                      <div class="notification-text">
                        <span><b>New Booking Order Id:</b><br>{{$message->orderid}}</span>
                        <p><b>Quantity:</b> {{$message->orderdetail->itemCount}}</p>
                        <p><b>Amount:</b> {{$message->orderdetail->netAmount}}</p>
                        <p><b>Address:</b> {{$message->orderdetail->pickId->pickaddress->companyAddress1}},{{$message->orderdetail->pickId->pickaddress->city}}</p>
                      </div>
                    </div>
                </li>
                @endforeach

  
            </ul><!-- notification-menu-->
          </li>




          <!-- notification-menu -->

          <li class="dropdown notifications-menu">

            <!-- Menu toggle button -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-inbox"></i>

            </a>

            

            <ul class="dropdown-menu notification-dropdown">

              <h4>Messages</h4>

                <li>

                  <a href="#">

                    <div class="notification-bell">

                      <div class="notification-icon">

                       <i class="fa fa-envelope" aria-hidden="true"></i>

                      </div>



                      <div class="notification-text">

                        <span>John Doe</span>

                        <p>Lorem Ipsum is simply.</p>

                      </div>

                    </div>

                  </a>

                </li>



                <li>

                  <a href="#">

                    <div class="notification-bell">

                      <div class="notification-icon">

                       <i class="fa fa-envelope" aria-hidden="true"></i>

                      </div>



                      <div class="notification-text">

                        <span>John Doe</span>

                        <p>Lorem Ipsum is simply.</p>

                      </div>

                    </div>

                  </a>

                </li>

            </ul><!-- notification-menu-->

          </li>



        </ul>

      </div>

    </nav>

  </header>