@extends('vuexy.layouts.auth.default')

@section('title', 'Login')

@section('content')
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-v2">
                <div class="auth-inner row m-0">
                    <!-- Brand logo--><a class="brand-logo" href="{{ URL::to('/') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"  height="35">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path d="M154.1 52.1C137.3 39.1 116.7 32 95.5 32C42.7 32 0 74.7 0 127.5v6.2c0 15.8 3.7 31.3 10.7 45.5l23.5 47.1c4.5 8.9 7.6 18.4 9.4 28.2L80.4 460.2c2 11.2 11.6 19.4 22.9 19.8s21.4-7.4 24-18.4l28.9-121.3C160.2 323.7 175 312 192 312s31.8 11.7 35.8 28.3l28.9 121.3c2.6 11.1 12.7 18.8 24 18.4s20.9-8.6 22.9-19.8l36.7-205.8c1.8-9.8 4.9-19.3 9.4-28.2l23.5-47.1c7.1-14.1 10.7-29.7 10.7-45.5v-2.1c0-55-44.6-99.6-99.6-99.6c-24.1 0-47.4 8.8-65.6 24.6l-3.2 2.8 19.5 15.2c7 5.4 8.2 15.5 2.8 22.5s-15.5 8.2-22.5 2.8l-24.4-19-37-28.8z" style="fill: currentColor"/>
                        </svg>
                        <h2 class="brand-text text-primary ms-1">{{ config('sistema.nombre') }}</h2>
                    </a>
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="/app-assets/images/pages/login-v2.svg" alt="Login V2" /></div>
                    </div>
                    <!-- /Left Text-->
                    <!-- Login-->
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <h2 class="card-title fw-bold mb-1">Bienvenido a {{ config('sistema.nombre') }}</h2>
                            <p class="card-text mb-2">Ingrese sus datos de usuario</p>
                            <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label" for="username">{{ __('Username') }}</label>
                                    <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="email" name="username"  aria-describedby="login-username" autofocus="" tabindex="1" value="{{ old('username') }}"/>
                                    @if ($errors->has('username'))
                                    <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                        <div class="alert-body d-flex align-items-center">
                                            <i data-feather="info" class="me-50"></i>
                                            <span>{{ $errors->first('username') }}</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="mb-1">
                                    {{-- <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">{{ __('Password') }}</label><a href="{{ route('password.request') }}"><small>{{ __('auth.forgot') }}</small></a>
                                    </div> --}}
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" class="form-control form-control-merge{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                            <div class="alert-body d-flex align-items-center">
                                                <i data-feather="info" class="me-50"></i>
                                                <span><strong>{{ $errors->first('password') }}</strong></span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" {{ old('remember') ? 'checked' : '' }} />
                                        <label class="form-check-label" for="remember-me"> {{ __('Recuerdame') }}</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" tabindex="4">{{ __('Login') }}</button>
                            </form>
{{--                            <p class="text-center mt-2"><span>New on our platform?</span><a href="auth-register-cover.html"><span>&nbsp;Create an account</span></a></p>--}}
                            {{-- <div class="divider my-2">
                                <div class="divider-text">O ingrese con</div>
                            </div>
                            <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="#"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="#"><i data-feather="twitter"></i></a><a class="btn btn-google" href="#"><i data-feather="mail"></i></a><a class="btn btn-github" href="#"><i data-feather="github"></i></a></div> --}}
                        </div>
                    </div>
                    <!-- /Login-->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts-vendor')
    <script src="{!! asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') !!}"></script>
@endpush
@push('scripts-page')

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endpush
