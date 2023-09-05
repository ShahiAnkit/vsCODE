<!DOCTYPE html>
<html>
    <head>
        <title>

        </title>
    </head>
<body>
<div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="account-bg">
            <div class="card-box mb-0">
                <div class="text-center m-t-20">
                    <a href="#" class="logo">
                        <img src="{{ asset('assets/images/logo.png')}}" height="24px">
                    </a>
                </div>
                <div class="m-t-10 p-20">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h6 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h6>
                        </div>
                    </div>
                    <div class="text-danger font-weight-bold"  @if (Session::has('error')) style="display:block" @else  style="display:none" @endif>{{ session('error') }}</div>
                    <form class="m-t-20" method="POST" action="login">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       {{--  <div class="form-group row">
                            <div class="col-12">
                                <div class="checkbox checkbox-custom">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group text-center row m-t-10">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block waves-effect waves-light">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <a href="{{ url('forgot-password') }}" class="text-muted"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            

<!--            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-primary-50">Don't have an account? <a href="{{ route('register') }}" class="text-primary ml-1"><b>Sign Up</b></a></p>
                </div>--> <!-- end col -->
            </div>
        </div>
        <!-- end card-box-->
    </div>
                       </body>
                       </html>