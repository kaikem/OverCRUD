<?php
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
require_once "$root/OverCRUD-main/overcrud/resources/pathing.php";


//-----------------------------------------------------------------------------
//REQUISIÇÕES DE CLASSES
require_once "$rootOvercrud/components/Empresa.php";
require_once "$rootOvercrud/components/EmpresaDAO.php";
require_once "$rootOvercrud/components/Usuario.php";
require_once "$rootOvercrud/components/UsuarioDAO.php";
require_once "$rootOvercrud/components/Endereco.php";
require_once "$rootOvercrud/components/EnderecoDAO.php";


//-----------------------------------------------------------------------------
//EMPRESAS
//Instâncias
$instanciaEmp = new Empresa();
$instanciaEmpDAO = new EmpresaDAO($instanciaEmp);

//Lista Completa de Empresas
$listaEmp = $instanciaEmpDAO->listarEmpresas();

//Lista Ordenada de Empresas
$nome = array_column($listaEmp, 'nome');
array_multisort($nome, SORT_ASC, $listaEmp);

//Lista de Empresas Vinculadas
$listaEmpVinculadas = $instanciaEmpDAO->listarEmpresasVinculadas();


//-----------------------------------------------------------------------------
//USUÁRIOS
//Instâncias
$instanciaUsu = new Usuario();
$instanciaUsuDAO = new UsuarioDAO($instanciaUsu);

//Lista Completa de Usuários
$listaUsu = $instanciaUsuDAO->listarUsuarios();

//Lista Ordenada de Usuários
$nome = array_column($listaUsu, 'nome');
array_multisort($nome, SORT_ASC, $listaUsu);

//Lista de Usuários Admins
$listaUsuAdmins = $instanciaUsuDAO->listarUsuariosAdm();

//Lista de Usuários Ativos
$listaUsuAtivos = $instanciaUsuDAO->listarUsuariosAtivos();


//-----------------------------------------------------------------------------
//ENDEREÇOS
//Instâncias
$instanciaEnd = new Endereco();
$instanciaEndDAO = new EnderecoDAO($instanciaEnd);

//Lista Completa de Endereços
$listaEnd = $instanciaEndDAO->listarEnderecos();