<?php
//INÍCIO DE SESSÃO
session_start();

//VERIFICAÇÃO DE SESSÃO EXISTENTE
if ((isset($_SESSION['login']) == true) && (isset($_SESSION['senha']) == true)) {
    $logado = $_SESSION['login'];
    $tipoUsu = $_SESSION['tipo'];

    if ($tipoUsu == '0') {
        $linksAdm = 'd-none';
    } else {
        $linksAdm = '';
    };
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION['tipo']);
    header("Location: index.php");
};