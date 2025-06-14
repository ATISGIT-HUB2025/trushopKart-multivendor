<div class="dashboard_sidebar">
  <span class="close_icon">
    <i class="far fa-bars dash_bar"></i>
    <i class="far fa-times dash_close"></i>
  </span>
  <a href="javascript:;" class="dash_logo"><img src="{{asset($logoSetting->logo)}}" alt="logo" class="img-fluid"></a>
  <ul class="dashboard_link">
    <li><a class="{{setActive(['teacher.dashboard'])}}" href="{{route('teacher.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
    <li><a class="" href="{{route('home')}}"><i class="fas fa-home"></i>Go To Home</a></li>
    <li><a class="{{setActive(['teacher.exam'])}}" href="{{route('teacher.exam.index')}}"><i class="fas fa-pencil-alt"></i>Exam</a></li>
    <li><a class="" href=""><i class="fas fa-file-alt"></i>Exam Section</a></li>
    <li><a class="" href=""><i class="fas fa-question-circle"></i>Exam Question</a></li>
    <li><a class="{{setActive(['teacher.bulk-admission.index'])}}" href="{{route('teacher.bulk-admission.index')}}"><i class="fas fa-question-circle"></i>Bulk Admission</a></li>
    <li><a class="" href=""><i class="fas fa-user"></i>Profile</a></li>


    <li>
      <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
          <i class="far fa-sign-out-alt"></i> Log out
        </a>
      </form>
    </li>

  </ul>
</div>