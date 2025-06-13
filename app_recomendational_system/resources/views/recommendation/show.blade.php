<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendational System</title>
    <link rel="stylesheet" href="{{ asset("css/personal_account.css") }}">
    @vite(['resources/sass/app.scss','resources/js/app.js', 'resources/js/personal_account.js', 'resources/css/personal_account.css'])
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<header>
    <div class="container">
        <div class="header-content">
            <div><span class="header-text">Рекомендательная система для абитуриентов ИРИТ-РТФ</span></div>
            <div class="header-main-page-container">
                <a class="header-main-page-link" href="{{route('start')}}">Главная страница</a>
            </div>
        </div>
    </div>
</header>

<main>

    <div class="container">
        <div class="text-container">
            <span class="personal_account">Личный кабинет</span>
            <span class="results">Ваши результаты:</span>
        </div>
    </div>

    <div class="container">
        <div class="recommendation-card">
            @foreach($recomendations as $recomendation)
            <div class="recommendation-card-header">
                <span class="recommendation-card-title"></span>
                <div class="buttons">
                    <div class="editing">
                        <button class="editing-button" type="submit"><img src="{{ asset('images/editing.webp') }}" alt=""></button>
                    </div>
                    <div class="trash"><img src="{{ asset('images/trash.webp') }}" alt=""></div>
                </div>
            </div>
            <span class="recommendation-card-number"></span>
            <span class="recommendation-card-text">{{$recomendation->recomendation}}</span>
            <span class="recommendation-card-text"><br><br>
            <span class="recommendation-card-points"></span>
        </div>
    </div>
    @endforeach
</main>

<script src="scripts/personal_account.js"></script>
</body>
</html>
