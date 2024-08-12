<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('front-end-assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('front-end-assets')}}/css/splide.min.css">
    <link rel="stylesheet" href="{{asset('front-end-assets')}}/css/slimselect.css">
    <link rel="stylesheet" href="{{asset('front-end-assets')}}/css/plyr.css">
    <link rel="stylesheet" href="{{asset('front-end-assets')}}/css/photoswipe.css">
    <link rel="stylesheet" href="{{asset('front-end-assets')}}/css/default-skin.css">
    <link rel="stylesheet" href="{{asset('front-end-assets')}}/css/main.css">

    <!-- Icon font -->
    <link rel="stylesheet" href="{{asset('front-end-assets')}}/webfont/tabler-icons.min.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{asset('front-end-assets')}}/icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="{{asset('front-end-assets')}}/icon/favicon-32x32.png">

    <meta name="description" content="Online Movies, TV Shows & Cinema HTML Template">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>HotFlix – Online Movies, TV Shows & Cinema HTML Template</title>
</head>

<body>


<div class="sign section--bg" data-bg="{{asset('front-end-assets')}}/img/bg/section__bg.jpg">

    <div class="container">

        <div class="row">

            <div class="col-12">
                <div class="sign__content">

                    <!-- authorization form -->
                    <form action="{{ route('public.auth.login') }}" method="post" class="sign__form">
                        @if (session('error'))
                            <h1  class="sign__text" style="    font-size: 25px;">{{ session('error') }}</h1>
                        @endif
                        @if ($errors->any())
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="sign__text" style="    font-size: 25px;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            @csrf
                        <a href="index.html" class="sign__logo">
                            <img src="{{asset('front-end-assets')}}/img/logo.svg" alt="">
                        </a>

                        <div class="sign__group">
                            <input type="text" class="sign__input" name="phone" placeholder="phone" required="">

                        </div>

                        <div class="sign__group">
                            <input class="sign__input" type="password" name="password" placeholder="Password" required="">
                        </div>

                        <div class="sign__group sign__group--checkbox">
                            <input id="remember" name="remember" type="checkbox" checked="checked">
                            <label for="remember">Remember Me</label>
                        </div>

                        <button class="sign__btn" type="submit" value="SIGNIN">Sign in</button>

                        <span class="sign__delimiter">or</span>

                        <div class="sign__social">
                            <a class="fb" href="#">Sign in with<i class="ti ti-brand-facebook"></i></a>
                            <a class="tw" href="#">Sign in with<i class="ti ti-brand-x"></i></a>
                            <a class="gl" href="#">Sign in with<i class="ti ti-brand-google"></i></a>
                        </div>

                        <span class="sign__text">Don't have an account? <a href="{{route('public.SignUP')}}">Sign up!</a></span>

                        <span class="sign__text"><a href="forgot.html">Forgot password?</a></span>
                    </form>
                    <!-- end authorization form -->
                </div>
            </div>
        </div>
    </div>
</div>



<!-- JS -->
<script src="{{asset('front-end-assets')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('front-end-assets')}}/js/splide.min.js"></script>
<script src="{{asset('front-end-assets')}}/js/slimselect.min.js"></script>
<script src="{{asset('front-end-assets')}}/js/smooth-scrollbar.js"></script>
<script src="{{asset('front-end-assets')}}/js/plyr.min.js"></script>
<script src="{{asset('front-end-assets')}}/js/photoswipe.min.js"></script>
<script src="{{asset('front-end-assets')}}/js/photoswipe-ui-default.min.js"></script>
<script src="{{asset('front-end-assets')}}/js/main.js"></script>
</body>

<!-- Mirrored from hotflix.volkovdesign.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Aug 2024 11:53:24 GMT -->
</html>
