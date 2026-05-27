<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>

    <main class="main">

        <section class="hero">
            <div class="container">
                <div class="hero__wrapper">

                    <div class="hero__content">
                        <span class="hero__subtitle">Услуги</span>

                        <h1 class="hero__title">
                            Поддержка сайтов
                        </h1>

                        <p class="hero__text">
                            Выполняем техническое сопровождение веб-проектов:
                            исправление ошибок, обновление контента, контроль
                            работоспособности форм и развитие существующих разделов.
                        </p>

                        <div class="hero__buttons">
                            <a href="#feedback" class="button">Оставить заявку</a>
                            <a href="/services/" class="button button--border">Все услуги</a>
                        </div>
                    </div>

                    <div class="hero__image">
                        <img src="/assets/img/content/hero.png" alt="Поддержка сайтов">
                    </div>

                </div>
            </div>
        </section>

        <section class="about section">
            <div class="container">

                <div class="section__heading">
                    <span class="section__subtitle">Сопровождение</span>

                    <h2 class="section__title">
                        Стабильная работа веб-ресурса
                    </h2>
                </div>

                <div class="about__content">
                    <p>
                        После запуска сайт требует регулярного контроля и технического
                        сопровождения. Поддержка позволяет своевременно устранять
                        ошибки, обновлять информацию и сохранять корректную работу
                        основных функций веб-ресурса.
                    </p>

                    <p>
                        В рамках сопровождения выполняются работы с контентом,
                        интерфейсом, формами обратной связи, отдельными программными
                        модулями и техническими настройками проекта.
                    </p>
                </div>

            </div>
        </section>

        <section class="services section">
            <div class="container">

                <div class="section__heading">
                    <span class="section__subtitle">Что входит</span>

                    <h2 class="section__title">
                        Основные работы по поддержке
                    </h2>
                </div>

                <div class="services__grid">

                    <div class="service-card">
                        <h3>Исправление ошибок</h3>
                        <p>
                            Анализируем проблемы в работе сайта, находим причины
                            сбоев и вносим необходимые исправления в код проекта.
                        </p>
                    </div>

                    <div class="service-card">
                        <h3>Обновление контента</h3>
                        <p>
                            Помогаем обновлять тексты, изображения, новости,
                            страницы услуг и другие информационные разделы сайта.
                        </p>
                    </div>

                    <div class="service-card">
                        <h3>Контроль работы сайта</h3>
                        <p>
                            Проверяем корректность отображения страниц, работу форм,
                            ссылок, навигации и пользовательских сценариев.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <section class="technologies section">
            <div class="container">

                <div class="section__heading">
                    <span class="section__subtitle">Результат</span>

                    <h2 class="section__title">
                        Что получает заказчик
                    </h2>
                </div>

                <div class="services__grid">

                    <div class="service-card">
                        <h3>Актуальный сайт</h3>
                        <p>
                            Информация на сайте остается свежей, а страницы
                            соответствуют текущим задачам компании.
                        </p>
                    </div>

                    <div class="service-card">
                        <h3>Снижение рисков</h3>
                        <p>
                            Регулярная проверка помогает быстрее находить ошибки
                            и предотвращать проблемы в работе веб-ресурса.
                        </p>
                    </div>

                    <div class="service-card">
                        <h3>Готовность к развитию</h3>
                        <p>
                            Поддерживаемая кодовая база проще расширяется и
                            дорабатывается при появлении новых требований.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <?include $_SERVER['DOCUMENT_ROOT'] . '/include/form.php';?>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>