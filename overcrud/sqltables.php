<?php
//USUÁRIOS
$listaUsu = [];
$listaUsuNomes = [];

$sqlConsultaUsu = $pdo->query("SELECT * FROM usuarios");
if ($sqlConsultaUsu->rowCount() > 0) {
    $listaUsu = $sqlConsultaUsu->fetchAll(PDO::FETCH_ASSOC);
};

$sqlConsultaUsuNomes = $pdo->query("SELECT nome FROM usuarios");
if ($sqlConsultaUsuNomes->rowCount() > 0) {
    $listaUsuNomes = $sqlConsultaUsuNomes->fetchAll(PDO::FETCH_ASSOC);
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

foreach($listaEmpNomes as $empNome){
    array_push($listaEmpNomesSomente, $empNome['nome']);
    sort($listaEmpNomesSomente);
};