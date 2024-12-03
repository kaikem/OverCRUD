<?php
require_once 'Endereco.php';

class Usuario
{
    //ATRIBUTOS
    private string $nome;
    private string $telefone;
    private int $idusuario;
    private string $password;
    private string $cpf;
    private string $cnh;
    private string $carro;
    private int $idempregadoem;
    private int $tipo;
    private int $status;
    private int $idenderecousu;


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
    public function getIdusuario()
    {
        return $this->idusuario;
    }
    public function setIdusuario($idusuarioSet)
    {
        $this->idusuario = $idusuarioSet;
    }

    //password
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($passwordSet)
    {
        $this->password = $passwordSet;
    }

    //cpf
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpfSet)
    {
        $this->cpf = $cpfSet;
    }

    //cnh
    public function getCnh()
    {
        return $this->cnh;
    }
    public function setCnh($cnhSet)
    {
        $this->cnh = $cnhSet;
    }

    //carro
    public function getCarro()
    {
        return $this->carro;
    }
    public function setCarro($carroSet)
    {
        $this->carro = $carroSet;
    }

    //idempregadoem
    public function getIdempregadoem()
    {
        return $this->idempregadoem;
    }
    public function setIdempregadoem($idempregadoemSet)
    {
        $this->idempregadoem = $idempregadoemSet;
    }

    //tipo
    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo($tipoSet)
    {
        $this->tipo = $tipoSet;
    }

    //status
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($statusSet)
    {
        $this->status = $statusSet;
    }

    //endereco
    public function getIdenderecousu()
    {
        return $this->idenderecousu;
    }
    public function setIdenderecousu($idenderecousuSet)
    {
        $this->idenderecousu = $idenderecousuSet;
    }
};
