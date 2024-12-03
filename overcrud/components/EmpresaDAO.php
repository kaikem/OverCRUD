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
    //GETTERS E SETTERS
    //empresa
    public function getEmpresa()
    {
        return $this->empresa;
    }
    public function setEmpresa($empresaSet)
    {
        $this->empresa = $empresaSet;

        return $this;
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

    //buscar empresa por cnpj
    public function buscarPorCnpj($cnpj)
    {
        $sqlVerifCnpj = ConexaoBD::conectarBD()->query("SELECT * FROM empresas WHERE `cnpj`='$cnpj'");
        return $sqlVerifCnpj;
    }

    //preparação para inserção de empresa no banco de dados
    public function prepInserirEmp()
    {
        $sqlInsertEmp = ConexaoBD::conectarBD()->prepare("INSERT INTO empresas (nome, telefone, cnpj, fantasia, responsavel, idenderecoemp) VALUES ('{$this->getEmpresa()->getNome()}', '{$this->getEmpresa()->getTelefone()}', '{$this->getEmpresa()->getCnpj()}', '{$this->getEmpresa()->getFantasia()}', '{$this->getEmpresa()->getResponsavel()}', '{$this->getEmpresa()->getIdenderecoemp()}')");
        return $sqlInsertEmp;
    }
}