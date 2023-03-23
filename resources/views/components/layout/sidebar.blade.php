<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
		<div class="user-profile px-40 py-15">
			<div class="d-flex align-items-center">
				<div class="image">
				  <img src="{{ asset('images/avatar/1.jpg') }}" class="avatar avatar-lg" alt="User Image">
				</div>
				<div class="info ms-10">
					<p class="mb-0">Welcome</p>
					<h5 class="mb-0">{{ Auth::user()->name }}</h5>
				</div>
			</div>
        </div>
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">
				<li class="header">Menu </li>
				<li>
				  <a href="{{ Auth::user()->admin ? route('admin.overview') : route('student.overview') }}">
					<img src="{{ asset('images/svg-icon/dashboard.svg') }}" class="svg-icon" alt="">
					<span>Dashboard</span>
				  </a>
				</li>
				<li class="treeview">
                    <a href="#">
                        <img src="{{ asset('images/svg-icon/tables.svg') }}" class="svg-icon" alt="">
                        <span>Profile</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('student.profile') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Profile</a></li>
                        <li><a href="{{ route('student.account') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Authentication</a></li>
				    </ul>
				</li>
				<li class="header">COMPLAINS </li>
				<li>
				  <a href="{{ route('student.complain.create') }}">
					<img src="{{ asset('images/svg-icon/layouts.svg') }}" class="svg-icon" alt="">
					<span> New Complain</span>
				  </a>
				</li>
                <li class="treeview">
                    <a href="#">
                        <img src="{{ asset('images/svg-icon/tables.svg') }}" class="svg-icon" alt="">
                        <span>View</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('student.complain.index', ['type' => 'all']) }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>All</a></li>
                        <li><a href="{{ route('student.complain.index', ['type' => 'pending']) }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pending</a></li>
                        <li><a href="{{ route('student.complain.index', ['type' => 'completed']) }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Completed</a></li>
				    </ul>
				</li>

				<li class="header">OTHERS</li>
                <li>
                    <a href="{{ route('logout') }}">
                      <img src="{{ asset('images/svg-icon/layouts.svg') }}" class="svg-icon" alt="">
                      <span>Logout</span>
                    </a>
                </li>
			  </ul>

			  <div class="sidebar-widgets">
				<div class="copyright text-start m-25">
					<p><strong class="d-block">{{ config('app.name') }}</strong> © {{ date('Y') }} All Rights Reserved</p>
				</div>
			  </div>
		  </div>
		</div>
    </section>
  </aside>
