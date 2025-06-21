<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест </title>
    <link rel="stylesheet" href="{{ asset("css/main_page.css") }}">
    @vite(['resources/sass/app.scss', 'resources/js/result.js', 'resources/css/result.css'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/start') }}">
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
            <span class="header-title">Ваши результаты:</span>
        </div>
    </div>
</header>


<!-- Блок с карточками специальностей -->
<section class="prediction-result">
    <div class="container">
        <div class="results-container">
            @foreach($best_probability as $key => $value)
                <div class="specialty-card">
                    <div class="card-header">
                        <h3>{{ $key }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="match-value">Сходство: {{ $value }}%</div>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="emphasis-text">Для более подробной информации перейдите в личный кабинет и ознакомьтесь с расширенным итогом рекомендации</p>
        <div class="cta-content">
            <div class="cta">
                <a class="cta-button" href="{{ route('recommendations.index') }}">Перейти в личный кабинет</a>
            </div>
        </div>
    </div>
</section>


<script src="scripts/script_page_3.js"></script>
</body>
</html>
