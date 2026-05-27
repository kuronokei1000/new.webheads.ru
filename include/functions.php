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

        if ($section === 'services') {
            $stmt = $this->pdo->prepare("
            INSERT INTO services (
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