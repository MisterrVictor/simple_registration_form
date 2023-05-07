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


$username = isset($_POST['username']) ? $_POST['username'] : '';
$username = htmlentities(filter_var($username, FILTER_SANITIZE_STRING));

$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$phone = htmlentities(filter_var($phone, FILTER_SANITIZE_NUMBER_INT));

$email = isset($_POST['email']) ? $_POST['email'] : '';
$email = htmlentities(filter_var($email, FILTER_SANITIZE_EMAIL));

// Добавим пользователя в базу 
$stmt = pdo()->prepare("INSERT INTO `users` (`name`, `password`, `phone`, `email`) "
        . "VALUES (:username, :password, :phone, :email)");
$stmt->execute([
    'username' => $username,
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'phone' => $phone,
    'email' => $email,
]);

header('Location: login.php');
?>
