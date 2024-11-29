<?php
require_once 'C:/xampp/htdocs/overcrud/components/Empresa.php';
require_once 'C:/xampp/htdocs/overcrud/components/Usuario.php';
require_once 'C:/xampp/htdocs/overcrud/components/Endereco.php';

//-----------------------------------------------------------------------------
//INSTÂNCIAS
$instanciaEmp = new Empresa();
$instanciaUsu = new Usuario();
$instanciaEnd = new Endereco();


//-----------------------------------------------------------------------------
//EMPRESAS
//Lista Completa de Empresas
$listaEmp = $instanciaEmp->listarEmpresas();

//Lista de Empresas Vinculadas
$listaEmpVinculadas = $instanciaEmp->listarEmpresasVinculadas();


//-----------------------------------------------------------------------------
//USUÁRIOS
//Lista Completa de Usuários
$listaUsu = $instanciaUsu->listarUsuarios();

//Lista de Usuários Admins
$listaUsuAdmins = $instanciaUsu->listarUsuariosAdm();

//Lista de Usuários Ativos
$listaUsuAtivos = $instanciaUsu->listarUsuariosAtivos();


//-----------------------------------------------------------------------------
//ENDEREÇOS
//Lista Completa de Endereços
$listaEnd = $instanciaEnd->listarEnderecos();
