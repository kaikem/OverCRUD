<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';
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
    <!-- BASE PHP -->
    <?php
    //IMPORTAÇÕES
    require_once 'config.php';
    require_once 'support.php';

    //RECEBIMENTO DE DADOS DO FORMULÁRIO
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $fantasia = $_POST['fantasia'];
    $cnpj = $_POST['cnpj'];
    $responsavel = $_POST['responsavel'];
    ?>

    <!-- HTML -->
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbarTop">
            <?php require_once 'navbarTop.php' ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex mt-5" id="appBody">
            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center display-6 my-5">CADASTRO DE EMPRESAS</h1>
            <!-- VERIFICAÇÃO DE CAMPO CNPJ + INSERÇÃO NO BD -->
            <?php
            $sqlVerif = $pdo->prepare("SELECT * FROM empresas WHERE `cnpj`='$cnpj'");
            $sqlVerif->execute();

            if ($sqlVerif->rowCount() === 0) {
                $sqlInsert = $pdo->prepare("INSERT INTO empresas (nome, telefone, endereco, fantasia, cnpj, responsavel) VALUES ('$nome', '$telefone', '$endereco', '$fantasia', '$cnpj', '$responsavel')");

                if ($sqlInsert->execute()) {
                    mensagemRetorno("Dados de $nome (CNPJ $cnpj) cadastrados com sucesso!", "success");
                } else {
                    mensagemRetorno("ERRO: Dados de $nome (CNPJ $cnpj) não foram cadastrados...", "danger");
                };
            } else {
                mensagemRetorno("CNPJ $cnpj já existente! Use outro CNPJ para este cadastro.", "warning");
            };
            ?>

            <!-- BOTÃO VOLTAR -->
            <a href="empcadastro.php" class="btn btn-warning">VOLTAR</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="./js/darkmodetoggle.js"></script>
    <script src="./js/modals.js"></script>
</body>

</html>