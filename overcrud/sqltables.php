<?php
//USUÁRIOS
$listaUsu = [];
$listaUsuDesc = [];
$listaUsuNomes = [];
$listaUsuNomesSomente = [];
$listaUsuAdmins = [];
$listaUsuAtivos = [];

$sqlConsultaUsu = $pdo->query("SELECT * FROM usuarios");
if ($sqlConsultaUsu->rowCount() > 0) {
    $listaUsu = $sqlConsultaUsu->fetchAll(PDO::FETCH_ASSOC);
};

$sqlConsultaUsuNomes = $pdo->query("SELECT nome FROM usuarios");
if ($sqlConsultaUsuNomes->rowCount() > 0) {
    $listaUsuNomes = $sqlConsultaUsuNomes->fetchAll(PDO::FETCH_ASSOC);
};

$sqlConsultaUsuAdmin = $pdo->query("SELECT * FROM usuarios WHERE tipo='1'");
if ($sqlConsultaUsuAdmin->rowCount() > 0) {
    $listaUsuAdmins = $sqlConsultaUsuAdmin->fetchAll(PDO::FETCH_ASSOC);
};

$sqlConsultaUsuStatus = $pdo->query("SELECT * FROM usuarios WHERE status='1'");
if ($sqlConsultaUsuStatus->rowCount() > 0) {
    $listaUsuAtivos = $sqlConsultaUsuStatus->fetchAll(PDO::FETCH_ASSOC);
};

foreach ($listaUsuNomes as $usuNome) {
    array_push($listaUsuNomesSomente, $usuNome['nome']);
};

$listaUsuOrdenada = array_column($listaUsu, 'nome');
array_multisort($listaUsuOrdenada, SORT_ASC, $listaUsu);


//EMPRESAS
$listaEmp = [];
$listaEmpDesc = [];
$listaEmpNomes = [];
$listaEmpNomesSomente = [];

$sqlConsultaEmp = $pdo->query("SELECT * FROM empresas");
if ($sqlConsultaEmp->rowCount() > 0) {
    $listaEmp = $sqlConsultaEmp->fetchAll(PDO::FETCH_ASSOC);
};

$sqlConsultaEmpNomes = $pdo->query("SELECT nome FROM empresas");
if ($sqlConsultaEmpNomes->rowCount() > 0) {
    $listaEmpNomes = $sqlConsultaEmpNomes->fetchAll(PDO::FETCH_ASSOC);
};

foreach ($listaEmpNomes as $empNome) {
    array_push($listaEmpNomesSomente, $empNome['nome']);
};

$listaEmpOrdenada = array_column($listaEmp, 'nome');
//array_multisort($listaEmpOrdenada, SORT_DESC, $listaEmp);


//FUNÇÕES GERAIS
function OrdernarCres($listaOrdenada, $listaFinal)
{
    array_multisort($$listaOrdenada, SORT_ASC, $$listaFinal);
};

function OrdernarDecr($listaOrdenada, $listaFinal)
{
    array_multisort($listaOrdenada, SORT_DESC, $listaFinal);
};