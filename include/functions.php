<?php

class Site
{
    private PDO $pdo;

    public function __construct(?PDO $pdo = null)
    {
        if ($pdo) {
            $this->pdo = $pdo;
            return;
        }

        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function renderCaptcha(): string
    {
        $config = require $_SERVER['DOCUMENT_ROOT'] . '/include/config.php';

        return '
        <div
            class="smart-captcha"
            data-sitekey="' . htmlspecialchars($config['yandex_captcha_client_key']) . '"
            style="height: 100px"
        ></div>
    ';
    }

    public function checkCaptcha(string $token): bool
    {
        $config = require $_SERVER['DOCUMENT_ROOT'] . '/include/config.php';

        if ($token === '') {
            return false;
        }

        $ch = curl_init('https://smartcaptcha.cloud.yandex.ru/validate');

        $args = [
            'secret' => $config['yandex_captcha_server_key'],
            'token' => $token,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
        ];

        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($args));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($httpCode !== 200 || !$response) {
            return false;
        }

        $result = json_decode($response, true);

        return isset($result['status']) && $result['status'] === 'ok';
    }

    public function addFeedback(array $data): void
    {
        $stmt = $this->pdo->prepare("
        INSERT INTO feedback (
            name,
            phone,
            email,
            message
        ) VALUES (
            :name,
            :phone,
            :email,
            :message
        )
    ");

        $stmt->execute([
            'name' => trim($data['name'] ?? ''),
            'phone' => trim($data['phone'] ?? ''),
            'email' => trim($data['email'] ?? ''),
            'message' => trim($data['message'] ?? ''),
        ]);
    }

    public function sendFeedbackEmail(array $data): bool
    {
        $config = require $_SERVER['DOCUMENT_ROOT'] . '/include/config.php';

        $to = $config['feedback_email'];
        $subject = 'Новая заявка с сайта WEBHEADS';

        $message = "Новая заявка с сайта\n\n";
        $message .= "Имя: " . trim($data['name'] ?? '') . "\n";
        $message .= "Телефон: " . trim($data['phone'] ?? '') . "\n";
        $message .= "E-mail: " . trim($data['email'] ?? '') . "\n";
        $message .= "Сообщение:\n" . trim($data['message'] ?? '') . "\n";

        $headers = [
            'From: WEBHEADS <no-reply@webheads.ru>',
            'Content-Type: text/plain; charset=UTF-8',
        ];

        return mail($to, $subject, $message, implode("\r\n", $headers));
    }

    public function getNewsList(int $limit = 0): array
    {
        $sql = "
            SELECT id, title, url, preview_text, image, views, created_at
            FROM news
            ORDER BY created_at DESC
        ";

        if ($limit > 0) {
            $sql .= " LIMIT " . (int)$limit;
        }

        return $this->pdo->query($sql)->fetchAll();
    }

    public function getNewsByUrl(string $url): ?array
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM news
            WHERE url = :url
            LIMIT 1
        ");

        $stmt->execute(['url' => $url]);
        $result = $stmt->fetch();

        return $result ?: null;
    }

    public function increaseNewsViews(int $id): void
    {
        $stmt = $this->pdo->prepare("
            UPDATE news
            SET views = views + 1
            WHERE id = :id
        ");

        $stmt->execute(['id' => $id]);
    }

    public function getPortfolioList(int $limit = 0): array
    {
        $sql = "
        SELECT
            id,
            title,
            url,
            preview_text,
            technologies,
            image,
            project_url,
            created_at
        FROM portfolio
        ORDER BY created_at DESC
    ";

        if ($limit > 0) {
            $sql .= " LIMIT " . (int)$limit;
        }

        return $this->pdo->query($sql)->fetchAll();
    }

    public function getPortfolioByUrl(string $url): ?array
    {
        $stmt = $this->pdo->prepare("
        SELECT *
        FROM portfolio
        WHERE url = :url
        LIMIT 1
    ");

        $stmt->execute([
            'url' => $url,
        ]);

        $result = $stmt->fetch();

        return $result ?: null;
    }

    public function createSlug(string $text): string
    {
        $text = mb_strtolower(trim($text));

        $replace = [
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        ];

        $text = strtr($text, $replace);
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        $text = trim($text, '-');

        return $text ?: 'material-' . time();
    }

    public function uploadImage(array $file): ?string
    {
        if (empty($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowed, true)) {
            return null;
        }

        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/upload/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileName = uniqid('img_', true) . '.' . $extension;
        $path = $uploadDir . $fileName;

        if (!move_uploaded_file($file['tmp_name'], $path)) {
            return null;
        }

        return '/assets/img/upload/' . $fileName;
    }

    public function addMaterial(string $section, array $data): void
    {
        $title = trim($data['title'] ?? '');
        $url = trim($data['url'] ?? '') ?: $this->createSlug($title);
        $previewText = trim($data['preview_text'] ?? '');
        $detailText = trim($data['detail_text'] ?? '');
        $image = $data['image'] ?? null;
        $projectUrl = trim($data['project_url'] ?? '');

        if ($title === '' || $detailText === '') {
            throw new InvalidArgumentException('Название и полный текст обязательны для заполнения');
        }

        if ($section === 'news') {
            $stmt = $this->pdo->prepare("
            INSERT INTO news (
                title,
                url,
                preview_text,
                detail_text,
                image
            ) VALUES (
                :title,
                :url,
                :preview_text,
                :detail_text,
                :image
            )
        ");

            $stmt->execute([
                'title' => $title,
                'url' => $url,
                'preview_text' => $previewText,
                'detail_text' => $detailText,
                'image' => $image,
            ]);

            return;
        }

        if ($section === 'portfolio') {
            $stmt = $this->pdo->prepare("
            INSERT INTO portfolio (
                title,
                url,
                preview_text,
                detail_text,
                image,
                project_url
            ) VALUES (
                :title,
                :url,
                :preview_text,
                :detail_text,
                :image,
                :project_url
            )
        ");

            $stmt->execute([
                'title' => $title,
                'url' => $url,
                'preview_text' => $previewText,
                'detail_text' => $detailText,
                'image' => $image,
                'project_url' => $projectUrl ?: null,
            ]);

            return;
        }

        throw new InvalidArgumentException('Неизвестный раздел');
    }
}