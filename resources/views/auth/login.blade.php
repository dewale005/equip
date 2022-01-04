<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
@include('layouts.styles.head')

<body class="layout-default layout-login-centered-boxed">

    <div class="layout-login-centered-boxed__form card">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (session()->has("alert-$msg"))
                <div class="alert alert alert-soft-{{ $msg }} d-flex d-flex" role="alert">
                    <div class="text-body" style="text-align: center">{{ session()->get("alert-$msg") }}</div>
                </div>
            @endif
        @endforeach

        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
            <a href="{{ route('default') }}" class="navbar-brand flex-column mb-2 align-items-center mr-0"
                style="min-width: 0">
                <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt" style="width: 220px">
                    <img src="{{ asset('public/images/logo/wff-Logo-New-1.png') }}" alt="logo" class="img-fluid" />
                </span>

            </a>
        </div>


        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
            <div class="form-group">
                <label class="text-label" for="email_2">{{__('Email Address:')}}</label>
                <div class="input-group input-group-merge">
                    <input id="email_2" type="email" name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus
                        class="form-control form-control-prepended @error('email') is-invalid @enderror"
                        placeholder="{{__("john@doe.com")}}">


                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="far fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="text-label" for="password_2">{{__('Password:')}}</label>
                <div class="input-group input-group-merge">
                    <input id="password_2" type="password" name="password" required autocomplete="current-password"
                        class="form-control form-control-prepended @error('password') is-invalid @enderror"
                        placeholder="{{__('Enter your password')}}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">{{__('Login')}}</button>
            </div>
            <div class="form-group text-center">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">{{__('Remember me for 30 days')}}</label>
                </div>
            </div>
            <div class="form-group text-center">
                <a href="{{ route('password.request') }}">{{__('Forgot password?')}}</a> <br>
                {{__("Don't have an account?")}} <a class="text-body text-underline" href="{{ route('register') }}">{{__("Sign
                    up!")}}</a>
            </div>
        </form>
    </div>



</body>
@include('layouts.styles.js')

</html>
