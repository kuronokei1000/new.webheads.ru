<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>

    <main class="main">

        <section class="hero">
            <div class="container">
                <div class="hero__wrapper">

                    <div class="hero__content">
                    <span class="hero__subtitle">
                        Услуги
                    </span>

                        <h1 class="hero__title">
                            Комплексная работа с веб-проектами
                        </h1>

                        <p class="hero__text">
                            WEBHEADS выполняет разработку новых сайтов, техническую
                            поддержку действующих проектов и доработку функционала
                            под задачи бизнеса.
                        </p>

                        <div class="hero__buttons">
                            <a href="#services-list" class="button">
                                Смотреть услуги
                            </a>

                            <a href="#feedback" class="button button--border">
                                Оставить заявку
                            </a>
                        </div>
                    </div>

                    <div class="hero__image">
                        <img src="/assets/img/content/hero.png" alt="Услуги WEBHEADS">
                    </div>

                </div>
            </div>
        </section>

        <section class="services section" id="services-list">
            <div class="container">

                <div class="section__heading">
                <span class="section__subtitle">
                    Направления
                </span>

                    <h2 class="section__title">
                        Основные услуги компании
                    </h2>
                </div>

                <div class="services__grid">

                    <article class="service-card">
                        <h3>
                            Разработка сайтов
                        </h3>

                        <p>
                            Создание корпоративных сайтов, интернет-магазинов
                            и веб-сервисов с адаптивной версткой, удобной структурой
                            и подключением необходимого функционала.
                        </p>

                        <a href="/services/development/" class="service-card__link">
                            Подробнее
                        </a>
                    </article>

                    <article class="service-card">
                        <h3>
                            Поддержка сайтов
                        </h3>

                        <p>
                            Техническое сопровождение действующих веб-проектов:
                            исправление ошибок, обновление контента, проверка форм,
                            ссылок и корректности работы сайта.
                        </p>

                        <a href="/services/support/" class="service-card__link">
                            Подробнее
                        </a>
                    </article>

                    <article class="service-card">
                        <h3>
                            Доработка функционала
                        </h3>

                        <p>
                            Расширение возможностей существующего сайта: добавление
                            новых разделов, форм, интерфейсных элементов, интеграций
                            и работы с базой данных.
                        </p>

                        <a href="/services/upgrade/" class="service-card__link">
                            Подробнее
                        </a>
                    </article>

                </div>

            </div>
        </section>

        <section class="about section">
            <div class="container">

                <div class="section__heading">
                <span class="section__subtitle">
                    Подход
                </span>

                    <h2 class="section__title">
                        Как мы работаем с проектами
                    </h2>
                </div>

                <div class="about__content">
                    <p>
                        Перед началом работ анализируются цели проекта, структура
                        будущего или существующего сайта, необходимые функции
                        и требования к дальнейшему сопровождению.
                    </p>

                    <p>
                        Такой подход позволяет выбрать оптимальное решение:
                        разработать сайт с нуля, выполнить точечную доработку
                        или организовать регулярную техническую поддержку.
                    </p>
                </div>

            </div>
        </section>

        <?include $_SERVER['DOCUMENT_ROOT'] . '/include/form.php';?>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>