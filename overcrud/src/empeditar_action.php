<?php
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
require_once "$root/overcrud/pathing.php";

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
require_once "$rootOvercrud/components/Empresa.php";
require_once "$rootOvercrud/components/Endereco.php";

//RECEBIMENTO DE DADOS DO FORMULÁRIO
$idempresa = $_POST['idempresa'];
$cnpj = $_POST['cnpj'];
$nome = $_POST['nome'];
$fantasia = $_POST['fantasia'];
$telefone = $_POST['telefone'];
$idenderecoemp = $_POST['idendereco'];

$idendereco = $_POST['idendereco'];
$cep = $_POST['cep'];
$cidade = $_POST['cidadeestado'];
$estado = $_POST['estadocidade'];
$logradouro = $_POST['logradouro'];
$numlogradouro = $_POST['numlogradouro'];
$bairro = $_POST['bairro'];
$responsavel = $_POST['responsavel'];

$novaEmpresa = new Empresa();
$novaEmpresa->setNome($nome);
$novaEmpresa->setCnpj($cnpj);
$novaEmpresa->setFantasia($fantasia);
$novaEmpresa->setTelefone($telefone);
$novaEmpresa->setResponsavel($responsavel);

$novoEndereco = new Endereco();
$novoEndereco->setCep($cep);
$novoEndereco->setCidade($cidade);
$novoEndereco->setEstado($estado);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setNumlogradouro($numlogradouro);
$novoEndereco->setBairro($bairro);

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idempresa)) {
    require_once "$rootOvercrud/resources/logout.php";
};
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
            <?= $idenderecoemp; ?>
            <?= $idendereco; ?>

            <!-- CONFIRMAÇÃO DE EDIÇÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                //ATUALIZAÇÃO DE CAMPOS NO BANCO DE DADOS
                $sqlAtualizarEmp = ConexaoBD::conectarBD()->prepare("UPDATE empresas SET nome='$nome', telefone='$telefone', cnpj='$cnpj', fantasia='$fantasia', responsavel='$responsavel', idenderecoemp='$idenderecoemp' WHERE idempresa='$idempresa'");
                $sqlAtualizarEmp->execute();

                $sqlAtualizarEnd = ConexaoBD::conectarBD()->prepare("UPDATE enderecos SET cep='$cep', cidade='$cidade', estado='$estado', logradouro='$logradouro', numlogradouro='$numlogradouro', bairro='$bairro' WHERE idendereco='$idendereco'");
                $sqlAtualizarEnd->execute();

                mensagemRetorno("Os dados de <b>" . $novaEmpresa['nome'] . " (CNPJ " . $novaEmpresa['cnpj'] . ")</b> foram atualizados com sucesso!", "success");

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