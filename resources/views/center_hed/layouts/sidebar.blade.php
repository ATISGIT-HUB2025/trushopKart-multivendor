
<div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="javascript:;" class="dash_logo"><img src="{{asset($logoSetting->logo)}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
     
      <li><a class="" href="{{route('home')}}"><i class="fas fa-home"></i>Go To Home</a></li>

      <li><a class="{{setActive(['vendor.orders.*'])}}" href="{{route('center_hed.questions')}}"><i class="fas fa-box"></i> Exam Questions</a></li>
      
    
      <!-- <li><a class="{{setActive(['vendor.profile'])}}" href="{{route('vendor.profile')}}"><i class="far fa-user"></i> My Profile</a></li> -->
      <li>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{route('logout')}}" onclick="event.preventDefault();
            this.closest('form').submit();"><i class="far fa-sign-out-alt"></i> Log out</a>
        </form>
        </li>

    </ul>
  </div>
