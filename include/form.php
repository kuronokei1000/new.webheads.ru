<section class="feedback section" id="feedback">
    <div class="container">
        <div class="section__heading">
                <span class="section__subtitle">
                    Обратная связь
                </span>
            <h2 class="section__title">
                Оставить заявку
            </h2>
        </div>
        <form action="/ajax/feedback.php" method="POST" class="feedback-form">
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
</section>