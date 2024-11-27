<?php
require_once 'Endereco.php';

class Usuario
{
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
    //lista completa de usuarios
    public function listarUsuarios()
    {
        $listaUsu = [];
        $sqlConsultaUsu = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios");

        if ($sqlConsultaUsu->rowCount() > 0) {
            $listaUsu = $sqlConsultaUsu->fetchAll(PDO::FETCH_ASSOC);
            return $listaUsu;
        };
    }

    //lista de usuários admins
    public function listarUsuariosAdm()
    {
        $listaUsuAdmins = [];
        $sqlConsultaUsuAdmin = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios WHERE tipo='1'");

        if ($sqlConsultaUsuAdmin->rowCount() > 0) {
            $listaUsuAdmins = $sqlConsultaUsuAdmin->fetchAll(PDO::FETCH_ASSOC);
            return $listaUsuAdmins;
        };
    }

    //lista de usuários ativos
    public function listarUsuariosAtivos()
    {
        $listaUsuAtivos = [];
        $sqlConsultaUsuativos = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios WHERE status='1'");

        if ($sqlConsultaUsuativos->rowCount() > 0) {
            $listaUsuAtivos = $sqlConsultaUsuativos->fetchAll(PDO::FETCH_ASSOC);
            return $listaUsuAtivos;
        };
    }
};