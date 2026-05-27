<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>

    <main class="main">

        <section class="hero">
            <div class="container">
                <div class="hero__wrapper">

                    <div class="hero__content">
                    <span class="hero__subtitle">
                        Технологии
                    </span>

                        <h1 class="hero__title">
                            Технологии разработки WEBHEADS
                        </h1>

                        <p class="hero__text">
                            Для создания веб-проектов используются современные
                            и надежные технологии, позволяющие разрабатывать
                            адаптивные, удобные и расширяемые сайты.
                        </p>

                        <div class="hero__buttons">
                            <a href="#technologies-list" class="button">
                                Смотреть технологии
                            </a>

                            <a href="#feedback" class="button button--border">
                                Оставить заявку
                            </a>
                        </div>
                    </div>

                    <div class="hero__image">
                        <img src="/assets/img/content/hero.png" alt="Технологии WEBHEADS">
                    </div>

                </div>
            </div>
        </section>

        <section class="technologies section" id="technologies-list">
            <div class="container">

                <div class="section__heading">
                <span class="section__subtitle">
                    Стек
                </span>

                    <h2 class="section__title">
                        Основные технологии проекта
                    </h2>
                </div>

                <div class="services__grid">

                    <article class="service-card">
                        <h3>PHP</h3>
                        <p>
                            Используется для разработки серверной части сайта,
                            обработки форм, подключения базы данных и формирования
                            динамических страниц.
                        </p>
                    </article>

                    <article class="service-card">
                        <h3>MySQL</h3>
                        <p>
                            Применяется для хранения данных сайта: заявок
                            пользователей, новостей, услуг и проектов портфолио.
                        </p>
                    </article>

                    <article class="service-card">
                        <h3>PDO</h3>
                        <p>
                            Используется для безопасного взаимодействия PHP-приложения
                            с базой данных и выполнения SQL-запросов.
                        </p>
                    </article>

                    <article class="service-card">
                        <h3>HTML5</h3>
                        <p>
                            Применяется для создания структуры страниц, разметки
                            контентных блоков, форм и навигационных элементов сайта.
                        </p>
                    </article>

                    <article class="service-card">
                        <h3>CSS3</h3>
                        <p>
                            Используется для оформления интерфейса, адаптивной верстки,
                            работы с цветовой схемой, отступами и визуальными блоками.
                        </p>
                    </article>

                    <article class="service-card">
                        <h3>JavaScript</h3>
                        <p>
                            Применяется для реализации интерактивных элементов,
                            улучшения пользовательского опыта и работы с формами.
                        </p>
                    </article>

                </div>

            </div>
        </section>

        <section class="about section">
            <div class="container">

                <div class="section__heading">
                <span class="section__subtitle">
                    Архитектура
                </span>

                    <h2 class="section__title">
                        Как организована техническая часть сайта
                    </h2>
                </div>

                <div class="about__content">
                    <p>
                        Проект построен на PHP без использования сторонних фреймворков.
                        Общие элементы сайта, такие как шапка, подвал, подключение
                        к базе данных и вспомогательные функции, вынесены в отдельные
                        файлы для удобства сопровождения.
                    </p>

                    <p>
                        Для хранения информации используется база данных MySQL.
                        Работа с базой данных организована через отдельный PHP-класс,
                        что позволяет централизованно управлять подключением,
                        создавать необходимые таблицы и выполнять запросы к данным.
                    </p>
                </div>

            </div>
        </section>

        <section class="services section">
            <div class="container">

                <div class="section__heading">
                <span class="section__subtitle">
                    Инструменты
                </span>

                    <h2 class="section__title">
                        Дополнительные средства разработки
                    </h2>
                </div>

                <div class="services__grid">

                    <article class="service-card">
                        <h3>Git</h3>
                        <p>
                            Используется для контроля версий проекта, фиксации этапов
                            разработки и возможности возврата к предыдущим версиям
                            кодовой базы.
                        </p>
                    </article>

                    <article class="service-card">
                        <h3>GitHub</h3>
                        <p>
                            Применяется для хранения удаленной копии проекта,
                            документирования изменений и организации дальнейшей
                            совместной работы над кодом.
                        </p>
                    </article>

                    <article class="service-card">
                        <h3>TinyMCE</h3>
                        <p>
                            Используется в административной части сайта для удобного
                            добавления и форматирования текстовых материалов.
                        </p>
                    </article>

                </div>

            </div>
        </section>

        <section class="technologies section">
            <div class="container">

                <div class="section__heading">
                <span class="section__subtitle">
                    Кратко
                </span>

                    <h2 class="section__title">
                        Используемый стек
                    </h2>
                </div>

                <div class="technologies__list">
                    <span>PHP</span>
                    <span>MySQL</span>
                    <span>PDO</span>
                    <span>HTML5</span>
                    <span>CSS3</span>
                    <span>JavaScript</span>
                    <span>Git</span>
                    <span>GitHub</span>
                    <span>TinyMCE</span>
                </div>

            </div>
        </section>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>