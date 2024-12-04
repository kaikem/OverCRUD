<?php
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
require_once "$root/overcrud/resources/pathing.php";

//VERIFICAÇÃO DE SESSÃO
require_once "$rootOvercrud/validations/session_validation.php";

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    require_once "$rootOvercrud/resources/logout.php";
};

//CONEXÃO COM BD
require_once "$rootOvercrud/components/ConexaoBD.php";

//FUNÇÕES DE SUPORTE
require_once "$rootOvercrud/resources/support.php";

//CLASSES
require_once "$rootOvercrud/components/EmpresaDAO.php";
require_once "$rootOvercrud/components/EnderecoDAO.php";

//RECEBIMENTO DE DADOS DO FORMULÁRIO
//empresa
$idempresa = $_POST['idempresa'];
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$fantasia = $_POST['fantasia'];
$telefone = $_POST['telefone'];
$responsavel = $_POST['responsavel'];
$idenderecoemp = $_POST['idendereco'];

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idempresa)) {
    require_once "$rootOvercrud/resources/logout.php";
} else {
    $novaEmpresa = new Empresa();
    $novaEmpresa->setNome($nome);
    $novaEmpresa->setCnpj($cnpj);
    $novaEmpresa->setFantasia($fantasia);
    $novaEmpresa->setTelefone($telefone);
    $novaEmpresa->setResponsavel($responsavel);
    $novaEmpresa->setIdenderecoemp($idenderecoemp);
    $novaEmpresaDAO = new EmpresaDAO($novaEmpresa);
};

//endereço
$idendereco = $_POST['idendereco'];
$cep = $_POST['cep'];
$cidade = $_POST['cidadeestado'];
$estado = $_POST['estadocidade'];
$logradouro = $_POST['logradouro'];
$numlogradouro = $_POST['numlogradouro'];
$bairro = $_POST['bairro'];

$novoEndereco = new Endereco();
$novoEndereco->setCep($cep);
$novoEndereco->setCidade($cidade);
$novoEndereco->setEstado($estado);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setNumlogradouro($numlogradouro);
$novoEndereco->setBairro($bairro);
$novoEnderecoDAO = new EnderecoDAO($novoEndereco);
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once "$rootOvercrud/partials/head.php";
head('- Editar Empresa');
?>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbartop">
            <?php require_once "$rootOvercrud/partials/navbartop.php" ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5">EDITAR EMPRESA</h1>

            <!-- CONFIRMAÇÃO DE EDIÇÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                //VERIFICAÇÃO ENDEREÇO DUPLICADO
                if (($novoEnderecoDAO->buscarEnd())->rowCount() === 0) {
                    //INSERÇÃO DE ENDEREÇO NO BANCO DE DADOS
                    $novoEnderecoDAO->inserirNovoEnd();
                };

                //IDENDERECO DO ENDEREÇO NECESSÁRIO
                $novaEmpresa->setIdenderecoemp($novoEnderecoDAO->buscarIdEnd());

                //ATUALIZAÇÃO DE CAMPOS DA EMPRESA NO BANCO DE DADOS
                $novaEmpresaDAO->atualizarEmp($idempresa);
                mensagemRetorno("Os dados de <b>" . $novaEmpresa->getNome() . " (CNPJ " . $novaEmpresa->getCnpj() . ")</b> foram atualizados com sucesso!", "success");

                //BOTÃO VOLTAR
                BotaoVoltar('../emplista.php', "secondary");
                ?>
            </div>

            <!-- FOOTER -->
            <?php require_once "$rootOvercrud/partials/footer.php" ?>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
        <script src="./js/darkmodetoggle.js"></script>
        <script src="./js/modals.js"></script>
        <script src="./js/mudarDisplay.js"></script>
</body>

</html>