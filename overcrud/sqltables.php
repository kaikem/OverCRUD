<?php
//USUÁRIOS
$listaUsu = [];
$listaUsuNomes = [];
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


//EMPRESAS
$listaEmp = [];
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
    sort($listaEmpNomesSomente);
};

$listaEmpOrdenada = array_column($listaEmp, 'nome');
array_multisort($listaEmpOrdenada, SORT_ASC, $listaEmp);