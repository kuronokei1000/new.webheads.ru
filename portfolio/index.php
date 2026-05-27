<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';

$site = new Site();
$portfolioList = $site->getPortfolioList();
?>

    <main class="main">

        <section class="section">
            <div class="container">

                <div class="section__heading">
                <span class="section__subtitle">
                    Портфолио
                </span>

                    <h1 class="section__title">
                        Реализованные проекты
                    </h1>
                </div>

                <?php if (!empty($portfolioList)): ?>

                    <div class="portfolio__grid">

                        <?php foreach ($portfolioList as $project): ?>

                            <article class="portfolio-card">

                                <?php if (!empty($project['image'])): ?>
                                    <a href="/portfolio/<?= htmlspecialchars($project['url']) ?>/">
                                        <img
                                            src="<?= htmlspecialchars($project['image']) ?>"
                                            alt="<?= htmlspecialchars($project['title']) ?>"
                                        >
                                    </a>
                                <?php endif; ?>

                                <div class="portfolio-card__content">

                                    <h2>
                                        <a href="/portfolio/<?= htmlspecialchars($project['url']) ?>/">
                                            <?= htmlspecialchars($project['title']) ?>
                                        </a>
                                    </h2>

                                    <?php if (!empty($project['preview_text'])): ?>
                                        <p>
                                            <?= htmlspecialchars($project['preview_text']) ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($project['technologies'])): ?>
                                        <div class="portfolio-card__tags">
                                            <?= htmlspecialchars($project['technologies']) ?>
                                        </div>
                                    <?php endif; ?>

                                    <a
                                        href="/portfolio/<?= htmlspecialchars($project['url']) ?>/"
                                        class="service-card__link"
                                    >
                                        Подробнее
                                    </a>

                                </div>

                            </article>

                        <?php endforeach; ?>

                    </div>

                <?php else: ?>

                    <p class="empty-text">
                        Проекты пока не добавлены.
                    </p>

                <?php endif; ?>

            </div>
        </section>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>