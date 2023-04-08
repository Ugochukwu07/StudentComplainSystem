@extends('layouts.auth.app', ['tittle' => 'Forget Password'])
@section('content')

<div class="col-lg-5 col-md-5 col-12">
    <div class="bg-white rounded10 shadow-lg">
        <div class="content-top-agile p-20 pb-0">
            <h2 class="text-primary">Reset Your Password Here</h2>
            <p class="mb-0">Password Reset Now</p>
        </div>
        <div class="p-40">
            <div class="row">
                @foreach ($errors->all() as $error)
                    <div class="col-12 text-danger">{{ $error }}</div>
                @endforeach
            </div>
            <form action="{{ route('forget.password.reset.save') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-key"></i></span>
                        <input type="password" class="form-control ps-15 bg-transparent" name="password" placeholder="New Password*">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-key"></i></span>
                        <input type="password" class="form-control ps-15 bg-transparent" name="password_confirmation" placeholder="New Password*">
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-info margin-top-10">Request</button>
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
