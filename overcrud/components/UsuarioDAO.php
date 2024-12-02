<?php 
require_once 'Usuario.php';

class UsuarioDAO{
    //ATRIBUTOS
    private Usuario $usuario;

    
    //-----------------------------------------------------------------------------
    //CONSTRUTOR
    public function __construct($usuarioCon)
    {
        $this->usuario = $usuarioCon;
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
}
?>