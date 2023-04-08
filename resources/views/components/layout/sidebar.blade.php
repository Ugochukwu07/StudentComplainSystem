<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
		<div class="user-profile px-40 py-15">
			<div class="d-flex align-items-center">
				<div class="image">
				  <img src="{{ asset(Auth::user()->image) }}" class="avatar avatar-lg" alt="User Image">
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
				  <a href="{{ Auth::user()->admin ? route('admin.main.overview') : route('student.overview') }}">
					<img src="{{ asset('images/svg-icon/dashboard.svg') }}" class="svg-icon" alt="">
					<span>Dashboard</span>
				  </a>
				</li>
                @if(Auth::user()->admin)
                    <li class="header">Mangement</li>
                    <li class="treeview">
                        <a href="#">
                            <img src="{{ asset('images/svg-icon/tables.svg') }}" class="svg-icon" alt="">
                            <span>Faculty</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#!" data-bs-toggle="modal" data-bs-target="#modal-add-faculty"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add</a></li>
                            <li><a href="{{ route('admin.faculty.index') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>All</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <img src="{{ asset('images/svg-icon/tables.svg') }}" class="svg-icon" alt="">
                            <span>Department</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#!" data-bs-toggle="modal" data-bs-target="#modal-add-department"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add</a></li>
                            <li><a href="{{ route('admin.department.index') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>All</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <img src="{{ asset('images/svg-icon/tables.svg') }}" class="svg-icon" alt="">
                            <span>Office</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#!" data-bs-toggle="modal" data-bs-target="#modal-add-offices"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add</a></li>
                            <li><a href="{{ route('admin.office.index') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>All</a></li>
                        </ul>
                    </li>

                    <li class="header">Complains</li>

                    <li>
                        <a href="{{ route('admin.complain.index', ['type' => 'all']) }}">
                            <img src="{{ asset('images/svg-icon/layouts.svg') }}" class="svg-icon" alt="">
                            <span>All Complains</span>
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
                            <li><a href="{{ route('admin.complain.index', ['type' => 'all']) }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>All</a></li>
                            <li><a href="{{ route('admin.complain.index', ['type' => 'pending']) }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pending</a></li>
                            <li><a href="{{ route('admin.complain.index', ['type' => 'completed']) }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Completed</a></li>
                        </ul>
                    </li>

                    <li class="header">Students</li>

                    <li>
                        <a href="{{ route('admin.student.all') }}">
                            <img src="{{ asset('images/svg-icon/layouts.svg') }}" class="svg-icon" alt="">
                            <span>All Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#modal-add-student">
                            <img src="{{ asset('images/svg-icon/layouts.svg') }}" class="svg-icon" alt="">
                            Add Student
                        </a>
                    </li>

                @else
                    <li class="treeview">
                        <a href="#">
                            <img src="{{ asset('images/svg-icon/tables.svg') }}" class="svg-icon" alt="">
                            <span>Profile</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('student.profile', ['type' => 1]) }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Profile</a></li>
                            <li><a href="{{ route('student.profile', ['type' => 2]) }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Authentication</a></li>
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
                @endif

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

@if(Auth::user()->admin)
    <!-- Modal -->
    <div class="modal center-modal fade" id="modal-add-faculty" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <form action="{{ route('admin.faculty.add.save') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Faculty</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Faculty Name</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('name') }}" type="text" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal center-modal fade" id="modal-add-department" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <form action="{{ route('admin.department.add.save') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Faculty</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Faculty</label>
                            <div class="col-md-12">
                                <select name="faculty_id" class="form-select">
                                    <option>Select Faculty</option>
                                    @foreach ($faculties as $faculty)
                                        <option {{ (old('faculty_id') == $faculty->id) ? 'selected' : '' }} value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Department Name</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('name') }}" type="text" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal center-modal fade" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true" id="modal-add-student" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content" style="overflow-y: scroll">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <div class="modal-header">
                    <h5 class="modal-title">Add a Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.student.add.save') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Department</label>
                            <div class="col-md-12">
                                <select name="department_id" class="form-select">
                                    <option>Select Department</option>
                                    @foreach ($departments() as $department)
                                        <option {{ (old('department_id') == $department->id) ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Full Name*</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('name') }}" placeholder="John Doe" type="text" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Reg Number*</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('reg_number') }}" placeholder="201754289" type="text" name="reg_number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Student Mail*</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('email') }}" placeholder="student@nau.com" type="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Passsword*</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('password') }}" type="password" placeholder="201754289" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Password Confirmation</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('password_confirmation') }}" placeholder="201754289" type="password" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal center-modal fade" id="modal-add-offices" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <form action="{{ route('admin.office.add.save') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Office</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Department</label>
                            <div class="col-md-12">
                                <select name="department_id" class="form-select">
                                    <option>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option {{ (old('department_id') == $department->id) ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Offices Name</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('name') }}" type="text" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Address</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('address') }}" type="text" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
