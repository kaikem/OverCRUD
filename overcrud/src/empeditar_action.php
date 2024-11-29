<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'C:/xampp/htdocs/overcrud/validations/session_validation.php';

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    require_once 'C:/xampp/htdocs/overcrud/resources/logout.php';
};

//CONEXÃO COM BD
require_once 'C:/xampp/htdocs/overcrud/components/ConexaoBD.php';

//FUNÇÕES DE SUPORTE
require_once 'C:/xampp/htdocs/overcrud/resources/support.php';

//CLASSES
require_once 'C:/xampp/htdocs/overcrud/components/Empresa.php';
require_once 'C:/xampp/htdocs/overcrud/components/Endereco.php';

//RECEBIMENTO DE DADOS DO FORMULÁRIO
$idempresa = $_POST['idempresa'];
$cnpj = $_POST['cnpj'];
$nome = $_POST['nome'];
$fantasia = $_POST['fantasia'];
$telefone = $_POST['telefone'];
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
    require_once 'C:/xampp/htdocs/overcrud/resources/logout.php';
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once 'C:/xampp/htdocs/overcrud/partials/head.php';
head('- Editar Empresa');
?>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbartop">
            <?php require_once 'C:/xampp/htdocs/overcrud/partials/navbartop.php' ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5">EDITAR EMPRESA</h1>

            <!-- CONFIRMAÇÃO DE EDIÇÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                //ATUALIZAÇÃO DE CAMPOS NO BANCO DE DADOS
                $sqlAtualizar = ConexaoBD::conectarBD()->prepare("UPDATE empresas SET nome='$nome', telefone='$telefone', cep='$cep', cidade='$cidade', estado='$estado', logradouro='$logradouro', numlogradouro='$numlogradouro', bairro='$bairro', fantasia='$fantasia', cnpj='$cnpj', responsavel='$responsavel' WHERE idempresa='$idempresa'");
                $sqlAtualizar->execute();

                mensagemRetorno("Os dados de <b>$nome (CNPJ $cnpj)</b> foram atualizados com sucesso!", "success");

                //BOTÃO VOLTAR
                BotaoVoltar('../emplista.php', "secondary");
                ?>
            </div>

            <!-- FOOTER -->
            <?php require_once 'C:/xampp/htdocs/overcrud/partials/footer.php' ?>
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