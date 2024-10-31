<?php

//VERIFICAÇÃO DE SUBMIT DO FORM E VARIÁVEIS VAZIAS
if (!empty($_POST['login']) && !empty($_POST['senha'])) {
    require_once 'config.php';

    $loginIndex = $_POST['login'];
    $senhaIndex = $_POST['senha'];
    print_r($loginIndex);
    print_r($senhaIndex);
} else {
    header('Location: index.html');
};