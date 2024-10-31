<?php
session_start();

//VERIFICAÇÃO DE SUBMIT DO FORM E VARIÁVEIS VAZIAS
if (!empty($_POST['login']) && !empty($_POST['senha'])) {
    require_once 'config.php';

    $loginIndex = $_POST['login'];
    $senhaIndex = $_POST['senha'];

    $sqlVerifUsu = $pdo->query("SELECT * FROM usuarios WHERE `login`='$loginIndex' AND `password`='$senhaIndex'");

    if ($sqlVerifUsu->rowCount() > 0) {
        $_SESSION['login'] =  $loginIndex;
        $_SESSION['senha'] = $senhaIndex;
        header("Location: home.php");
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header("Location: index.php");
    };
} else {
    header('Location: index.php');
};