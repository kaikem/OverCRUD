<?php
session_start();
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
require_once "$root/OverCRUD-main/overcrud/resources/pathing.php";

//VERIFICAÇÃO DE SUBMIT DO FORM E VARIÁVEIS VAZIAS
if (!empty($_POST['cpf']) && !empty($_POST['senha'])) {
    require_once "$root/OverCRUD-main/overcrud/components/ConexaoBD.php";

    $cpfIndex = $_POST['cpf'];
    $senhaIndex = $_POST['senha'];
    $usuarioIndex = [];

    $sqlVerifUsuCpf = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios WHERE `cpf`='$cpfIndex'");

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
            $_SESSION['valido'] = "validado";
            header("Location: ../home.php");
            exit();
        } else {
            unset($_SESSION['cpf']);
            unset($_SESSION['senha']);
            unset($_SESSION['tipo']);
            unset($_SESSION['nome']);
            $_SESSION['valido'] = "erro";
            header("Location:../index.php");
            exit();
        };
    } else {
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
        unset($_SESSION['tipo']);
        unset($_SESSION['nome']);
        $_SESSION['valido'] = "erro";
        header("Location:../index.php");
        exit();
    };
} else {
    header("Location:../index.php");
    exit();
};