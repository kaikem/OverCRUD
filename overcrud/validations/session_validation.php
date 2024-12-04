<?php
//INÍCIO DE SESSÃO
session_start();
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
require_once "$root/overcrud/resources/pathing.php";

//VERIFICAÇÃO DE SESSÃO EXISTENTE
if ((isset($_SESSION['cpf']) == true) && (isset($_SESSION['senha']) == true)) {
    $logado = $_SESSION['cpf'];
    $tipoUsu = $_SESSION['tipo'];
    $_SESSION['valido'] = "validado";
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
    if (basename($_SERVER['SCRIPT_NAME']) !== 'index.php') {
        header('Location:' . $rootOvercrud . '/index.php');
    };
};