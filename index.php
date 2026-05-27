<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>

    <main class="main">

        <!-- Hero -->

        <section class="hero">
            <div class="container">
                <div class="hero__wrapper">
                    <div class="hero__content">
                    <span class="hero__subtitle">
                        WEBHEADS
                    </span>
                        <h1 class="hero__title">
                            Разработка, поддержка и доработка сайтов
                        </h1>
                        <p class="hero__text">
                            Создаем современные корпоративные сайты,
                            интернет-магазины и веб-сервисы с использованием
                            PHP, JavaScript и MySQL.
                        </p>
                        <div class="hero__buttons">
                            <a href="#feedback" class="button">
                                Оставить заявку
                            </a>
                            <a href="/portfolio/" class="button button--border">
                                Смотреть проекты
                            </a>
                        </div>
                    </div>
                    <div class="hero__image">
                        <img src="/assets/img/content/hero.png" alt="WEBHEADS">
                    </div>
                </div>
            </div>
        </section>

        <!-- About -->
        <section class="about section">
            <div class="container">
                <div class="section__heading">
                <span class="section__subtitle">
                    О компании
                </span>
                    <h2 class="section__title">
                        Разработка IT-решений для бизнеса
                    </h2>
                </div>
                <div class="about__content">
                    <p>
                        Компания WEBHEADS специализируется на разработке,
                        поддержке и модернизации веб-проектов различной сложности.
                    </p>
                    <p>
                        Профессиональная разработка модулей и доработки любой сложности
                        для CMS Bitrix, CRM Bitrix24, CMS OpenCart, CMS WordPress.
                    </p>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="services section">
            <div class="container">
                <div class="section__heading">
                <span class="section__subtitle">
                    Услуги
                </span>
                    <h2 class="section__title">
                        Основные направления деятельности
                    </h2>
                </div>
                <div class="services__grid">
                    <div class="service-card">
                        <h3>
                            Разработка сайтов
                        </h3>
                        <p>
                            Создание корпоративных сайтов,
                            интернет-магазинов и веб-сервисов.
                        </p>
                    </div>
                    <div class="service-card">
                        <h3>
                            Поддержка сайтов
                        </h3>
                        <p>
                            Техническое сопровождение,
                            исправление ошибок и обновление контента.
                        </p>
                    </div>
                    <div class="service-card">
                        <h3>
                            Доработка функционала
                        </h3>
                        <p>
                            Расширение возможностей существующих проектов
                            и интеграция новых модулей.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio -->
        <section class="portfolio section">
            <div class="container">
                <div class="section__heading">
                <span class="section__subtitle">
                    Портфолио
                </span>
                    <h2 class="section__title">
                        Реализованные проекты
                    </h2>
                </div>
                <div class="portfolio__grid">
                    <div class="portfolio-card">
                        <img src="/assets/img/portfolio/1.png" alt="">
                        <h3>
                            Оптово-розничный магазин тканей и текстиля
                        </h3>
                    </div>
                    <div class="portfolio-card">
                        <img src="/assets/img/portfolio/2.png" alt="">
                        <h3>
                            Интернет-магазин электротранспорта и комплектующих
                        </h3>
                    </div>
                    <div class="portfolio-card">
                        <img src="/assets/img/portfolio/3.png" alt="">
                        <h3>
                            Интернет-магазин иностранной литературы
                        </h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technologies -->
        <section class="technologies section">
            <div class="container">
                <div class="section__heading">
                <span class="section__subtitle">
                    Технологии
                </span>
                    <h2 class="section__title">
                        Используемые технологии
                    </h2>
                </div>

                <div class="technologies__list">
                    <span>PHP</span>
                    <span>MySQL</span>
                    <span>JavaScript</span>
                    <span>HTML5</span>
                    <span>CSS3</span>
                </div>
            </div>
        </section>

        <!-- Feedback -->
        <?include $_SERVER['DOCUMENT_ROOT'] . '/include/form.php';?>
    </main>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>