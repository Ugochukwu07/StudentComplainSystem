@extends('layouts.auth.app')
@section('conent')

<div class="col-lg-5 col-md-5 col-12">
    <div class="bg-white rounded10 shadow-lg">
        <div class="content-top-agile p-20 pb-0">
            <h2 class="text-primary">Get started to Make a Complain</h2>
            <p class="mb-0">Student Register</p>
        </div>
        <div class="p-40">
            <form action="index.html" method="post">
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
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                        <input type="password" class="form-control ps-15 bg-transparent" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                        <input type="password" class="form-control ps-15 bg-transparent" placeholder="Retype Password">
                    </div>
                </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="checkbox">
                        <input type="checkbox" id="basic_checkbox_1" >
                        <label for="basic_checkbox_1">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-12 text-center">
                      <button type="submit" class="btn btn-info margin-top-10">SIGN IN</button>
                    </div>
                    <!-- /.col -->
                  </div>
            </form>
            <div class="text-center">
                <p class="mt-15 mb-0">Already have an account?<a href="auth_login.html" class="text-danger ms-5"> Sign In</a></p>
            </div>
        </div>
    </div>

    <div class="text-center">
      <p class="mt-20 text-white">- Register With -</p>
      <p class="gap-items-2 mb-20">
          <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
          <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
          <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
        </p>
    </div>
</div>
@endsection
