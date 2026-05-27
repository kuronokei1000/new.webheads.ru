<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>

    <main class="main">

        <section class="hero">
            <div class="container">
                <div class="hero__wrapper">

                    <div class="hero__content">
                        <span class="hero__subtitle">Услуги</span>

                        <h1 class="hero__title">
                            Разработка сайтов
                        </h1>

                        <p class="hero__text">
                            Создаем современные корпоративные сайты, интернет-магазины
                            и веб-сервисы с удобной структурой, адаптивной версткой
                            и возможностью дальнейшего развития.
                        </p>

                        <div class="hero__buttons">
                            <a href="#feedback" class="button">Оставить заявку</a>
                            <a href="/portfolio/" class="button button--border">Смотреть проекты</a>
                        </div>
                    </div>

                    <div class="hero__image">
                        <img src="/assets/img/content/hero.png" alt="Разработка сайтов">
                    </div>

                </div>
            </div>
        </section>

        <section class="about section">
            <div class="container">

                <div class="section__heading">
                    <span class="section__subtitle">Разработка</span>

                    <h2 class="section__title">
                        Сайты под задачи бизнеса
                    </h2>
                </div>

                <div class="about__content">
                    <p>
                        Разработка сайта начинается с определения целей проекта,
                        структуры будущего веб-ресурса и набора необходимых функций.
                        Такой подход позволяет создать сайт, который не только
                        выглядит современно, но и решает конкретные задачи компании.
                    </p>

                    <p>
                        В процессе работы выполняется верстка страниц, настройка
                        интерфейсных элементов, подключение базы данных, разработка
                        форм обратной связи и подготовка проекта к размещению
                        на сервере.
                    </p>
                </div>

            </div>
        </section>

        <section class="services section">
            <div class="container">

                <div class="section__heading">
                    <span class="section__subtitle">Что входит</span>

                    <h2 class="section__title">
                        Основные этапы разработки
                    </h2>
                </div>

                <div class="services__grid">

                    <div class="service-card">
                        <h3>Проектирование структуры</h3>
                        <p>
                            Определяем основные разделы сайта, логику переходов,
                            структуру страниц и состав функциональных блоков.
                        </p>
                    </div>

                    <div class="service-card">
                        <h3>Верстка интерфейса</h3>
                        <p>
                            Создаем адаптивные страницы, которые корректно
                            отображаются на компьютерах, планшетах и смартфонах.
                        </p>
                    </div>

                    <div class="service-card">
                        <h3>Программирование</h3>
                        <p>
                            Подключаем динамический функционал, интеграции со сторонними ресурсами,
                            настраиваем почту и поисковые системы.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <section class="technologies section">
            <div class="container">

                <div class="section__heading">
                    <span class="section__subtitle">Технологии</span>

                    <h2 class="section__title">
                        Используемый стек
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

        <?include $_SERVER['DOCUMENT_ROOT'] . '/include/form.php';?>
    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>