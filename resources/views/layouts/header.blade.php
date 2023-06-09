<header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<!-- Logo -->
		<a href="{{ Auth::user()->admin ? route('admin.main.overview') : route('student.overview') }}" class="logo">
		  <!-- logo-->
          @if(Auth::user()->admin)
            <div class="logo-mini w-30">
                <span class="light-logo"><img src="{{ asset('images/logo-letter.png') }}" alt="logo"></span>
                <span class="dark-logo"><img src="{{ asset('images/logo-letter.png') }}" alt="logo"></span>
            </div>
            <div class="logo-lg">
                <span class="light-logo"><img src="{{ asset('images/logo-dark-text.png') }}" alt="logo"></span>
                <span class="dark-logo"><img src="{{ asset('images/logo-light-text.png') }}" alt="logo"></span>
            </div>
          @else
            <div class="logo-mini w-30">
                {{-- <span class="light-logo">Student Complain System</span> --}}
                <span class="dark-logo">Student Complain System</span>
            </div>
            <div class="logo-lg">
                {{-- <span class="light-logo">Student Complain System</span> --}}
                <span class="dark-logo">Student Complain System</span>
            </div>
          @endif
		</a>
	</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link push-btn btn-outline no-border" data-toggle="push-menu" role="button">
					<img src="{{ asset('images/svg-icon/collapse.svg') }}" class="img-fluid svg-icon" alt="">
			    </a>
			</li>
		</ul>
	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link btn-outline no-border full-screen" title="Full Screen">
					<img src="{{ asset('images/svg-icon/fullscreen.svg') }}" class="img-fluid svg-icon" alt="">
			    </a>
			</li>

	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect position-relative waves-light dropdown-toggle btn-outline no-border" data-bs-toggle="dropdown" title="User">
				<img src="{{ asset('images/svg-icon/user.svg') }}" class="img-fluid svg-icon" alt="">
                <div class="position-absolute blink" style="top: -10%; left: 10%">
                    <i class=" wi wi-moon-alt-new text-success" style="font-size: 14px;"></i>
                </div>
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
                @if(Auth::user()->admin)
				    <a class="dropdown-item" href="{{ route('admin.main.profile') }}"><i class="ti-user text-muted me-2"></i> Profile</a>
				@else
                    <a class="dropdown-item" href="{{ route('student.profile', ['type' => 1]) }}"><i class="ti-user text-muted me-2"></i> Profile</a>
				    <a class="dropdown-item" href="{{ route('student.profile', ['type' => 2]) }}"><i class="ti-wallet text-muted me-2"></i> Authentication</a>
                @endif
				 {{-- <a class="dropdown-item" href="#"><i class="ti-settings text-muted me-2"></i> Settings</a> --}}
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{ route('logout') }}"><i class="ti-lock text-muted me-2"></i> Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
