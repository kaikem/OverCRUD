<?php
require_once './components/Empresa.php';
require_once './components/Usuario.php';

//-----------------------------------------------------------------------------
//INSTÂNCIAS
$instanciaEmp = new Empresa();
$instanciaUsu = new Usuario();


//-----------------------------------------------------------------------------
//EMPRESAS
//Lista Completa de Empresas
$listaEmp = $instanciaEmp->listarEmpresas();


//-----------------------------------------------------------------------------
//USUÁRIOS
//Lista Completa de Usuários
$listaUsu = $instanciaUsu->listarUsuarios();

//Lista de Usuários Admins
$listaUsuAdmins = $instanciaUsu->listarUsuariosAdm();

//Lista de Usuários Ativos
$listaUsuAtivos = $instanciaUsu->listarUsuariosAtivos();
