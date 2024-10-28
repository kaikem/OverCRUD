<?php
$db_name = 'phppdo';
$db_host = 'localhost:3307';
$db_user = 'root';
$db_password = 'admin123';

$pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
