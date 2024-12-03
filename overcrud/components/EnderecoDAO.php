<?php
require_once 'Endereco.php';

class EnderecoDAO
{
    //ATRIBUTOS
    private Endereco $endereco;


    //-----------------------------------------------------------------------------
    //CONSTRUTOR
    public function __construct($enderecoCon)
    {
        $this->endereco = $enderecoCon;
    }


    //-----------------------------------------------------------------------------
    //GETTERS E SETTERS
    //endereço
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($enderecoSet)
    {
        $this->endereco = $enderecoSet;

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

    //busca endereço específico
    public function buscarEnd()
    {
        $sqlVerifEnd = ConexaoBD::conectarBD()->query("SELECT * FROM enderecos WHERE `cep`='{$this->getEndereco()->getCep()}' AND `cidade`='{$this->getEndereco()->getCidade()}' AND `estado`='{$this->getEndereco()->getEstado()}' AND `logradouro`='{$this->getEndereco()->getLogradouro()}' AND `numlogradouro`='{$this->getEndereco()->getNumlogradouro()}' AND `bairro`='{$this->getEndereco()->getBairro()}'");

        return $sqlVerifEnd;
    }

    //retorno de idendereco
    public function buscarIdEnd()
    {
        $sqlGetIdEnd = ConexaoBD::conectarBD()->query("SELECT MIN(idendereco) FROM enderecos WHERE `cep`='{$this->getEndereco()->getCep()}' AND `cidade`='{$this->getEndereco()->getCidade()}' AND `estado`='{$this->getEndereco()->getEstado()}' AND `logradouro`='{$this->getEndereco()->getLogradouro()}' AND `numlogradouro`='{$this->getEndereco()->getNumlogradouro()}' AND `bairro`='{$this->getEndereco()->getBairro()}'");

        if ($sqlGetIdEnd->rowCount() > 0) {
            $idendereco = $sqlGetIdEnd->fetchAll(PDO::FETCH_ASSOC);
            $idenderecoempDAO = $idendereco[0]["MIN(idendereco)"];
            return $idenderecoempDAO;
        };
    }

    //inserção no banco de dados
    public function inserirNovoEnd()
    {
        $sqlInserirEnd = ConexaoBD::conectarBD()->prepare("INSERT INTO enderecos (cep, cidade, estado, logradouro, numlogradouro, bairro) VALUES ('{$this->getEndereco()->getCep()}', '{$this->getEndereco()->getCidade()}', '{$this->getEndereco()->getEstado()}', '{$this->getEndereco()->getLogradouro()}', '{$this->getEndereco()->getNumlogradouro()}', '{$this->getEndereco()->getBairro()}')");
        $sqlInserirEnd->execute();
    }
};
