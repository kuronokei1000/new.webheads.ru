<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>

    <main class="main">

        <section class="contacts-page">
            <div class="container">

                <div class="contacts-page__wrapper">

                    <div class="contacts-page__content">

                    <span class="section__subtitle">
                        Контакты
                    </span>

                        <h1 class="contacts-page__title">
                            Свяжитесь с нами
                        </h1>

                        <p class="contacts-page__text">
                            Оставьте заявку, и мы свяжемся с вами для обсуждения
                            разработки, поддержки или доработки веб-проекта.
                        </p>

                        <div class="contacts-page__items">

                            <div class="contacts-page__item">
                                <span>Email</span>
                                <a href="mailto:a@webheads.ru">
                                    a@webheads.ru
                                </a>
                            </div>

                            <div class="contacts-page__item">
                                <span>Телефон</span>
                                <a href="tel:+79058030638">
                                    +7 (905) 803-06-38
                                </a>
                            </div>

                            <div class="contacts-page__item">
                                <span>Telegram</span>
                                <a href="https://t.me/fomdim" target="_blank">
                                    @fomdim
                                </a>
                            </div>

                        </div>

                    </div>

                    <form action="/ajax/feedback.php" method="POST" class="feedback-form contacts-page__form">
                        <input type="text" name="name" placeholder="Ваше имя" required>
                        <input type="tel" name="phone" placeholder="Телефон" required>
                        <input type="email" name="email" placeholder="E-mail" required>
                        <textarea name="message" placeholder="Описание проекта" required></textarea>

                        <button type="submit">
                            Отправить заявку
                        </button>
                    </form>

                </div>

            </div>
        </section>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>