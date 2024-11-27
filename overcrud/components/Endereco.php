<?php
require_once 'ConexaoBD.php';

class Endereco
{
    private string $cep;
    private string $cidade;
    private string $estado;
    private string $logradouro;
    private int $numlogradouro;
    private string $bairro;

    //-----------------------------------------------------------------------------
    //CONSTRUTOR
    public function __construct() {}


    //-----------------------------------------------------------------------------
    //GETTERS E SETTERS
    //cep
    public function getCep()
    {
        return $this->cep;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    //cidade
    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    //estado
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    //logradouro
    public function getLogradouro()
    {
        return $this->logradouro;
    }
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    //numlogradouro
    public function getNumlogradouro()
    {
        return $this->numlogradouro;
    }
    public function setNumlogradouro($numlogradouro)
    {
        $this->numlogradouro = $numlogradouro;

        return $this;
    }

    //bairro
    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }


    //-----------------------------------------------------------------------------
    //FUNÇÕES PRÓPIRAS
    //listar endereços
    public function listarEnderecos()
    {
        $listaEnd = [];
        $sqlConsultaEnd = ConexaoBD::conectarBD()->query("SELECT * FROM enderecos");

        if ($sqlConsultaEnd->rowCount() > 0) {
            $listaEnd = $sqlConsultaEnd->fetchAll(PDO::FETCH_ASSOC);
            return $listaEnd;
        };
    }
}
