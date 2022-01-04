<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
@include('layouts.styles.head')

<body class="layout-default layout-login-centered-boxed">
    <div id="myModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    {{-- <img src="{{ asset('public/images/video1.mp4') }}" alt="" srcset=""> --}}
                    <video width="100%" height="440" controls autoplay>
                        <source src="{{ asset('public/images/video1.mp4') }}" type="video/mp4">
                        {{-- <source src="{{ asset('public/images/video1.mp4') }}" type="video/ogg"> --}}
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="layout-login-centered-boxed__form card">

        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
            <a href="{{ route('default') }}" class="navbar-brand flex-column mb-2 align-items-center mr-0"
                style="min-width: 0">
                <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt" style="width: 220px">
                    <img src="{{ asset('public/images/logo/wff-Logo-New-1.png')}}" alt="logo" class="img-fluid" />
                </span>
    
            </a>
        </div>
    
    
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <div class="card-header">{{ __('Confirm Your Email Address') }}</div>
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification will be sent to your email address. within 24 hours') }}
                            </div>
                        @endif
    
                        {{ __('Before proceeding, please check your email for a confirmation link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
@include('layouts.styles.js')

</html>