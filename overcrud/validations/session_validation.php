<?php
//INÍCIO DE SESSÃO
session_start();

//VERIFICAÇÃO DE SESSÃO EXISTENTE
if ((isset($_SESSION['cpf']) == true) && (isset($_SESSION['senha']) == true)) {
    $logado = $_SESSION['cpf'];
    $tipoUsu = $_SESSION['tipo'];
    $_SESSION['valido'] = "validado";
    $nomeUsu = strtok($_SESSION['nome'], " ");
    
    //ESCONDER ou MOSTRAR OS LINKS
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
    $_SESSION['valido'] = "erro";
};


//REALIZAR LOGOUT E VOLTAR PARA INDEX
function logoutPagina($voltar){
    session_start();
    unset($_SESSION['cpf']);
    unset($_SESSION['senha']);
    unset($_SESSION['tipo']);
    unset($_SESSION['nome']);
    $_SESSION['valido'] = "validado";

    header("Location: $voltar/index.php");
};