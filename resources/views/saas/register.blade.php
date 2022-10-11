<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title> {{ __($pageTitle) }} | {{ ucwords($setting->company_name)}}</title>
    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $global->favicon_url }}">
    {{--<link rel="manifest" href="{{ asset('favicon/manifest.json') }}">--}}
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ $global->favicon_url }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('saas/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('saas/vendor/animate-css/animate.min.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('saas/vendor/slick/slick.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('saas/vendor/slick/slick-theme.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('saas/fonts/flaticon/flaticon.css') }}">
    <link href="{{ asset('front/plugin/froiden-helper/helper.css') }}" rel="stylesheet">
    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('saas/css/main.css') }}">
    <!-- Template Font Family  -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" media="all"
          href="{{ asset('saas/vendor/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <style>
        :root {
            --main-color: {{ $frontDetail->primary_color }};
        }
        .help-block {
            color: #8a1f11 !important;
        }
        .register-message  {
            margin-top: 50px !important;
             margin-bottom: 50px;
        }
        .form-control{
            height: 40px;
        }
        .form-control:focus{
            border: 2px solid #78150d;
            box-shadow: none;
        }
        .login-box label{color: #000;}
        .checkbox-primary{display: flex; align-items: flex-start;}
        .checkbox-primary label{font-size: 12px;
    display: inline-block;
    padding-left: 10px;
    line-height: 1.2;}
    .title-sm {
    font-size: 0.875rem;
    color: #262a2e;
    font-weight: 500;
    display: flex;
    align-items: center;
}
    .title.title-wth-divider::before, .title-lg.title-wth-divider::before, .title-sm.title-wth-divider::before, .title-xs.title-wth-divider::before {
    content: "";
    display: block;
    height: 1px;
    width: 0;
    background: #d8d8d8;
}
    .title.title-wth-divider::after, .title-lg.title-wth-divider::after, .title-sm.title-wth-divider::after, .title-xs.title-wth-divider::after {
    content: "";
    display: block;
    height: 1px;
    width: 0;
    background: #d8d8d8;
}
.title.title-wth-divider > span, .title-lg.title-wth-divider > span, .title-sm.title-wth-divider > span, .title-xs.title-wth-divider > span {
    display: flex;
    white-space: nowrap;
    align-items: center;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
}
.title.title-wth-divider.divider-center::before, .title-lg.title-wth-divider.divider-center::before, .title-sm.title-wth-divider.divider-center::before, .title-xs.title-wth-divider.divider-center::before {
    width: 100%;
    margin-right: 0.625rem;
}
.title.title-wth-divider.divider-center::after, .title-lg.title-wth-divider.divider-center::after, .title-sm.title-wth-divider.divider-center::after, .title-xs.title-wth-divider.divider-center::after {
    width: 100%;
    margin-right: 0.625rem;
}
    </style>
</head>

<body id="home">


<!-- Topbar -->

<!-- END Topbar -->

<!-- Header -->
<!-- END Header -->


<section class="sp-100 login-section bg-white" id="section-contact">
    <div class="container">
        @if($registrationStatus->registration_open == 1 && $global->enable_register == true)
        <div id="auth-logo" style="display: flex;
    justify-content: center;
    align-items: center;">
            <img src="{{ $setting->logo_url }}" style="max-height: 50px;" alt="Logo"/>
        </div>
        <div class="login-box mt-5 shadow bg-white form-section" style="width: 450px;padding: 10px;">
            <h5 class="mb-0 text-center pt-5">
                <!-- @lang('app.signup') -->
                Sign Up to JurisLPM
            </h5>
            <p class="text-center py-1" style="font-size: 14px;">Already a member?
                <a href="#">Sign In</a>
            </p>
            <button type="button" class="btn mt-2 w-100 bg-white text-dark" id="save-form" style="border: 1px solid #000;">
                        Sign Up with Google
                    </button>
                    <button type="button" class="btn mt-2 w-100" id="save-form" style="background-color: #1778F2">
                        Sign up with Facebook
                    </button>
            {!! Form::open(['id'=>'register', 'method'=>'POST']) !!}
            <div class="title-sm title-wth-divider divider-center my-4"><span>Or</span></div>
            <div class="row">
                <div id="alert" class="col-lg-12 col-12">

                </div>
                <div class="col-12" id="form-box">
                    <div class="form-group mb-4">
                        <label for="company_name">{{ __('modules.client.companyName') }}</label>
                        <input type="text" name="company_name" id="company_name" placeholder="{{ __('modules.client.companyName') }}" class="form-control">
                    </div>
                    @if(module_enabled('Subdomain'))
                    <div class="form-group">
                        <label for="company_name clearfix">{{ __('app.subdomain') }}</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="subdomain" name="sub_domain" id="sub_domain">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">.{{ get_domain() }}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group mb-4">
                        <label for="email">{{ __('app.yourEmailAddress') }}</label>
                        <input type="email" name="email" id="email" placeholder="{{ __('app.yourEmailAddress') }}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="password">{{__('modules.client.password')}}</label>
                        <input type="password" class="form-control " id="password" name="password" placeholder="{{__('modules.client.password')}}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="password_confirmation">{{__('app.confirmPassword')}}</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{__('app.confirmPassword')}}">
                    </div>
                    @if($global->google_recaptcha_status  && $global->google_captcha_version=="v2")
                        <div class="form-group mb-4">
                            <div class="g-recaptcha" data-sitekey="{{ $global->google_recaptcha_key }}"></div>
                        </div>
                    @endif
                    <input type='hidden' name='recaptcha_token' id='recaptcha_token'>
                    <div class="checkbox checkbox-primary pull-left p-t-0">
                        <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="checkbox-signup" class="text-dark"> By creating an account you specify that you have read and agree with our Tearms of use and Privacy policy. We may keep you inform about latest updates through our default notification settings </label>
                    </div>
                    <button type="button" class="btn btn-custom mt-2 w-100" id="save-form" style="background-color: #78150d">
                        @lang('app.signup')
                    </button>
                    
                </div>
            </div>
            {!! Form::close() !!}

        </div>
        @else
        <div class="login-box mt-5 form-section register-message">
            <h5 class="mb-0 text-center">
                {!! $signUpMessage->message !!}
            </h5>
        </div>
        @endif
    </div>
</section>

<!-- END Main container -->




<!-- Scripts -->
<script src="{{ asset('saas/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('saas/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('saas/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('saas/vendor/wowjs/wow.min.js') }}"></script>
<script src="{{ asset('saas/js/main.js') }}"></script>
<script src="{{ asset('front/plugin/froiden-helper/helper.js') }}"></script>
<!-- Global Required JS -->

<script>
    $('#save-form').click(function () {


        $.easyAjax({
            url: '{{route('front.signup.store')}}',
            container: '.form-section',
            type: "POST",
            data: $('#register').serialize(),
            messagePosition: "inline",
            success: function (response) {
                if (response.status == 'success') {
                    $('#form-box').remove();
                } else if (response.status == 'fail') {
                    @if($global->google_recaptcha_status)
                    grecaptcha.reset();
                    @endif

                }
            }
        })
    });
</script>
@if($global->google_recaptcha_status  && $global->google_captcha_version=="v3")
    <script src="https://www.google.com/recaptcha/api.js?render={{ $global->google_recaptcha_key }}"></script>

    <script>
        setTimeout(function () {

            grecaptcha.ready(function () {
                grecaptcha.execute('{{ $global->google_recaptcha_key }}', {action: 'submit'}).then(function (token) {
                    document.getElementById("recaptcha_token").value = token;
                });
            });

        }, 3000);

    </script>
@endif

</body>
</html>
