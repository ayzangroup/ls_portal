<!-- Main Header -->
  <header class="main-header">

   <!-- Logo -->
    <a href="{{ route('user.dashboard')}}" class="logo">
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
      @php
                    $user=Auth::guard('user')->user();
                    $notification=$user->userNotification;
                    $sms=$user->userSms;                
            @endphp
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="points-list">Points Earned : <span>{{$user->points}}</span></li>
          <!-- user menu -->
          
            <!-- Menu Toggle Button -->
             

          <li class="dropdown user user-menu header-user-profile">
            <a href="#" class="dropdown-toggle user-drop" data-toggle="dropdown">
              @if(!empty($user->socialImage))
              <img src="{{$user->socialImage}}" class="user-image " alt="User Image" >
              @else
              <img src="{{ URL::to('/') }}/dist/img/user.png" class="user-image " alt="User Image">
              @endif
              <h5>{{ $user->indvCustName }}</h5>
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
                    <h5>{{ $user->indvCustName }}</h5>
                    <span>{{ $user->indvCustEmail }}</span>
                  </div>
                </a>
              </li>

              <li><a href="{{route('user.myprofile')}}"><i class="fa fa-user"></i> <span>My Profile</span></a></li>

              <li><a href="{{ route('user.setting') }}"><i class="fa fa-cog"></i> <span>Setting</span></a></li>
              <li>
            @if(!empty($user))
                <a href="{{ url('user/logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">

                  <i class="fa fa-sign-out" aria-hidden="true"></i> Logout

                </a> 

                <form id="frm-logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">

                  {{ csrf_field() }}

               </form>
            @else
                <a href="{{ url('/') }}">

                  <i class="fa fa-sign-out" aria-hidden="true"></i> Logout

                </a>
            @endif

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
                  <a href="{{url('/user/setting#notification')}}">
                    <div class="notification-bell">
                      <div class="notification-icon">
                       <img src="{{$message->notificationDetail->image}}" style="width: 50px;height: 50px;border-radius: 50%;" class="user-image " alt="User Image">
                      </div>
                      <div class="notification-text">
                        <span>{{$message->notificationDetail->title}}</span>
                        <p>{{$message->notificationDetail->message}}</p>
                      </div>
                    </div>
                  </a>
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
              @foreach($sms as $message1)
                <li>
                  <a href="#">
                    <div class="notification-bell">
                      <div class="notification-icon">
                       <i class="fa fa-envelope" aria-hidden="true"></i>
                      </div>

                      <div class="notification-text">
                        <p>{{$message1->smsDetail->message}}</p>
                      </div>
                    </div>
                  </a>
                </li>

              @endforeach
            </ul><!-- notification-menu-->
          </li>

        </ul>
      </div>
    </nav>
  </header>