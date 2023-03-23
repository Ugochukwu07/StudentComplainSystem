@extends('layouts.auth.app')
@section('content')

<div class="col-lg-5 col-md-5 col-12">
    <div class="bg-white rounded10 shadow-lg">
        <div class="content-top-agile p-20 pb-0">
            <h2 class="text-primary">Get started to Make a Complain</h2>
            <p class="mb-0">Student Register</p>
        </div>
        <div class="p-40">
            <form action="{{ route('register.save') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                        <input type="text" class="form-control ps-15 bg-transparent" placeholder="Full Name">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                        <input type="email" class="form-control ps-15 bg-transparent" name="email" placeholder="Email">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-more"></i></span>
                        <input type="text" class="form-control ps-15 bg-transparent" name="reg_number" placeholder="Reg Number">
                    </div>
                    @error('reg_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-more"></i></span>
                        <select class="form-select-mg bg-transparent form-control" name="department_id" id="department_id">
                            <option>Select Your Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control ps-15 bg-transparent" name="reg_number" placeholder="Reg Number"> --}}
                    </div>
                    @error('department_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                        <input type="password" class="form-control ps-15 bg-transparent" name="password" placeholder="Password">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                        <input type="password" class="form-control ps-15 bg-transparent" name="password_confirmation" placeholder="Retype Password">
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                  <div class="row">
                    <div class="col-12 text-center">
                      <button type="submit" class="btn btn-info margin-top-10">SIGN IN</button>
                    </div>
                    <!-- /.col -->
                  </div>
            </form>
            <div class="text-center">
                <p class="mt-15 mb-0">Already have an account?<a href="{{ route('login') }}" class="text-danger ms-5"> Sign In</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
