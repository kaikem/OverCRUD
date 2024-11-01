<?php
//USUÁRIOS
$listaUsu = [];

$sqlConsultaUsu = $pdo->query("SELECT * FROM usuarios");
if ($sqlConsultaUsu->rowCount() > 0) {
    $listaUsu = $sqlConsultaUsu->fetchAll(PDO::FETCH_ASSOC);
};

//EMPRESAS
$listaEmp = [];

$sqlConsultaEmp = $pdo->query("SELECT * FROM empresas");
if ($sqlConsultaEmp->rowCount() > 0) {
    $listaEmp = $sqlConsultaEmp->fetchAll(PDO::FETCH_ASSOC);
};
