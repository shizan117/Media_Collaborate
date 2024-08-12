<!-- header -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <!-- header logo -->
                    <a href="index.html" class="header__logo">
                        <img src="{{asset('front-end-assets')}}/img/logo.svg" alt="">
                    </a>
                    <!-- end header logo -->

                    <!-- header nav -->
                    <ul class="header__nav">
                        <!-- dropdown -->
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home <i class="ti ti-chevron-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li><a href="index.html">Home style 1</a></li>
                                <li><a href="index2.html">Home style 2</a></li>
                                <li><a href="index3.html">Home style 3</a></li>
                            </ul>
                        </li>
                        <!-- end dropdown -->

                        <!-- dropdown -->
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalog <i class="ti ti-chevron-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li><a href="catalog.html">Catalog style 1</a></li>
                                <li><a href="catalog2.html">Catalog style 2</a></li>
                                <li><a href="details.html">Details Movie</a></li>
                                <li><a href="details2.html">Details TV Series</a></li>
                            </ul>
                        </li>
                        <!-- end dropdown -->

                        <li class="header__nav-item">
                            <a href="pricing.html" class="header__nav-link">Pricing plan</a>
                        </li>

                        <!-- dropdown -->
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages <i class="ti ti-chevron-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="actor.html">Actor</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="faq.html">Help center</a></li>
                                <li><a href="privacy.html">Privacy policy</a></li>
                                <li><a href="http://hotflix.volkovdesign.com/admin/index.html" target="_blank">Admin pages</a></li>
                            </ul>
                        </li>
                        <!-- end dropdown -->

                        <!-- dropdown -->
                        <li class="header__nav-item">
                            <a class="header__nav-link header__nav-link--more" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li><a href="{{route('public.user.signIn')}}">Sign in</a></li>
                                <li><a href="signup.html">Sign up</a></li>
                                <li><a href="forgot.html">Forgot password</a></li>
                                <li><a href="404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <!-- end dropdown -->
                    </ul>
                    <!-- end header nav -->

                    <!-- header auth -->
                    <div class="header__auth">
                        <form action="#" class="header__search">
                            <input class="header__search-input" type="text" placeholder="Search...">
                            <button class="header__search-button" type="button">
                                <i class="ti ti-search"></i>
                            </button>
                            <button class="header__search-close" type="button">
                                <i class="ti ti-x"></i>
                            </button>
                        </form>

                        <button class="header__search-btn" type="button">
                            <i class="ti ti-search"></i>
                        </button>

                        <!-- dropdown -->
                        <div class="header__lang">
                            <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">EN <i class="ti ti-chevron-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Spanish</a></li>
                                <li><a href="#">French</a></li>
                            </ul>
                        </div>
                        <!-- end dropdown -->

                        <!-- dropdown -->
                        <div class="header__profile">
                            <a class="header__sign-in header__sign-in--user" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-user"></i>
                                @if(Auth::check() && Auth::user()->role === 'public')
                                    <span>{{ Auth::user()->name }}</span>
                                @else
                                    <span>Guest</span>
                                @endif


                            </a>

                            <ul class="dropdown-menu dropdown-menu-end header__dropdown-menu header__dropdown-menu--user">
                                <li><a href="profile.html"><i class="ti ti-ghost"></i>Profile</a></li>
                                <li><a href="profile.html"><i class="ti ti-stereo-glasses"></i>Subscription</a></li>
                                <li><a href="profile.html"><i class="ti ti-bookmark"></i>Favorites</a></li>
                                <li><a href="profile.html"><i class="ti ti-settings"></i>Settings</a></li>


                                @if(Auth::check() && Auth::user()->role === 'public')
                                    <li><a href="{{route('public.auth.sign.out')}}"><i class="ti ti-logout"></i>Logout</a></li>

                                @endif

                            </ul>
                        </div>
                        <!-- end dropdown -->
                    </div>
                    <!-- end header auth -->

                    <!-- header menu btn -->
                    <button class="header__btn" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- end header menu btn -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
