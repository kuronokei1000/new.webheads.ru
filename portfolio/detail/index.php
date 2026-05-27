<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';

$site = new Site();

$url = $_GET['url'] ?? '';
$project = null;

if ($url !== '') {
    $project = $site->getPortfolioByUrl($url);
}

if (!$project) {
    http_response_code(404);
}
?>

    <main class="main">

        <section class="section">
            <div class="container">

                <?php if ($project): ?>

                    <article class="news-detail">

                        <a href="/portfolio/" class="news-detail__back">
                            ← Все проекты
                        </a>

                        <div class="section__heading">
                        <span class="section__subtitle">
                            Портфолио
                        </span>

                            <h1 class="section__title">
                                <?= htmlspecialchars($project['title']) ?>
                            </h1>
                        </div>

                        <?php if (!empty($project['technologies'])): ?>
                            <div class="portfolio-detail__tags">
                                <?= htmlspecialchars($project['technologies']) ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($project['image'])): ?>
                            <img
                                src="<?= htmlspecialchars($project['image']) ?>"
                                alt="<?= htmlspecialchars($project['title']) ?>"
                                class="news-detail__image"
                            >
                        <?php endif; ?>

                        <div class="news-detail__content">
                            <?= $project['detail_text'] ?>
                        </div>

                        <?php if (!empty($project['project_url'])): ?>
                            <a
                                href="<?= htmlspecialchars($project['project_url']) ?>"
                                class="button"
                                target="_blank"
                            >
                                Перейти на сайт
                            </a>
                        <?php endif; ?>

                    </article>

                <?php else: ?>

                    <div class="section__heading">
                    <span class="section__subtitle">
                        Ошибка 404
                    </span>

                        <h1 class="section__title">
                            Проект не найден
                        </h1>
                    </div>

                    <p class="empty-text">
                        Запрашиваемый проект отсутствует или был удален.
                    </p>

                    <br>

                    <a href="/portfolio/" class="button">
                        Вернуться к портфолио
                    </a>

                <?php endif; ?>

            </div>
        </section>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>