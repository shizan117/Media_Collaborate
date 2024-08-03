
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            @if(Auth::check())
                @if(Auth::user()->role === 'public')
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <p>Home</p>
                    </a>
                @elseif(Auth::user()->role === 'video_man')
                    <a href="{{ route('video_man.dashboard') }}" class="nav-link">
                        <p>Home</p>
                    </a>
                @elseif(Auth::user()->role === 'video_editor')
                    <a href="{{ route('video_editor.dashboard') }}" class="nav-link">
                        <p>Home</p>
                    </a>
                @elseif(Auth::user()->role === 'admin')
                    <a href="{{ route('video_editor.dashboard') }}" class="nav-link">
                        <p>Home</p>
                    </a>
                @else
                    <a href="{{ route('auth.sign.out') }}" class="nav-link">
                        <p>Unauthorized Home</p>
                    </a>
                @endif
            @else
                <script>
                    window.location.href = "{{ route('auth.loginForm') }}";
                </script>
            @endif
        </li>


    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{route('auth.sign.out')}}">Sign out</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
