<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';

$site = new Site();
$newsList = $site->getNewsList();
?>

    <main class="main">

        <section class="section">
            <div class="container">

                <div class="section__heading">
                <span class="section__subtitle">
                    Новости
                </span>

                    <h1 class="section__title">
                        Новости компании
                    </h1>
                </div>

                <?php if (!empty($newsList)): ?>

                    <div class="news__grid">

                        <?php foreach ($newsList as $news): ?>

                            <article class="news-card">

                                <?php if (!empty($news['image'])): ?>
                                    <a href="/news/<?= htmlspecialchars($news['url']) ?>/" class="news-card__image">
                                        <img
                                            src="<?= htmlspecialchars($news['image']) ?>"
                                            alt="<?= htmlspecialchars($news['title']) ?>"
                                        >
                                    </a>
                                <?php endif; ?>

                                <div class="news-card__content">

                                    <div class="news-card__meta">
                                        <time class="news-card__date">
                                            <?= date('d.m.Y', strtotime($news['created_at'])) ?>
                                        </time>

                                        <span class="news-card__views">
                                        Просмотров: <?= (int)$news['views'] ?>
                                    </span>
                                    </div>

                                    <h2 class="news-card__title">
                                        <a href="/news/<?= htmlspecialchars($news['url']) ?>/">
                                            <?= htmlspecialchars($news['title']) ?>
                                        </a>
                                    </h2>

                                    <?php if (!empty($news['preview_text'])): ?>
                                        <p class="news-card__text">
                                            <?= htmlspecialchars($news['preview_text']) ?>
                                        </p>
                                    <?php endif; ?>

                                    <a href="/news/<?= htmlspecialchars($news['url']) ?>/" class="news-card__link">
                                        Читать подробнее
                                    </a>

                                </div>

                            </article>

                        <?php endforeach; ?>

                    </div>

                <?php else: ?>

                    <p class="empty-text">
                        Новости пока не добавлены.
                    </p>

                <?php endif; ?>

            </div>
        </section>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>