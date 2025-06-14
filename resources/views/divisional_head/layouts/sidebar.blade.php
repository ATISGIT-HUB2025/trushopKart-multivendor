
<div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="javascript:;" class="dash_logo"><img src="{{asset($logoSetting->logo)}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
     
    <li><a class="{{setActive(['divisional_head.dashbaord'])}}" href="{{route('divisional_head.dashbaord')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>

      <li><a class="" href="{{route('home')}}"><i class="fas fa-home"></i>Go To Home</a></li>
      <li><a class="{{ setActive(['divisional_head.accessmanagement.*']) }}" href="{{ route('divisional_head.accessmanagement.index') }}"><i class="fas fa-users"></i> Access Management</a></li>
      
      <li><a class="{{ setActive(['divisional_head.school-for-visiting.index']) }}" href="{{ route('divisional_head.school-for-visiting.index') }}"><i class="fas fa-users"></i> School For Visiting</a></li>
    
      <li><a class="{{setActive(['divisional_head.bulk-admission.index'])}}" href="{{route('divisional_head.bulk-admission.index')}}"><i class="fas fa-question-circle"></i>Bulk Admission</a></li>
    
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
