<?php
//INÍCIO DE SESSÃO
session_start();

//VERIFICAÇÃO DE SESSÃO EXISTENTE
if ((isset($_SESSION['cpf']) == true) && (isset($_SESSION['senha']) == true)) {
    $logado = $_SESSION['cpf'];
    $tipoUsu = $_SESSION['tipo'];
    $nomeUsu = strtok($_SESSION['nome'], " ");


    //HIDE ou SHOW DOS LINKS
    if ($tipoUsu == '0') {
        $linksAdm = 'd-none';
    } else {
        $linksAdm = '';
    };
} else {
    unset($_SESSION['cpf']);
    unset($_SESSION['senha']);
    unset($_SESSION['tipo']);
    unset($_SESSION['nome']);
    header("Location: index.php");
};
