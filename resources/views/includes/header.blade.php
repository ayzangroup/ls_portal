

<nav class="navbar navbar-expand-lg navbar-light ">



    <div class="container">



        <a class="navbar-brand" href="{{route('/')}}">



            <img src="img/logo.png" alt="">



        </a>



        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">



            <span class="navbar-toggler-icon"></span>



        </button>







        <div class="collapse navbar-collapse" id="navbarSupportedContent">



            <ul class="navbar-nav mr-auto">



                <li class="nav-item">



                    <a class="nav-link" href="{{route('/')}}#why_us">Why Us</a>



                </li>



                <li class="nav-item">



                    <a class="nav-link" href="{{route('/')}}#process">Our Process</a>

 

                </li>



                <li class="nav-item">



                    <a class="nav-link" href="{{route('serve')}}">Who We Serve</a>



                </li>



                <li class="nav-item">



                    <a class="nav-link" class="nav-link login" href="#"  data-toggle="modal" data-target="#price_calculator">Price Calculator</a>



                </li>



                <li class="nav-item">



                    <a class="nav-link" href="{{route('faq')}}">FAQ</a>



                </li>



                <li class="nav-item">



                    <a class="nav-link" href="{{route('contact')}}">Contact Us</a>



                </li>



                @php

                    $user=Auth::guard('user')->user();

                    $corpuser=Auth::guard('corpuser')->user();

                    

                @endphp



                @if(!empty($user || $corpuser))

                



                



            <li class="dropdown user user-menu UserImagePublic">



            <!-- Menu Toggle Button -->



            <a href="#" class="dropdown-toggle user-drop" data-toggle="dropdown">

            @if($user)

                <img src="{{ $user->socialImage }}" class="user-image " alt="User Image">

            @elseif($corpuser)

                <img src="{{ $corpuser->socialImage }}" class="user-image " alt="User Image">

            @endif

            </a><!-- profile image -->



            <ul class="dropdown-menu login-dropdown-menu">



              <!-- The user image in the menu -->



              <li>



                <a href="#">



                  <div class="name-details">



                    @if ( $user)

                    <img src="{{ $user->socialImage }}" class="user-image" alt="User Image">

                    <h5>{{ $user->indvCustName }}</h5>

                    <span>{{ $user->indvCustEmail }}</span>

                    

                    @elseif ( $corpuser )

                    @if(!empty($corpuser->socialImage))

                    <img src="{{ $corpuser->socialImage }}" class="user-image" alt="User Image">

                    @endif

                    <h5>{{ $corpuser->corporationName }}</h5>

                    <span>{{ $corpuser->corpoarateEmail }}</span>                        

                    @endif



                  </div>



                </a>



              </li>





            @if ( $user)

            <li>

                <a href="{{ route('user.dashboard') }}">



                  <i class="fa fa-sign-out" aria-hidden="true"></i> Dashboard



                </a>

            </li>



            <li>

                <a href="{{ url('user/logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">



                  <i class="fa fa-sign-out" aria-hidden="true"></i> Logout



                </a> 



                <form id="frm-logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">



                  {{ csrf_field() }}



                </form> 

            </li>

            @elseif ( $corpuser)

              <li>

                <a href="{{ route('corpuser.dashboard') }}">



                  <i class="fa fa-sign-out" aria-hidden="true"></i> Dashboard



                </a>

              </li>



              <li>

                <a href="{{ url('corpuser/logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">



                  <i class="fa fa-sign-out" aria-hidden="true"></i> Logout



                </a> 



                <form id="frm-logout" action="{{ url('corpuser/logout') }}" method="POST" style="display: none;">



                  {{ csrf_field() }}



                </form> 

               </li>

            @endif





            </ul>



          </li>



                @else

                <li class="nav-item ">



                    <a class="nav-link login" href="{{route('user.dashboard')}}"  data-toggle="modal" data-target="#login">Log in</a>



                </li>

                @endif




            </ul>

                            <div id="google_translate_element" style="width: 10px;"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>





        </div>



    </div>



    <!-- container -->



</nav><!-- nav -->