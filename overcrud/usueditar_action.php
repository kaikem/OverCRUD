<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    require_once 'logout.php';
};

//CONEXÃO COM BD
require_once 'config.php';

//FUNÇÃO DE MENSAGENS
require_once 'support.php';

//TABELAS DO BD
require_once 'sqltables.php';

//RECEBIMENTO DE DADOS DO FORMULÁRIO
$idusuario = $_POST['idusuario'];
$cpf = $_POST['cpf'];
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$cnh = $_POST['cnh'];
$carro = $_POST['carro'];
$empregadoem = $_POST['empregadoem'];

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idusuario)) {
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
    <title>OverCRUD - Editar Usuário(a)</title>
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
            <h1 class="text-center text-primary display-6 my-5">EDITAR USUÁRIO(A)</h1>

            <!-- CONFIRMAÇÃO DE EDIÇÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                //ATUALIZAÇÃO DE CAMPOS NO BANCO DE DADOS
                $sqlAtualizar = $pdo->prepare("UPDATE usuarios SET nome='$nome', telefone='$telefone', endereco='$endereco', cpf='$cpf', cnh='$cnh', carro='$carro', idempregadoem='$empregadoem', tipo='$tipo' WHERE idusuario='$idusuario'");
                $sqlAtualizar->execute();

                mensagemRetorno("Os dados de <b>$nome (CPF $cpf)</b> foram atualizados com sucesso!", "success");
                ?>

                <!-- BOTÃO VOLTAR -->
                <a href="usulista.php" class="d-block btn btn-warning">VOLTAR</a>
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
        <script src="./js/empMudarDisplay.js"></script>
</body>

</html>