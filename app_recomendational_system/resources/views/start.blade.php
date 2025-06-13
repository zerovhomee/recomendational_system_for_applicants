<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="{{ asset("css/style_page_1.css") }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    @vite(['resources/sass/app.scss','resources/js/app.js', 'resources/js/script_page_1.js', 'resources/css/style_page_1.css'])
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
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
                        <a class="navbar-brand" href="{{ route('recommendations.index') }}">
                            Личный кабинет
                        </a>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
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
            <span class="header-text">Система рекомендаций для абитуриентов ИРИТ-РТФ</span>
        </div>
    </div>
</header>

<main>

    <div class="container">
        <div class="project-description">
            <h2 class="project-title">Кратко про наш проект:</h2>
            <div class="project-content">
                <p class="highlight-paragraph">Мы разработали платформу, которая помогает абитуриентам находить образовательные программы ИРИТ-РТФ УрФУ, идеально соответствующие их интересам и способностям.</p>

                <div class="feature-block">
                    <p>Искусственный интеллект анализирует данные, полученные в ходе интерактивного тестирования, где вы рассказываете о своих:</p>
                    <ul class="features-list">
                        <li>увлечениях</li>
                        <li>навыках</li>
                        <li>жизненных целях</li>
                    </ul>
                </div>

                <p class="recommendation-text">На основе этих ответов система сравнивает ваш потенциал с примерами успешных студентов института и предлагает персонализированные рекомендации.</p>

                <div class="benefits-container">
                    <div class="benefit-card">
                        <div class="benefit-icon">✓</div>
                        <p class="benefit-text">Исключает долгий перебор вариантов</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">⏱️</div>
                        <p class="benefit-text">Экономит ваше время</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">✅</div>
                        <p class="benefit-text">Снижает риск ошибки при выборе вуза</p>
                    </div>
                </div>

                <p class="emphasis-text">Платформа особенно полезна для тех, кто сомневается в своих силах или ищет подтверждение правильности своего пути.</p>

                <div class="institute-cta-block">
                    <div class="institute-content">
                        <h3 class="institute-title">ИРИТ-РТФ УрФУ — среда для создателей будущего</h3>
                        <p class="institute-description">Наш инструмент поможет вам стать частью технологического прогресса, подбирая оптимальные образовательные программы в перспективных направлениях:</p>

                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <div class="swiper-slide-text-container">
                                            <span class="swiper-slide-title">Радиотехника</span>
                                            <span class="swiper-slide-number">11.03.01</span>
                                            <span class="swiper-slide-text">Программа ориентирует выпускников на активное участие и инициативу в
                  прорывном развитии радиоэлектронных производств, на освоение новой техники, внедрение новых
                  технологий, изменение культуры производства, следование основным направлениям развития четвертой
                  промышленной революции.</span>
                                            <span class="swiper-slide-text">Проходной балл в 2024<br><br>
                    <span class="swiper-slide-points">184</span>
                  </span>
                                        </div>
                                        <div class="swiper-slide-img">
                                            <img src="{{ asset('images/radio.svg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <div class="swiper-slide-text-container">
                                            <span class="swiper-slide-title">Программная инженерия</span>
                                            <span class="swiper-slide-number">09.03.04</span>
                                            <span class="swiper-slide-text">“Программная инженерия” - флагманская программа бакалавриата ИРИТ-РТФ,
                  выпускники которой становятся универсальными ИТ-специалистами и знают всю кухню создания проектов
                  изнутри: от написания кода и дизайна до юридических тонкостей и ГОСТов.</span>
                                            <span class="swiper-slide-text">Проходной балл в 2024<br><br>
                    <span class="swiper-slide-points">244</span>
                  </span>
                                        </div>
                                        <div class="swiper-slide-img">
                                            <img src="{{ asset('images/sofrware_engineering.webp') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <div class="swiper-slide-text-container">
                                            <span class="swiper-slide-title">Конструирование и технология электронных средств</span>
                                            <span class="swiper-slide-number">11.03.03</span>
                                            <span class="swiper-slide-text">Все гаджеты и многие вещи повседневного быта, которые ждут нас дома после работы или
                  учебы стали результатом воплощения абстрактных идей, физико-математических принципов, а также
                  применения техник и технологий профессиональным сообществом инженеров-конструкторов.</span>
                                            <span class="swiper-slide-text">Проходной балл в 2024<br><br>
                    <span class="swiper-slide-points">184</span>
                  </span>
                                        </div>
                                        <div class="swiper-slide-img">
                                            <img src="{{ asset('images/electronic_means.svg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <div class="swiper-slide-text-container">
                                            <span class="swiper-slide-title">Информатика и вычислительная техника</span>
                                            <span class="swiper-slide-number">09.03.01</span>
                                            <span class="swiper-slide-text">Студенты ИВТ изучают строение и архитектуру компьютеров, операционных
                  систем, а также осваивают основные языки программирования, учатся анализировать и прогнозировать
                  потоки информации.</span>
                                            <span class="swiper-slide-text">Проходной балл в 2024<br><br>
                    <span class="swiper-slide-points">241</span>
                  </span>
                                        </div>
                                        <div class="swiper-slide-img">
                                            <img src="{{ asset('images/computer_technology.webp') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <div class="swiper-slide-text-container">
                                            <span class="swiper-slide-title">Безопасность компьютерных систем</span>
                                            <span class="swiper-slide-number">10.03.01</span>
                                            <span class="swiper-slide-text">В наше время всеобщей цифровизации многим крупным предприятиям и
                  организациям понадобился свой новый супергерой – защитник интересов мирных жителей против злодеев
                  ИТ-сферы. Он спасает конфиденциальные данные, находит уязвимости в системах и предотвращает утечки
                  информации.</span>
                                            <span class="swiper-slide-text">Проходной балл в 2024<br><br>
                    <span class="swiper-slide-points">239</span>
                  </span>
                                        </div>
                                        <div class="swiper-slide-img">
                                            <img src="{{ asset('images/cybersecurity.webp') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <div class="swiper-slide-text-container">
                                            <span class="swiper-slide-title">Алгоритмы искусственного интеллекта</span>
                                            <span class="swiper-slide-number">09.03.01</span>
                                            <span class="swiper-slide-text">Специалисты в области развития
                  искусственного интеллекта и наши студенты регулярно имеют дело с этими необычными терминами.
                                                Их значение и применение на практике изучается в рамках
                  программы «Алгоритмы искусственного интеллекта».</span>
                                            <span class="swiper-slide-text">Проходной балл в 2024<br><br>
                    <span class="swiper-slide-points">246</span>
                  </span>
                                        </div>
                                        <div class="swiper-slide-img">
                                            <img src="{{ asset('images/AI.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-controls">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next"></div>
                            </div>

                        </div>
                    </div>

                    <div class="cta-content">
                        <p class="cta-text">Начните свой путь к осознанной карьере уже сегодня</p>
                        <div class="cta">
                            <a class="cta-button" href="{{ route('test') }}">📝Пройти тест</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer>

</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="scripts/script_page_1.js"></script>
</body>
</html>
