<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register($data) {
        $errors = $this->validateRegistration($data);
        if (!empty($errors)) {
            return ['success' => false, 'errors' => $errors];
        }

        // Проверка уникальности
        $existingUser = $this->userModel->findByLogin($data['login']);
        if ($existingUser) {
            return ['success' => false, 'errors' => ['Логин или email уже заняты']];
        }

        // Хеширование пароля
        $data['password_hash'] = password_hash($data['password'], PASSWORD_BCRYPT);
        unset($data['password'], $data['password_confirm']);

        // Создание пользователя
        $userId = $this->userModel->create(array_merge($data, ['age_verified' => true, 'theme' => 'light']));

        // Авторизация
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_name'] = $data['firstname'];
        $_SESSION['theme'] = 'light';

        return ['success' => true];
    }

    public function login($data) {
        $user = $this->userModel->findByLogin($data['login']);
        if ($user && password_verify($data['password'], $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['firstname'];
            $_SESSION['theme'] = $user['theme'] ?? 'light';
            return ['success' => true];
        }
        return ['success' => false, 'errors' => ['Неверный логин или пароль']];
    }

    private function validateRegistration($data) {
        $errors = [];

        if (!preg_match('/^[а-яё\-]{2,15}$/iu', $data['firstname'])) {
            $errors[] = 'Имя: 2-15 букв, только кириллица';
        }
        if (!preg_match('/^[а-яё\-]{2,15}$/iu', $data['lastname'])) {
            $errors[] = 'Фамилия: 2-15 букв, только кириллица (дефис разрешён для двойных)';
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Неверный формат email';
        }
        if (strlen($data['login']) < 6) {
            $errors[] = 'Логин должен быть минимум 6 символов';
        }
        if (strlen($data['password']) < 8 || 
            !preg_match('/[a-z]/', $data['password']) || 
            !preg_match('/[A-Z]/', $data['password']) || 
            !preg_match('/\d/', $data['password']) || 
            !preg_match('/[^a-zA-Z0-9]/', $data['password'])) {
            $errors[] = 'Пароль: минимум 8 символов, буквы (заглавные/строчные), цифры и спецсимволы';
        }
        if ($data['password'] !== $data['password_confirm']) {
            $errors[] = 'Пароли не совпадают';
        }
        if (empty($data['rules'])) {
            $errors[] = 'Необходимо принять правила';
        }
        if ($data['age'] !== 'yes') {
            $errors[] = 'Подтвердите, что вам есть 18 лет';
        }
        if (!in_array($data['gender'], ['male', 'female'])) {
            $errors[] = 'Выберите пол';
        }

        return $errors;
    }
}