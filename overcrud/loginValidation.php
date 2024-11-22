<?php
session_start();

//VERIFICAÇÃO DE SUBMIT DO FORM E VARIÁVEIS VAZIAS
if (!empty($_POST['cpf']) && !empty($_POST['senha'])) {
    require_once 'config.php';

    $cpfIndex = $_POST['cpf'];
    $senhaIndex = $_POST['senha'];
    $usuarioIndex = [];

    $sqlVerifUsuCpf = $pdo->query("SELECT * FROM usuarios WHERE `cpf`='$cpfIndex'");

    if ($sqlVerifUsuCpf->rowCount() > 0) {
        $usuarioIndex = $sqlVerifUsuCpf->fetchAll(PDO::FETCH_ASSOC);
        $tipoIndex = $usuarioIndex[0]['tipo'];
        $nomeLogin = $usuarioIndex[0]['nome'];
        $senhaHash = $usuarioIndex[0]['password'];

        if (password_verify($senhaIndex, $senhaHash)) {
            $_SESSION['cpf'] =  $cpfIndex;
            $_SESSION['senha'] = $senhaIndex;
            $_SESSION['tipo'] = $tipoIndex;
            $_SESSION['nome'] = $nomeLogin;
            header("Location: home.php");
            $_SESSION['valido'] = "validado";
        } else {
            unset($_SESSION['cpf']);
            unset($_SESSION['senha']);
            unset($_SESSION['tipo']);
            unset($_SESSION['nome']);
            header("Refresh: 0");
            $_SESSION['valido'] = "erro";
        };
    } else {
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
        unset($_SESSION['tipo']);
        unset($_SESSION['nome']);
        header("Refresh: 0");
        $_SESSION['valido'] = "erro";
    };
} else {
    header('Location: index.php');
};