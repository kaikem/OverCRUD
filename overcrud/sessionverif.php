<?php
//INÍCIO DE SESSÃO
session_start();

//VERIFICAÇÃO DE SESSÃO EXISTENTE
if ((isset($_SESSION['login']) == true) && (isset($_SESSION['senha']) == true)) {
    $logado = $_SESSION['login'];
    $tipoUsu = $_SESSION['tipo'];
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header("Location: index.php");
};
