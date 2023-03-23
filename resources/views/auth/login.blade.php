@extends('layouts.auth.app')
@section('content')

<div class="col-lg-5 col-md-5 col-12">
    <div class="bg-white rounded10 shadow-lg">
        <div class="content-top-agile p-20 pb-0">
            <h2 class="text-primary">Login to Make a Complain</h2>
            <p class="mb-0">Student Login</p>
        </div>
        <div class="p-40">
            <form action="{{ route('login.save') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                        <input value="{{ old('email_reg') }}" type="text" class="form-control ps-15 bg-transparent" name="email_reg" placeholder="Email or Reg Number">
                    </div>
                    @error('email_reg')
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
                  <div class="row">
                    <div class="col-12 text-center">
                      <button type="submit" class="btn btn-info margin-top-10">SIGN IN</button>
                    </div>
                    <!-- /.col -->
                  </div>
            </form>
            <div class="text-center">
                <p class="mt-15 mb-0">Don't have an account?<a href="{{ route('register') }}" class="text-danger ms-5"> Sign Up</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
