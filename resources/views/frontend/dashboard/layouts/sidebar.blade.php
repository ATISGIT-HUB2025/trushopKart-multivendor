<div class="dashboard_sidebar">
  <span class="close_icon">
    <i class="far fa-bars dash_bar"></i>
    <i class="far fa-times dash_close"></i>
  </span>
  <a href="javascript:;" class="dash_logo"><img src="{{asset($logoSetting->logo)}}" alt="logo" class="img-fluid"></a>
  <ul class="dashboard_link">
    <li><a class="{{setActive(['user.dashboard'])}}" href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>

    <li><a class="" href="{{url('/products')}}"><i class="fas fa-home"></i>Home Page</a></li>

    @if (auth()->user()->role === 'vendor')
    <li><a class="{{setActive(['vendor.dashbaord'])}}" href="{{route('vendor.dashbaord')}}"><i class="fas fa-tachometer"></i>Go to Vendor Dashboard</a></li>
    @endif

    <li><a class="{{setActive(['user.orders.*'])}}" href="{{route('user.orders.index')}}"><i class="fas fa-list-ul"></i> Orders</a></li>
    {{-- <li><a class="{{setActive(['user.review.*'])}}" href="{{route('user.review.index')}}"><i class="far fa-star"></i> Reviews</a></li> --}}

    <li><a class="{{setActive(['user.profile'])}}" href="{{route('user.profile')}}"><i class="far fa-user"></i> My Profile</a></li>

    <li><a class="{{setActive(['user.wallet'])}}" href="{{route('user.wallet')}}"><i class="far fa-wallet"></i>My Wallet</a></li>
    <li><a class="{{setActive(['user.share_earn'])}}" href="{{route('user.share_earn')}}"><i class="far fa-share"></i>Share & Earn</a></li>
{{-- 
    <li><a class="{{setActive(['user.events.index'])}}" href="{{route('user.events.index')}}"><i class="fas fa-calendar-alt"></i> My Events</a></li>


    <li><a class="{{setActive(['user.application.*'])}}" href="{{route('user.application')}}"><i class="fas fa-file-signature"></i> Applycation</a></li> --}}
    {{-- <li><a class="{{setActive(['user.transctions.*'])}}" href="{{route('user.transctions')}}"><i class="fas fa-money-bill"></i> Pyment</a></li> --}}
    <li><a class="{{setActive(['user.address.*'])}}" href="{{route('user.address.index')}}"><i class="fas fa-map-marker-alt"></i> Addresses</a></li>
   {{-- @if (auth()->user()->role !== 'vendor')
    <li><a class="{{setActive(['user.vendor-request.index'])}}" href="{{route('user.vendor-request.index')}}"><i class="fas fa-user"></i> Become A Vendor</a></li>
    
    @endif --}}

    {{-- <li><a class="" href=""><i class="fas fa-trophy"></i> Merit List</a></li> --}}
    
    @if(auth()->user()->unique_id)
    <li>
        <a class="{{setActive(['user.account.*'])}}" href="{{route('user.account.index')}}">
            <i class="fas fa-university"></i> Account Details
        </a>
    </li>
@endif
{{-- 
    <li><a class="{{setActive(['user.complaints.*'])}}" href="{{route('user.complaints.index')}}"><i class="fas fa-exclamation-circle"></i> Complain</a></li>
    <li><a class="{{setActive(['user.online-test.*'])}}" href="{{route('user.online-test.index')}}"><i class="fas fa-edit"></i> Online Test</a></li>
    <li><a class="{{setActive(['user.results.*'])}}" href="{{route('user.results.index')}}"><i class="fas fa-poll"></i> Exam Results</a></li>
    <li><a class="{{setActive(['user.hall-ticket.*'])}}" href="{{route('user.hall-ticket.index')}}"><i class="fas fa-ticket-alt"></i> Hall Ticket</a></li>
    <li>
    <li><a class="{{setActive(['user.renew'])}}" href="{{route('user.renew')}}"><i class="fas fa-ticket-alt"></i>Renew</a></li>
    <li>   --}}

      <li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{route('logout')}}" onclick="event.preventDefault();
            this.closest('form').submit();"><i class="far fa-sign-out-alt"></i> Log out</a>
      </form>
    </li>

  </ul>
</div>