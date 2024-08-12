<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hotflix.volkovdesign.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Aug 2024 11:53:23 GMT -->
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

@include('front_end.layouts.navbar')



@yield('content')





@include('front_end.layouts.footer');

<!-- plan modal -->
<div class="modal fade" id="plan-modal" tabindex="-1" aria-labelledby="plan-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <button class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x"></i></button>

                <form action="#" class="modal__form">
                    <h4 class="modal__title">Select plan</h4>

                    <div class="sign__group">
                        <label for="fullname" class="sign__label">Name</label>
                        <input id="fullname" type="text" name="name" class="sign__input" placeholder="Full name">
                    </div>

                    <div class="sign__group">
                        <label for="email" class="sign__label">Email</label>
                        <input id="email" type="text" name="email" class="sign__input" placeholder="example@domain.com">
                    </div>

                    <div class="sign__group">
                        <label class="sign__label" for="value">Choose plan:</label>
                        <select class="sign__select" name="value" id="value">
                            <option value="35">Premium - $34.99</option>
                            <option value="50">Cinematic - $49.99</option>
                        </select>

                        <span class="sign__text">You can spend money from your account on the renewal of the connected packages, or to order cars on our website.</span>
                    </div>

                    <div class="sign__group">
                        <label class="sign__label">Payment method:</label>

                        <ul class="sign__radio">
                            <li>
                                <input id="type1" type="radio" name="type" checked="">
                                <label for="type1">Visa</label>
                            </li>
                            <li>
                                <input id="type2" type="radio" name="type">
                                <label for="type2">Mastercard</label>
                            </li>
                            <li>
                                <input id="type3" type="radio" name="type">
                                <label for="type3">Paypal</label>
                            </li>
                        </ul>
                    </div>

                    <button type="button" class="sign__btn sign__btn--modal">
                        <span>Proceed</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end plan modal -->

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
