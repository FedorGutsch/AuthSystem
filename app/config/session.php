<?php
// Проверяем, не запущена ли сессия
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Установка темы по умолчанию, если не установлена
if (!isset($_SESSION['theme'])) {
    $_SESSION['theme'] = 'light';
}