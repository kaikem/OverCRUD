<?php
session_start();

//VERIFICAÇÃO DE SUBMIT DO FORM E VARIÁVEIS VAZIAS
if (!empty($_POST['login']) && !empty($_POST['senha'])) {
    require_once 'config.php';

    $loginIndex = $_POST['login'];
    $senhaIndex = $_POST['senha'];
    $usuarioIndex = [];

    $sqlVerifUsu = $pdo->query("SELECT * FROM usuarios WHERE `login`='$loginIndex' AND `password`='$senhaIndex'");

    if ($sqlVerifUsu->rowCount() > 0) {
        $usuarioIndex = $sqlVerifUsu->fetchAll(PDO::FETCH_ASSOC);
        $tipoIndex = $usuarioIndex[0]['tipo'];

        $_SESSION['login'] =  $loginIndex;
        $_SESSION['senha'] = $senhaIndex;
        $_SESSION['tipo'] = $tipoIndex;
        header("Location: home.php");
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        echo "<script>alert('Usuário/Senha inválidos! Tente novamente.')</script>";
        header("Refresh: 0");
    };
} else {
    header('Location: index.php');
};