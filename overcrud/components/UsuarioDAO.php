<?php
require_once 'Usuario.php';

class UsuarioDAO
{
    //ATRIBUTOS
    private Usuario $usuario;


    //-----------------------------------------------------------------------------
    //CONSTRUTOR
    public function __construct($usuarioCon)
    {
        $this->usuario = $usuarioCon;
    }


    //-----------------------------------------------------------------------------
    //GETTERS E SETTERS
    //usuario
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuarioSet)
    {
        $this->usuario = $usuarioSet;
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

    //buscar empresa por cpf
    public function buscarPorCpf($cpf)
    {
        $sqlVerifCpf = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios WHERE `cpf`='$cpf'");
        return $sqlVerifCpf;
    }

    //buscar empresa por cnh
    public function buscarPorCnh($cnh)
    {
        $sqlVerifCnh = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios WHERE `cnh`='$cnh' AND `cnh`!=''");
        return $sqlVerifCnh;
    }


    //preparar para inserção de usuario no banco de dados
    public function prepInserirUsu()
    {
        $sqlInserirUsu = ConexaoBD::conectarBD()->prepare("INSERT INTO usuarios (nome, telefone, cpf, password, cnh, carro, tipo, status, idempregadoem, idenderecousu) VALUES ('{$this->getUsuario()->getNome()}', '{$this->getUsuario()->getTelefone()}', '{$this->getUsuario()->getCpf()}', '{$this->getUsuario()->getPassword()}', '{$this->getUsuario()->getCnh()}', '{$this->getUsuario()->getCarro()}', '{$this->getUsuario()->getTipo()}', '{$this->getUsuario()->getStatus()}','{$this->getUsuario()->getIdempregadoem()}', '{$this->getUsuario()->getIdenderecousu()}')");
        return $sqlInserirUsu;
    }

    //consultar usuario por id
    public function consultaDeIdUsu()
    {
        $sqlConsultaIdUsu = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios WHERE idusuario='{$this->getUsuario()->getIdusuario()}'");
        return $sqlConsultaIdUsu;
    }

    //consultar usuario por id
    public function UsuPorId()
    {
        $sqlConsultaIdEmp = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios WHERE idusuario='{$this->getUsuario()->getIdusuario()}'");

        $usuario = $sqlConsultaIdEmp->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

    //consultar usuário por id
    public function excluirUsu()
    {
        $sqlExcluirUsu = ConexaoBD::conectarBD()->prepare("DELETE FROM usuarios WHERE idusuario='{$this->getUsuario()->getIdusuario()}'");
        $sqlExcluirUsu->execute();
    }

    //atualizar usuario por id
    public function atualizarUsu($idusuario)
    {
        $sqlAtualizarUsu = ConexaoBD::conectarBD()->prepare("UPDATE usuarios SET nome='{$this->getUsuario()->getNome()}', telefone='{$this->getUsuario()->getTelefone()}', cpf='{$this->getUsuario()->getCpf()}', cnh='{$this->getUsuario()->getCnh()}', carro='{$this->getUsuario()->getCarro()}', tipo='{$this->getUsuario()->getTipo()}', status='{$this->getUsuario()->getStatus()}', idempregadoem='{$this->getUsuario()->getIdempregadoem()}', idenderecousu='{$this->getUsuario()->getIdenderecousu()}' WHERE idusuario='$idusuario'");
        $sqlAtualizarUsu->execute();
    }
};