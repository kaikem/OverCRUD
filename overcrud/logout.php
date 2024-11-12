<?php
session_start();
unset($_SESSION['cpf']);
unset($_SESSION['senha']);
unset($_SESSION['tipo']);
unset($_SESSION['nome']);
$_SESSION['valido'] = true;
header('Location: index.php');