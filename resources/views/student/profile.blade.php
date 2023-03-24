@extends('layouts.app', ['title' => 'Profile'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Profile</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student.overview') }}"><i
                                            class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12 col-lg-7 col-xl-8">

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li><a href="#activity" data-bs-toggle="tab">Activity</a></li>
                            <li><a class="active"  href="#settings" data-bs-toggle="tab">Settings</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane" id="activity">

                                <div class="box p-10 no-shadow">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-bordered-sm rounded-circle"
                                                src="../images/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Brayden</a>
                                                <a href="#" class="pull-right btn-box-tool"><i
                                                        class="fa fa-times"></i></a>
                                            </span>
                                            <span class="description">5 minutes ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="activitytimeline">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec
                                                odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla
                                                quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
                                            </p>
                                            <ul class="list-inline">
                                                <li><a href="#" class="link-black text-sm"><i
                                                            class="fa fa-share margin-r-5"></i> Share</a></li>
                                                <li><a href="#" class="link-black text-sm"><i
                                                            class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                                </li>
                                                <li class="pull-right">
                                                    <a href="#" class="link-black text-sm"><i
                                                            class="fa fa-comments-o margin-r-5"></i> Comments
                                                        (5)</a>
                                                </li>
                                            </ul>
                                            <form class="form-element">
                                                <input class="form-control input-sm" type="text"
                                                    placeholder="Type a comment">
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-bordered-sm rounded-circle"
                                                src="../images/user6-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Evan</a>
                                                <a href="#" class="pull-right btn-box-tool"><i
                                                        class="fa fa-times"></i></a>
                                            </span>
                                            <span class="description">5 minutes ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="activitytimeline">
                                            <div class="row mb-20">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid" src="../images/photo1.png" alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid" src="../images/photo2.png"
                                                                alt="Photo">
                                                            <br><br>
                                                            <img class="img-fluid" src="../images/photo3.jpg"
                                                                alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid" src="../images/photo4.jpg"
                                                                alt="Photo">
                                                            <br><br>
                                                            <img class="img-fluid" src="../images/photo1.png"
                                                                alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <ul class="list-inline">
                                                <li><a href="#" class="link-black text-sm"><i
                                                            class="fa fa-share margin-r-5"></i> Share</a></li>
                                                <li><a href="#" class="link-black text-sm"><i
                                                            class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                                </li>
                                                <li class="pull-right">
                                                    <a href="#" class="link-black text-sm"><i
                                                            class="fa fa-comments-o margin-r-5"></i> Comments
                                                        (5)</a>
                                                </li>
                                            </ul>

                                            <form class="form-element">
                                                <input class="form-control input-sm" type="text"
                                                    placeholder="Type a comment">
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-bordered-sm rounded-circle"
                                                src="../images/user7-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Nicholas</a>
                                                <a href="#" class="pull-right btn-box-tool"><i
                                                        class="fa fa-times"></i></a>
                                            </span>
                                            <span class="description">5 minutes ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="activitytimeline">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec
                                                odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla
                                                quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
                                            </p>

                                            <form class="form-horizontal form-element">
                                                <div class="form-group row g-0">
                                                    <div class="col-sm-9">
                                                        <input class="form-control input-sm" placeholder="Response">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button type="submit"
                                                            class="btn btn-danger pull-right w-p100">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.post -->
                                </div>

                            </div>
                            <!-- /.tab-pane -->

                            <div class="active tab-pane" id="settings">

                                <div class="box p-10 no-shadow">
                                    <form class="form-horizontal form-element col-12" method="POST" action="{{ route('student.profile.save', ['id' => $profile->id]) }}">
                                        <div class="form-group row">
                                            @csrf
                                            <label for="reg_number" class="col-sm-2 form-label">Reg Number</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="reg_number" class="form-control" value="{{ $profile->reg_number }}" id="reg_number" placeholder="Your Reg Number">
                                                @error('reg_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone_number" class="col-sm-2 form-label">Phone Number</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') ?? $profile->phone_numer }}" placeholder="Input Your Phone Number">
                                                @error('phone_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 form-label">Address</label>

                                            <div class="col-sm-10">
                                                <input type="text" value="{{ old('address') ?? $profile->address }}" class="form-control" name="address" placeholder="Type your Address">
                                            </div>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="sex" class="col-sm-2 form-label">Sex</label>

                                            <div class="col-sm-10">
                                                <select class="form-control" name="sex">
                                                    <option @if(old('sex') == 'Male' || $profile->sex == 'Male') selected @endif value="Male">Male</option>
                                                    <option @if(old('sex') == 'Female' || $profile->sex == 'Female') selected @endif value="Female">Female</option>
                                                </select>
                                            </div>
                                            @error('sex')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="faculty_id" class="col-sm-2 form-label">Faculty</label>

                                            <div class="col-sm-10">
                                                <select class="form-control" name="faculty_id">
                                                    <option>Select Faculty</option>
                                                    @foreach ($faculties as $faculty)
                                                        <option @if(old('faculty_id') == $faculty->id || $profile->faculty_id == $faculty->id) selected @endif value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('faculty_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="department_id" class="col-sm-2 form-label">Department</label>

                                            <div class="col-sm-10">
                                                <select class="form-control" name="department_id">
                                                    <option>Select Department</option>
                                                    @foreach ($departments as $department)
                                                        <option @if(old('department_id') == $department->id || $profile->department_id == $department->id) selected @endif value="{{ $department->id }}">{{ $department->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('department_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="level" class="col-sm-2 form-label">Level</label>

                                            <div class="col-sm-10">
                                                <select class="form-control" name="level">
                                                    <option>Select Level</option>
                                                    @foreach ($levels as $level)
                                                        <option @if(old('level') == $level || $profile->level == $level) selected @endif value="{{ $level }}">{{ $level }} Level</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('level')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="ms-auto col-sm-10">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->

                <div class="col-12 col-lg-5 col-xl-4">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-img bbsr-0 bber-0"
                            style="background: url('{{ asset('images/gallery/full/10.jpg') }}') center center;" data-overlay="5">
                            <h3 class="widget-user-username text-white">{{ Auth::user()->name }}</h3>
                            <h6 class="widget-user-desc text-white">Student</h6>
                        </div>
                        <div class="widget-user-image">
                            <img class="rounded-circle" src="{{ asset('images/user3-128x128.jpg') }}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $profile->level }}</h5>
                                        <span class="description-text">LEVEL</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 be-1 bs-1">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $profile->department?->name }}</h5>
                                        <span class="description-text">DEPARTMENT</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $data->complain_count }}</h5>
                                        <span class="description-text">COMPLAINS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-body box-profile">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <p>Email :<span class="text-gray ps-10">{{ Auth::user()->email }}</span> </p>
                                        <p>Phone :<span class="text-gray ps-10">{{ $profile->phone_number }}</span></p>
                                        <p>Address :<span class="text-gray ps-10">{{ $profile->address }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div>
                                        <div class="map-box">
                                            <iframe
                                                src="https://maps.google.com/?q={{ urlencode($profile->address) }}"
                                                width="100%" height="100" frameborder="0" style="border:0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
<script src="{{ asset('js/pages/timeline.js') }}"></script>
@endsection
