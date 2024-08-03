<!DOCTYPE html>
<html>
<head>
    <title>Sign In Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>
<body>
<div class="main-w3layouts wrapper">
    <h1>Sign In</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            @if (session('error'))
                <h1 class="text-danger">{{ session('error') }}</h1>
            @endif
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('auth.login') }}">
                @csrf
                <input class="text" type="text" name="phone" placeholder="phone" required="">
                <br>
                <input class="text" type="password" name="password" placeholder="Password" required="">
                <input type="submit" value="SIGNIN">
            </form>
        </div>
    </div>
    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
</body>
</html>
