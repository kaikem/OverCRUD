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

    //preparar para inserção de empresa no banco de dados
    public function prepInserirEmp()
    {
        $sqlInserirEmp = ConexaoBD::conectarBD()->prepare("INSERT INTO empresas (nome, telefone, cnpj, fantasia, responsavel, idenderecoemp) VALUES ('{$this->getEmpresa()->getNome()}', '{$this->getEmpresa()->getTelefone()}', '{$this->getEmpresa()->getCnpj()}', '{$this->getEmpresa()->getFantasia()}', '{$this->getEmpresa()->getResponsavel()}', '{$this->getEmpresa()->getIdenderecoemp()}')");
        return $sqlInserirEmp;
    }

    //consultar empresa por id
    public function consultaDeIdEmp()
    {
        $sqlConsultaIdEmp = ConexaoBD::conectarBD()->query("SELECT * FROM empresas WHERE idempresa='{$this->getEmpresa()->getIdempresa()}'");
        return $sqlConsultaIdEmp;
    }

    //consultar empresa por id
    public function EmpPorId()
    {
        $sqlConsultaIdEmp = ConexaoBD::conectarBD()->query("SELECT * FROM empresas WHERE idempresa='{$this->getEmpresa()->getIdempresa()}'");

        $empresa = $sqlConsultaIdEmp->fetch(PDO::FETCH_ASSOC);
        return $empresa;
    }

    //consultar empresa por id
    public function excluirEmp()
    {
        $sqlExcluirEmp = ConexaoBD::conectarBD()->prepare("DELETE FROM empresas WHERE idempresa='{$this->getEmpresa()->getIdempresa()}'");
        $sqlExcluirEmp->execute();
    }

    //atualizar empresa por id
    public function atualizarEmp($idempresa)
    {
        $sqlAtualizarEmp = ConexaoBD::conectarBD()->prepare("UPDATE empresas SET nome='{$this->getEmpresa()->getNome()}', telefone='{$this->getEmpresa()->getTelefone()}', cnpj='{$this->getEmpresa()->getCnpj()}', fantasia='{$this->getEmpresa()->getFantasia()}', responsavel='{$this->getEmpresa()->getResponsavel()}', idenderecoemp='{$this->getEmpresa()->getIdenderecoemp()}' WHERE idempresa='$idempresa'");
        $sqlAtualizarEmp->execute();
    }
}