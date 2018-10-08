<!-- Logo -->

    <a href="dashboard" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini">

        <img src="{{ URL::to('/') }}/img/logo-sm.png" alt="">

      </span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg">

        <img src="{{ URL::to('/') }}/img/logo.png" alt="">

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

          <li class="dropdown user user-menu">

            <!-- Menu Toggle Button -->

            <a href="#" class="dropdown-toggle user-drop" data-toggle="dropdown">

              <img src="{{ URL::to('/') }}/dist/img/user.png" class="user-image " alt="User Image">

            </a><!-- profile image -->

            <ul class="dropdown-menu login-dropdown-menu">

              <!-- The user image in the menu -->

              <li>

                <a href="#">

                  <div class="name-details">

                     @php
                        $admin=Auth::guard('admin')->user();
                        $count=count($requestservice);
                      @endphp
                    <img src="{{ URL::to('/') }}/dist/img/user.png" class="user-image" alt="User Image">

                    <h5>{{$admin->name}}</h5>

                    <span>{{$admin->email}}</span>

                  </div>

                </a>

              </li>



              <!-- <li>

                <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> Your Account</a>

              </li> -->



              <li>

                <a href="{{ url('admin/logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">

                  <i class="fa fa-sign-out" aria-hidden="true"></i> Logout

                </a> 

                <form id="frm-logout" action="{{ url('admin/logout') }}" method="POST" style="display: none;">

                  {{ csrf_field() }}

                </form> 

                <!-- <a href="{{ URL::to('/') }}/admin/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a> -->

              </li>



            </ul>

          </li>



            <!-- notification-menu -->

          <li class="dropdown notifications-menu">

            

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-bell">{{$count}}</i>

            </a>

            

            <ul class="dropdown-menu notification-dropdown">

              <h4>Notifications</h4>

               <li>
                @foreach($requestservice as $request)
                  <a href="{{route('admin.view_request')}}">

                    <div class="notification-bell">

                      <div class="notification-icon">

                       <i class="fa fa-envelope" aria-hidden="true"></i>

                      </div>

                      <div class="notification-text">

                        <span>{{$request->name}}  &nbsp; ({{$request->phone}})</span><br>
                        <span>{{$request->email}}</span>
                        <p>{{$request->service}}</p>

                      </div>

                    </div>

                  </a>
                @endforeach

                </li>

            </ul>

          </li>

        </ul>

      </div>

    </nav>