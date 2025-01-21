<?php
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

    if(strlen($login) < 2 || strlen($login) > 50) {
        echo '$login error';
        exit;
    }
    if(strlen($username) < 4|| strlen($username) > 50) {
        echo '$name error';
        exit;
    }
    if(strlen($email) < 4 || strlen($email) > 70 && !str_contains($email, '@')) {
        echo '$email error';
        exit;
    }
    if(strlen($password) < 4 || strlen($password) > 130) {
        echo '$password error';
        exit;
    }

    $salt = 'dadfgr430_30{d';
    $password = md5($salt.$password); // хэш пароля

    $pdo = new PDO('mysql:host=db;dbname=mydatabase;port=3306', 'myuser', 'mypassword');

    $sql = 'INSERT INTO users(login, username, email, password) VALUES (?, ?, ?, ?)';

    $query = $pdo->prepare($sql);

    $query->execute([$login, $username, $email, $password]);
    var_dump($login, $username, $email, $password);

    header('Location: /');