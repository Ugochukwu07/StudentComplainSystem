@extends('layouts.app', ['title' => 'Make new Complain'])

@section('css')
    <style>
        label, input, textarea, .box-title{
            color: white !important;
        }
    </style>
@endsection

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
                                <li class="breadcrumb-item active" aria-current="page">New Complain</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-lg-10 mx-auto col-12">
                    <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Make a Complain</h4><br>
                        <span class="text-info">Fill the following form below to make a complain.</span>
                    </div>
                    <!-- /.box-header -->
                    <form class="form" method="POST" action="{{ route('admin.complain.attend.save', ['id' => $complain->id]) }}">
                        @csrf
                        <input type="hidden" value="{{ $complain->student_id }}" name="student_id" id="student_id">
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> About Student</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" readonly value="{{ $complain->user->name }}" class="form-control" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Reg Number</label>
                                        <input type="text" readonly value="{{ $complain->user->profile->reg_number }}" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" readonly value="{{ $complain->user->email }}" class="form-control" placeholder="E-mail">
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" readonly value="{{ $complain->user->profile->phone_number }}" class="form-control" placeholder="Phone">
                                </div>
                                </div>
                            </div>
                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> Complains</h4>
                            <hr class="my-15">
                            <div class="form-group">
                                <label class="form-label">To Office</label>
                                <select readonly name="office_id" class="form-select">
                                    <option>Select Office</option>
                                    @foreach ($offices as $office)
                                        <option {{ ($complain->office_id == $office->id) ? 'selected' : '' }} value="{{ $office->id }}">{{ $office->department->name }} - {{ $office->name }}</option>
                                    @endforeach
                                </select>
                                @error('office_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input readonly class="form-control" type="text" name="title" value="{{ $complain->title }}" placeholder="I wish to...">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Complain</label>
                                <textarea readonly rows="10" name="complain" class="form-control" placeholder="Complain Text Here...">{{ $complain->complain }}</textarea>

                                @error('complain')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Remarks</label>
                                <textarea rows="10" name="remarks" class="form-control" placeholder="Complain Text Here...">{{ old('remarks') }}</textarea>

                                @error('remarks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti-save-alt"></i> Attend
                            </button>
                        </div>
                    </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
