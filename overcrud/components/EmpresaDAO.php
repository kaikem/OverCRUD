<?php
require_once 'Empresa.php';

class EmpresaDAO
{
    //ATRIBUTOS
    private Empresa $empresa;

    
    //-----------------------------------------------------------------------------
    //CONSTRUTOR
    public function __construct($empresaCon)
    {
        $this->empresa = $empresaCon;
    }


    //-----------------------------------------------------------------------------
    //FUNÇÕES PRÓPIRAS
    //listar empresas
    public function listarEmpresas()
    {
        $listaEmp = [];
        $sqlConsultaEmp = ConexaoBD::conectarBD()->query("SELECT * FROM empresas");

        if ($sqlConsultaEmp->rowCount() > 0) {
            $listaEmp = $sqlConsultaEmp->fetchAll(PDO::FETCH_ASSOC);
            return $listaEmp;
        };
    }

    //listar empresas vinculadas
    public function listarEmpresasVinculadas()
    {
        $listaEmpVinculadas = [];
        $sqlConsultaEmpVinculada = ConexaoBD::conectarBD()->query("SELECT idempresa FROM empresas WHERE idempresa IN (SELECT idempregadoem FROM usuarios WHERE usuarios.idempregadoem = empresas.idempresa)");

        if ($sqlConsultaEmpVinculada->rowCount() > 0) {
            $listaEmpVinculadas = $sqlConsultaEmpVinculada->fetchAll(PDO::FETCH_ASSOC);
            return $listaEmpVinculadas;
        };
    }
}