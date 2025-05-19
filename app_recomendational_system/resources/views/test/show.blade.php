<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест </title>
    <link rel="stylesheet" href="{{ asset("css/style_page_1.css") }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/script_page_2.js', 'resources/css/style_page_2.css'])
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                Recomendational system
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<header>
    <div class="container">
        <div class="header-content">
            <span class="header-title">Расскажите о себе</span>
            <span class="header-text">Выберите интересующие вас направления и темы, чтобы мы могли подобрать
          наиболее подходящие образовательные программы.
        </span>
        </div>
    </div>
</header>

<main>

    <div class="container">
        <div class="edu-programs">
            <div class="interests">
                <div class="interest">Программирование</div>
                <div class="interest">Робототехника</div>
                <div class="interest">Искусственный интеллект</div>
                <div class="interest">Радиоэлектроника</div>
                <div class="interest">Математика</div>
                <div class="interest">Физика</div>
                <div class="interest">Дизайн интерфейсов</div>
                <div class="interest">Менеджмент проектов</div>
            </div>
            <form action="{{ route('result') }}" method="post" class="contact-information">
                @csrf
                <div class="about-me">
                    <span class="about-me-text">Расскажите кратко про свои увлечения:</span>
                    <div class="form-group">
                        <label for="message"></label>
                        <textarea class="message-area" type="text" name="text" id="message" placeholder="Message" required></textarea>
                    </div>
                </div>
                <button type="submit" class="result-btn">Показать результат</button>
            </form>
        </div>
    </div>
</main>

<footer>

</footer>
</body>
</html>
