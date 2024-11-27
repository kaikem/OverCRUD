<?php
require_once 'Endereco.php';

class Empresa
{
    private string $nome;
    private string $telefone;
    private int $idempresa;
    private string $fantasia;
    private string $cnpj;
    private string $responsavel;
    private int $idendereco;


    //-----------------------------------------------------------------------------
    //CONSTRUTOR
    public function __construct() {}


    //-----------------------------------------------------------------------------
    //GETTERS E SETTERS
    //nome
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nomeSet)
    {
        $this->nome = $nomeSet;
    }

    //telefone
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefoneSet)
    {
        $this->telefone = $telefoneSet;
    }

    //idusuario
    public function getIdempresa()
    {
        return $this->idempresa;
    }
    public function setIdempresa($idempresaSet)
    {
        $this->idempresa = $idempresaSet;
    }

    //fantasia
    public function getFantasia()
    {
        return $this->fantasia;
    }
    public function setFantasia($fantasiaSet)
    {
        $this->fantasia = $fantasiaSet;
    }

    //cnpj
    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function setCnpj($cnpjSet)
    {
        $this->cnpj = $cnpjSet;
    }

    //responsavel
    public function getResponsavel()
    {
        return $this->responsavel;
    }
    public function setResponsavel($responsavelSet)
    {
        $this->responsavel = $responsavelSet;
    }

    //endereco
    public function getEndereco()
    {
        return $this->idendereco;
    }
    public function setEndereco($enderecoSet)
    {
        $this->idendereco = $enderecoSet;
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
};
