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
                            разработки, поддержки или доработки вашего проекта.
                        </p>

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