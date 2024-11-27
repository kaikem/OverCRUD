<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    require_once 'logout.php';
};

//CONEXÃO COM BD
require_once 'config.php';

//TABELAS DO BD
require_once 'sqltables.php';

//FUNÇÕES DE SUPORTE
require_once 'support.php';

//CLASSES
require_once './src/classes/Empresa.php';
require_once './src/classes/Endereco.php';

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

$novoEndereco = new Endereco();
$novoEndereco->setCep($cep);
$novoEndereco->setCidade($cidade);
$novoEndereco->setEstado($estado);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setNumlogradouro($numlogradouro);
$novoEndereco->setBairro($bairro);


//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($nome) && !isset($cnpj)) {
    require_once 'logout.php';
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
    <title>OverCRUD - Cadastrar Empresa</title>
</head>

<body>
    <div class="container">

        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbarTop">
            <?php require_once 'navbarTop.php' ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5">CADASTRO DE EMPRESAS</h1>

            <!-- VERIFICAÇÃO DE CAMPO CNPJ + INSERÇÃO NO BD -->
            <div class="col-4 col-md-6 text-center">
                <?php
                $sqlVerif = $pdo->prepare("SELECT * FROM empresas WHERE `cnpj`='$cnpj'");
                $sqlVerif->execute();

                if ($sqlVerif->rowCount() === 0) {
                    $sqlInsert = $pdo->prepare("INSERT INTO empresas (cnpj, nome, fantasia, telefone, cep, cidade, estado, logradouro, numlogradouro, bairro, responsavel) VALUES ('$cnpj', '$nome', '$fantasia', '$telefone', '$cep', '$cidade', '$estado', '$logradouro', '$numlogradouro', '$bairro', '$responsavel')");

                    if ($sqlInsert->execute()) {
                        mensagemRetorno("Dados de <b>$nome (CNPJ $cnpj)</b> cadastrados com sucesso!", "success");
                        BotaoVoltar('emplista.php', "secondary");
                    } else {
                        mensagemRetorno("ERRO: Dados de $nome (CNPJ $cnpj) não foram cadastrados...", "danger");
                        BotaoVoltar('empcadastro.php', "secondary");
                    };
                } else {
                    mensagemRetorno("CNPJ $cnpj já existe! Use outro CNPJ para este cadastro.", "warning");
                    BotaoVoltar('empcadastro.php', "secondary");
                };
                ?>

            </div>

        </div>

        <!-- FOOTER -->
        <?php require_once 'footer.php' ?>
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