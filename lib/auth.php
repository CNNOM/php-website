<?php

$login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

if(strlen($login) < 2 || strlen($login) > 50) {
    echo '$login error';
    exit;
}
if(strlen($password) < 4 || strlen($password) > 130) {
    echo '$password error';
    exit;
}

$salt = 'dadfgr430_30{d';
$password = md5($salt.$password); // хэш пароля

$pdo = require "db.php";

$sql = "SELECT id FROM users WHERE login = ? AND password = ?";
$query = $pdo -> prepare($sql);
$query -> execute([$login, $password]);

if($query->rowCount() == 0) {
    echo 'rowCount == 0';
}
else {
    setcookie("login", $login, time() + 3600 * 60 * 30, "/"); // куки хранятся 30 дней
    header('Location: /user.php');
}



