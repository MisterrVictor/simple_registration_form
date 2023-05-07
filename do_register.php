<?php

require_once __DIR__ . '/boot.php';

// Проверим, не занято ли имя пользователя
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `name` = :username");
$stmt->execute(['username' => $_POST['username']]);
if ($stmt->rowCount() > 0) {
    flash('Это имя пользователя уже занято.');
    header('Location: index.php'); // Возврат на форму регистрации
    die; // Остановка выполнения скрипта
}

// Добавим пользователя в базу
$stmt = pdo()->prepare("INSERT INTO `users` (`name`, `password`, `phone`, `email`) "
        . "VALUES (:username, :password, :phone, :email)");
$stmt->execute([
    'username' => $_POST['username'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'phone' => $_POST['phone'],
    'email' => $_POST['email'],
]);

header('Location: login.php');
