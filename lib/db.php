<?php
$pdo = new PDO('mysql:host=db;dbname=mydatabase;port=3306', 'myuser', 'mypassword');
return $pdo;