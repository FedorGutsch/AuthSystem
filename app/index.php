<?php
// Подключение сессии
session_start();

// Подключение конфига БД
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/config/session.php';

// Подключение контроллеров
require_once __DIR__ . '/controllers/AuthController.php';
// require_once __DIR__ . '/controllers/ThemeController.php';

// Роутинг
$action = $_GET['action'] ?? 'home';

// Если пользователь авторизован
$isAuth = isset($_SESSION['user_id']);

// Обработка действий
switch ($action) {
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new AuthController();
            $result = $controller->register($_POST);
            
            if ($result['success']) {
                header('Location: /');
                exit;
            } else {
                $errors = $result['errors'];
            }
        }
        break;
        
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new AuthController();
            $result = $controller->login($_POST);
            
            if ($result['success']) {
                header('Location: /');
                exit;
            } else {
                $errors = $result['errors'];
            }
        }
        break;
        
    case 'logout':
        session_destroy();
        header('Location: /');
        exit;
        
    case 'toggle_theme':
        if ($isAuth) {
            $newTheme = $_SESSION['theme'] === 'light' ? 'dark' : 'light';
            $_SESSION['theme'] = $newTheme;
            
            // Обновляем тему в БД
            $userModel = new User();
            $userModel->updateTheme($_SESSION['user_id'], $newTheme);
            
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'theme' => $newTheme]);
            exit;
        }
        break;
}

// Определение контента
if ($isAuth) {
    ob_start();
    include __DIR__ . '/views/profile/dashboard.php';
    $content = ob_get_clean();
    $title = 'Личный кабинет';
} else {
    ob_start();
    include __DIR__ . '/views/auth/tabs.php';
    $content = ob_get_clean();
    $title = 'Регистрация / Вход';
}

// Подключение общего шаблона
include __DIR__ . '/views/layout.php';