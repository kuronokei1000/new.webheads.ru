<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>

    <main class="main">

        <section class="hero">
            <div class="container">
                <div class="hero__wrapper">

                    <div class="hero__content">
                        <span class="hero__subtitle">Услуги</span>

                        <h1 class="hero__title">
                            Доработка функционала
                        </h1>

                        <p class="hero__text">
                            Расширяем возможности существующих сайтов: добавляем
                            новые разделы, формы, элементы интерфейса, интеграции
                            и функции, необходимые для развития проекта.
                        </p>

                        <div class="hero__buttons">
                            <a href="#feedback" class="button">Оставить заявку</a>
                            <a href="/services/" class="button button--border">Все услуги</a>
                        </div>
                    </div>

                    <div class="hero__image">
                        <img src="/assets/img/content/hero.png" alt="Доработка функционала">
                    </div>

                </div>
            </div>
        </section>

        <section class="about section">
            <div class="container">

                <div class="section__heading">
                    <span class="section__subtitle">Развитие проекта</span>

                    <h2 class="section__title">
                        Новые возможности для действующего сайта
                    </h2>
                </div>

                <div class="about__content">
                    <p>
                        Со временем у бизнеса появляются новые задачи, которые
                        требуют расширения функционала сайта. Это может быть
                        добавление новых разделов, изменение логики работы форм,
                        подключение базы данных или улучшение пользовательского
                        интерфейса.
                    </p>

                    <p>
                        Доработка позволяет развивать существующий веб-ресурс без
                        полной переработки проекта. Такой подход помогает сохранить
                        уже работающую структуру сайта и постепенно добавлять
                        необходимые функции.
                    </p>
                </div>

            </div>
        </section>

        <section class="services section">
            <div class="container">

                <div class="section__heading">
                    <span class="section__subtitle">Возможности</span>

                    <h2 class="section__title">
                        Какие доработки можно выполнить
                    </h2>
                </div>

                <div class="services__grid">

                    <div class="service-card">
                        <h3>Новые разделы</h3>
                        <p>
                            Добавляем страницы услуг, новости, портфолио,
                            информационные блоки и другие разделы под задачи сайта.
                        </p>
                    </div>

                    <div class="service-card">
                        <h3>Формы и заявки</h3>
                        <p>
                            Реализуем формы обратной связи, обработку данных,
                            сохранение заявок и отправку информации администратору.
                        </p>
                    </div>

                    <div class="service-card">
                        <h3>Работа с базой данных</h3>
                        <p>
                            Подключаем хранение материалов, заявок, новостей,
                            проектов портфолио и других динамических данных.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <section class="technologies section">
            <div class="container">

                <div class="section__heading">
                    <span class="section__subtitle">Подход</span>

                    <h2 class="section__title">
                        Как выполняется доработка
                    </h2>
                </div>

                <div class="about__content">
                    <p>
                        Перед началом работ анализируется текущая структура сайта,
                        существующий код и требования к новому функционалу. Это
                        позволяет выбрать способ реализации, который не нарушит
                        работу уже действующих разделов.
                    </p>

                    <p>
                        После согласования задачи выполняется разработка, проверка
                        корректности работы и тестирование на разных устройствах.
                        При необходимости изменения внедряются поэтапно.
                    </p>
                </div>

            </div>
        </section>
        <?include $_SERVER['DOCUMENT_ROOT'] . '/include/form.php';?>
    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>