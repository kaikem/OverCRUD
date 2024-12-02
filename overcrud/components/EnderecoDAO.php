<?php 
require_once 'Endereco.php';

class EnderecoDAO{
    //ATRIBUTOS
    private Endereco $endereco;


    //-----------------------------------------------------------------------------
    //CONSTRUTOR
    public function __construct($enderecoCon)
    {
        $this->endereco = $enderecoCon;
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
?>