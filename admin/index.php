<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/functions.php';

$config = require $_SERVER['DOCUMENT_ROOT'] . '/include/config.php';

$site = new Site();

$error = '';
$success = '';

if (isset($_GET['logout'])) {
    unset($_SESSION['admin_auth']);
    header('Location: /admin/');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_form'])) {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    if (
        $login === $config['admin_login'] &&
        password_verify($password, $config['admin_password'])
    ) {
        $_SESSION['admin_auth'] = true;
        header('Location: /admin/');
        exit;
    }

    $error = 'Неверный логин или пароль';
}

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['material_form'])
    && !empty($_SESSION['admin_auth'])
) {
    $section = $_POST['section'] ?? '';
    $image = $site->uploadImage($_FILES['image'] ?? []);

    try {
        $site->addMaterial($section, [
            'title' => $_POST['title'] ?? '',
            'url' => $_POST['url'] ?? '',
            'preview_text' => $_POST['preview_text'] ?? '',
            'detail_text' => $_POST['detail_text'] ?? '',
            'project_url' => $_POST['project_url'] ?? '',
            'image' => $image,
        ]);

        $success = 'Материал успешно добавлен';
    } catch (Throwable $e) {
        $error = 'Ошибка добавления материала: ' . $e->getMessage();
    }
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
?>

    <main class="main">
        <section class="section">
            <div class="container">

                <div class="section__heading">
                <span class="section__subtitle">
                    Администрирование
                </span>

                    <h1 class="section__title">
                        Управление материалами сайта
                    </h1>
                </div>

                <?php if ($error): ?>
                    <p class="admin-message admin-message--error">
                        <?= htmlspecialchars($error) ?>
                    </p>
                <?php endif; ?>

                <?php if ($success): ?>
                    <p class="admin-message admin-message--success">
                        <?= htmlspecialchars($success) ?>
                    </p>
                <?php endif; ?>

                <?php if (empty($_SESSION['admin_auth'])): ?>

                    <form method="POST" class="feedback-form admin-form">
                        <input type="hidden" name="login_form" value="1">

                        <input type="text" name="login" placeholder="Логин" required>
                        <input type="password" name="password" placeholder="Пароль" required>

                        <button type="submit">
                            Войти
                        </button>
                    </form>

                <?php else: ?>

                    <div class="admin-panel">

                        <a href="/admin/?logout=1" class="admin-logout">
                            Выйти
                        </a>

                        <form method="POST" enctype="multipart/form-data" class="feedback-form admin-form">
                            <input type="hidden" name="material_form" value="1">

                            <select name="section" required>
                                <option value="">Выберите раздел</option>
                                <option value="news">Новости</option>
                                <option value="services">Услуги</option>
                                <option value="portfolio">Портфолио</option>
                            </select>

                            <input type="text" name="title" placeholder="Название материала" required>

                            <input
                                type="text"
                                name="url"
                                placeholder="URL материала, например: new-site-launch"
                            >

                            <input
                                type="text"
                                name="project_url"
                                placeholder="Ссылка на проект, только для портфолио"
                            >

                            <textarea
                                name="preview_text"
                                placeholder="Краткое описание"
                                required
                            ></textarea>

                            <textarea
                                name="detail_text"
                                class="js-editor"
                                placeholder="Полный текст материала"
                            ></textarea>

                            <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp">

                            <button type="submit">
                                Добавить материал
                            </button>
                        </form>

                    </div>

                <?php endif; ?>

            </div>
        </section>
    </main>

<?php if (!empty($_SESSION['admin_auth'])): ?>
    <script src="https://cdn.tiny.cloud/1/1mgt6u1kzkpvdyt4megz88txn9yvseg1eznmnqk8f4fe0ei8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '.js-editor',
            height: 360,
            menubar: false,
            plugins: 'lists link table code',
            toolbar: 'undo redo | bold italic | bullist numlist | link table | code',
            language: 'ru',
            setup: function (editor) {
                editor.on('change keyup', function () {
                    tinymce.triggerSave();
                });
            }
        });

        document.addEventListener('submit', function () {
            tinymce.triggerSave();
        });
    </script>
<?php endif; ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>