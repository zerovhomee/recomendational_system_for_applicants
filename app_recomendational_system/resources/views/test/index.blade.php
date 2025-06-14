<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест: Какое IT-направление тебе подходит?</title>
    <link rel="stylesheet" href="{{ asset("css/test.css") }}">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/test.css'])
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<header>
    <div class="container">
        <div class="header-content">
            <span class="header-text">Отлично, вы заполнили информацию о себе. Для большей точности прогноза пройдите пожалуйста тест
                и узнайте рекомендацию для вас</span>
        </div>
    </div>
</header>
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
                    <input type="checkbox" name="actions[]" value="С приборами — люблю паять, измерять и проверять, как работает 'железо'"> С приборами — люблю паять, измерять и проверять, как работает "железо"
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

        <button type="submit">Узнать результат</button>
    </form>
</div>
</body>
