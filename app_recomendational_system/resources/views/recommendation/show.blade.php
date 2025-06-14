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

    @foreach($recomendations as $recomendation)
    <div class="container">
        <div class="recommendation-card">
            <div class="recommendation-card-header">
                <span class="recommendation-card-title">{{$recomendation->program}}</span>
            </div>
            <span class="recommendation-card-number">Сходство: {{$recomendation->probability}}</span>
            <span class="recommendation-card-text">{{$recomendation->speciality->description}}</span>
            <span class="recommendation-card-text">Проходной балл 2024:<br><br>
            <span class="recommendation-card-points">{{$recomendation->speciality->last_year_mark}}</span>
        </div>
    </div>
    @endforeach
</main>

<script src="scripts/personal_account.js"></script>
</body>
</html>
