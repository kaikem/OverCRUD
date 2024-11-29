<?php
//PATHING
require_once "pathing.php";

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
$idenderecoemp = 0;

$novoEndereco = new Endereco();
$novoEndereco->setCep($cep);
$novoEndereco->setCidade($cidade);
$novoEndereco->setEstado($estado);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setNumlogradouro($numlogradouro);
$novoEndereco->setBairro($bairro);


//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($nome) && !isset($cnpj)) {
    require_once "$rootOvercrud/resources/logout.php";
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once "$rootOvercrud/partials/head.php";
head('- Cadastrar Empresa');
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
            <h1 class="text-center text-primary display-6 my-5">CADASTRO DE EMPRESAS</h1>

            <!-- VERIFICAÇÃO DE CAMPO CNPJ + INSERÇÃO NO BD -->
            <div class="col-4 col-md-6 text-center">
                <?php
                $sqlVerifCnpj = ConexaoBD::conectarBD()->query("SELECT * FROM empresas WHERE `cnpj`='$cnpj'");
                $sqlVerifEnd = ConexaoBD::conectarBD()->query("SELECT * FROM enderecos WHERE cep='$cep' AND cidade='$cidade' AND logradouro='$logradouro' AND numlogradouro='$numlogradouro'");

                //VERIFICAÇÃO ENDEREÇO DUPLICADO
                if ($sqlVerifEnd->rowCount() === 0) {
                    //PREPARAÇÃO E INSERÇÃO DE DADOS DO ENDEREÇO
                    $sqlInsertEnd = ConexaoBD::conectarBD()->prepare("INSERT INTO enderecos (cep, cidade, estado, logradouro, numlogradouro, bairro) VALUES ('$cep', '$cidade', '$estado', '$logradouro', '$numlogradouro', '$bairro')");
                    $sqlInsertEnd->execute();
                };

                //IDENDERECO DO ENDEREÇO NECESSÁRIO
                $sqlGetIdEnd = ConexaoBD::conectarBD()->query("SELECT MIN(idendereco) FROM enderecos WHERE cep='$cep' AND cidade='$cidade' AND logradouro='$logradouro' AND numlogradouro='$numlogradouro'");
                if ($sqlGetIdEnd->rowCount() > 0) {
                    $idendereco = $sqlGetIdEnd->fetchAll(PDO::FETCH_ASSOC);
                    $idenderecoemp = $idendereco[0]["MIN(idendereco)"];
                };

                //VERIFICAÇÃO CNPJ
                if ($sqlVerifCnpj->rowCount() === 0) {
                    //PREPARAÇÃO PARA INSERIR DADOS DA EMPRESA
                    $sqlInsertEmp = ConexaoBD::conectarBD()->prepare("INSERT INTO empresas (nome, telefone, cnpj, fantasia, responsavel, idenderecoemp) VALUES ('$nome', '$telefone', '$cnpj', '$fantasia', '$responsavel', '$idenderecoemp')");

                    //EXECUÇÃO E VERIFICAÇÃO DAS INSERÇÕES
                    if ($sqlInsertEmp->execute()) {
                        mensagemRetorno("Dados de <b>" . $novaEmpresa->getNome() . " (CNPJ " . $novaEmpresa->getCnpj() . ")</b> cadastrados com sucesso!", "success");
                        BotaoVoltar('../emplista.php', "secondary");
                    } else {
                        mensagemRetorno("ERRO: Dados de " . $novaEmpresa->getNome() . " (CNPJ " . $novaEmpresa->getCnpj() . ") não foram cadastrados...", "danger");
                        BotaoVoltar('../empcadastro.php', "secondary");
                    };
                } else {
                    mensagemRetorno("CNPJ " . $novaEmpresa->getCnpj() . " já existe! Use outro CNPJ para este cadastro.", "warning");
                    BotaoVoltar('../empcadastro.php', "secondary");
                };
                ?>

            </div>

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
    <script src="./js/empFormValidations.js"></script>
</body>

</html>