<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">

            <div class="footer__info">
                <a href="/" class="footer__logo">WEBHEADS</a>

                <p class="footer__description">
                    Разработка, поддержка и доработка корпоративных сайтов
                    и интернет-магазинов.
                </p>
            </div>

            <div class="footer__nav">
                <h3>Навигация</h3>

                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/about/">О компании</a></li>
                    <li><a href="/services/">Услуги</a></li>
                    <li><a href="/portfolio/">Портфолио</a></li>
                    <li><a href="/technologies/">Технологии</a></li>
                    <li><a href="/news/">Новости</a></li>
                    <li><a href="/contacts/">Контакты</a></li>
                </ul>
            </div>

            <div class="footer__contacts">
                <h3>Контакты</h3>

                <ul>
                    <li>
                        Email:
                        <a href="mailto:a@webheads.ru">a@webheads.ru</a>
                    </li>

                    <li>
                        Телефон:
                        <a href="tel:+79058030638">+7 (905) 803-06-38</a>
                    </li>

                    <li>
                        Telegram:
                        <a href="https://t.me/fomdim" target="_blank">@fomdim</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="footer__bottom">
            <p>
                © <?= date('Y'); ?> ИП Фоминых Д.Е. Все права защищены.
            </p>
        </div>
    </div>
</footer>

<script src="/assets/js/main.js"></script>
<script src="/assets/js/form.js"></script>
<div class="popup" id="feedback-popup">
    <div class="popup__overlay js-close-feedback"></div>

    <div class="popup__content">
        <button type="button" class="popup__close js-close-feedback">
            ×
        </button>

        <div class="popup__heading">
            <span class="section__subtitle">
                Обратная связь
            </span>

            <h2>
                Оставить заявку
            </h2>
        </div>

        <form action="/ajax/feedback.php" method="POST" class="feedback-form popup__form">
            <input type="text" name="name" placeholder="Ваше имя" required>
            <input type="tel" name="phone" placeholder="Телефон" required>
            <input type="email" name="email" placeholder="E-mail">
            <textarea name="message" placeholder="Описание проекта" required></textarea>

            <?php $site = $site ?? new Site(); ?>
            <?= $site->renderCaptcha(); ?>

            <button type="submit">
                Отправить заявку
            </button>
        </form>
    </div>
</div>
</body>
</html>