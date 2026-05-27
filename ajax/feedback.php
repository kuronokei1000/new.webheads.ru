<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/functions.php';

header('Content-Type: application/json; charset=UTF-8');

$site = new Site();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Метод не разрешен',
    ]);
    exit;
}

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');
$captchaToken = $_POST['smart-token'] ?? '';

if ($name === '' || $phone === '' || $message === '') {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Заполните обязательные поля',
    ]);
    exit;
}

if (!$site->checkCaptcha($captchaToken)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Проверка капчи не пройдена',
    ]);
    exit;
}

$data = [
    'name' => $name,
    'phone' => $phone,
    'email' => $email,
    'message' => $message,
];

try {
    $site->addFeedback($data);
    $site->sendFeedbackEmail($data);

    echo json_encode([
        'success' => true,
        'message' => 'Спасибо! Заявка успешно отправлена.',
    ]);
} catch (Throwable $e) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Ошибка отправки заявки',
    ]);
}