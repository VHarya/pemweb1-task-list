<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    @yield('style')
</head>
<body>
    <nav>
        <a href="/">
            <h1>SOLIDTASK</h1>
        </a>
        <div>
            @auth
                <a href="{{ route('logout') }}" class="auth-button">Logout</a>
            @endauth
            @guest
                <a href="/login" class="auth-button">Login</a>
                <a href="/register" class="auth-button">Register</a>
            @endguest
        </div>
    </nav>
    @yield('content')
</body>
</html>