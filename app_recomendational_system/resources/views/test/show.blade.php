<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест </title>
    <link rel="stylesheet" href="{{ asset("css/main_page.css") }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/test.js', 'resources/css/test.css'])
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/start') }}">
                Рекомендательная система для абитуриентов ИРИТ-РТФ
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
                                    {{ __('Выйти') }}
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
            <span class="header-text">Для большей точности прогноза пройдите пожалуйста тест.
                Не забудьте указать информацию о себе,своих предпочтениях,хобби и т.п внизу страницы и узнайте рекомендацию.
        </span>
        </div>
    </div>
</header>

<main>
    <div class="test-container">
        <form id="careerTestForm" action="{{ route('result') }}" method="post">
            <!-- Вопрос 1 -->
            @csrf
            <div class="question">
                <h3>1. Какой язык программирования тебе ближе всего?</h3>
                <div class="options">
                    <label class="option">
                        <input type="checkbox" name="languages[]" value="Python"> Python
                    </label>
                    <label class="option">
                        <input type="checkbox" name="languages[]" value="C++"> C++
                    </label>
                    <label class="option">
                        <input type="checkbox" name="languages[]" value="C#"> C#
                    </label>
                    <label class="option">
                        <input type="checkbox" name="languages[]" value="JavaScript"> JavaScript
                    </label>
                    <label class="option">
                        <input type="checkbox" name="languages[]" value="Java"> Java
                    </label>
                    <label class="option">
                        <input type="checkbox" name="languages[]" value="Kotlin/Swift"> Kotlin/Swift
                    </label>
                </div>
            </div>

            <!-- Вопрос 2 -->
            <div class="question">
                <h3>2. Какую роль тебе комфортнее всего взять в команде?</h3>
                <div class="options">
                    <label class="option">
                        <input type="checkbox" name="roles[]" value="Тот, кто пишет сложные алгоритмы"> Тот, кто пишет сложные алгоритмы
                    </label>
                    <label class="option">
                        <input type="checkbox" name="roles[]" value="Тот, кто анализирует данные и предлагает выводы"> Тот, кто анализирует данные и предлагает выводы
                    </label>
                    <label class="option">
                        <input type="checkbox" name="roles[]" value="Тот, кто думает, как обезопасить проект"> Тот, кто думает, как обезопасить проект
                    </label>
                    <label class="option">
                        <input type="checkbox" name="roles[]" value="Тот, кто делает интерфейс"> Тот, кто делает интерфейс
                    </label>
                    <label class="option">
                        <input type="checkbox" name="roles[]" value="Тот, кто собирает устройство, подключает датчики и отлаживает работу железа"> Тот, кто собирает устройство, подключает датчики и отлаживает работу железа
                    </label>
                </div>
            </div>

            <!-- Вопрос 3 -->
            <div class="question">
                <h3>3. С кем тебе проще общаться?</h3>
                <div class="options">
                    <label class="option">
                        <input type="checkbox" name="actions[]" value="С компьютером — он логичен"> С компьютером — он логичен
                    </label>
                    <label class="option">
                        <input type="checkbox" name="actions[]" value="С данными — они честнее слов"> С данными — они честнее слов
                    </label>
                    <label class="option">
                        <input type="checkbox" name="actions[]" value="С системами — люблю находить, где что ломается"> С системами — люблю находить, где что ломается
                    </label>
                    <label class="option">
                        <input type="checkbox" name="actions[]" value="С интерфейсами — мне важно, как выглядит и работает"> С интерфейсами — мне важно, как выглядит и работает
                    </label>
                    <label class="option">
                        <input type="checkbox" name="actions[]" value="С приборами — люблю паять, измерять и проверять, как работает железо"> С приборами — люблю паять, измерять и проверять, как работает железо
                    </label>
                </div>
            </div>

            <!-- Вопрос 4 -->
            <div class="question">
                <h3>4. Что тебе больше всего нравится в фильмах/сериалах о технологиях?</h3>
                <div class="options">
                    <label class="option">
                        <input type="checkbox" name="films[]" value="Искусственный интеллект и его поведение"> Искусственный интеллект и его поведение
                    </label>
                    <label class="option">
                        <input type="checkbox" name="films[]" value="Хакеры, слежка, цифровая война"> Хакеры, слежка, цифровая война
                    </label>
                    <label class="option">
                        <input type="checkbox" name="films[]" value="Моменты, где кто-то программирует"> Моменты, где кто-то программирует
                    </label>
                    <label class="option">
                        <input type="checkbox" name="films[]" value="Роботы, механизмы, дроны"> Роботы, механизмы, дроны
                    </label>
                </div>
            </div>

        <div class="edu-programs">
                <div class="about-me">
                    <span class="about-me-text">Расскажите кратко про свои увлечения:</span>
                    <div class="form-group">
                        <label for="message"></label>
                        <textarea class="message-area" type="text" name="text" id="message" placeholder="Message" required></textarea>
                    </div>
                </div>
                <button type="submit" class="result-btn">Показать результат</button>
        </div>
        </form>
        </div>
</main>

<footer>

</footer>
</body>
</html>
