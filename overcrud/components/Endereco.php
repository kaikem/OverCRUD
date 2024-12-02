<?php
require_once 'ConexaoBD.php';

class Endereco
{
    //ATRIBUTOS
    private int $idendereco;
    private string $cep;
    private string $cidade;
    private string $estado;
    private string $logradouro;
    private string $numlogradouro;
    private string $bairro;


    //-----------------------------------------------------------------------------
    //CONSTRUTOR
    public function __construct() {}


    //-----------------------------------------------------------------------------
    //GETTERS E SETTERS
    //cep
    public function getIdendereco()
    {
        return $this->idendereco;
    }
    public function setIdendereco($idenderecoSet)
    {
        $this->idendereco = $idenderecoSet;

        return $this;
    }

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
};