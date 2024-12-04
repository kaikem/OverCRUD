<?php
session_start();
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
//require_once "$root/overcrud/resources/pathing.php";

unset($_SESSION['cpf']);
unset($_SESSION['senha']);
unset($_SESSION['tipo']);
unset($_SESSION['nome']);
$_SESSION['valido'] = "validado";

header('Location:./index.php');


/*
session_start();
unset($_SESSION['cpf']);
unset($_SESSION['senha']);
unset($_SESSION['tipo']);
unset($_SESSION['nome']);
$_SESSION['valido'] = "validado";

if (basename($_SERVER['SCRIPT_NAME']) !== 'index.php') {
    header('Location: ../index.php');
};
*/