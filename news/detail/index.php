<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';

$site = new Site();

$url = $_GET['url'] ?? '';
$newsItem = null;

if ($url !== '') {
    $newsItem = $site->getNewsByUrl($url);
}

if (!$newsItem) {
    http_response_code(404);
}

if ($newsItem) {
    $site->increaseNewsViews((int)$newsItem['id']);
    $newsItem['views']++;
}
?>

    <main class="main">

        <section class="section">
            <div class="container">

                <?php if ($newsItem): ?>

                    <article class="news-detail">

                        <a href="/news/" class="news-detail__back">
                            ← Все новости
                        </a>

                        <div class="section__heading">
                        <span class="section__subtitle">
                            Новости
                        </span>

                            <h1 class="section__title">
                                <?= htmlspecialchars($newsItem['title']) ?>
                            </h1>
                        </div>

                        <div class="news-card__meta">
                            <time class="news-card__date">
                                <?= date('d.m.Y', strtotime($newsItem['created_at'])) ?>
                            </time>

                            <span class="news-card__views">
                            Просмотров: <?= (int)$newsItem['views'] ?>
                        </span>
                        </div>

                        <?php if (!empty($newsItem['image'])): ?>
                            <img
                                src="<?= htmlspecialchars($newsItem['image']) ?>"
                                alt="<?= htmlspecialchars($newsItem['title']) ?>"
                                class="news-detail__image"
                            >
                        <?php endif; ?>

                        <div class="news-detail__content">
                            <?= $newsItem['detail_text'] ?>
                        </div>

                    </article>

                <?php else: ?>

                    <div class="section__heading">
                    <span class="section__subtitle">
                        Ошибка 404
                    </span>

                        <h1 class="section__title">
                            Новость не найдена
                        </h1>
                    </div>

                    <p class="empty-text">
                        Запрашиваемая новость отсутствует или была удалена.
                    </p>

                    <br>

                    <a href="/news/" class="button">
                        Вернуться к новостям
                    </a>

                <?php endif; ?>

            </div>
        </section>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>