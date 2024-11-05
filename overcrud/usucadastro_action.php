<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//CONEXÃO COM BD
require_once 'config.php';

//TABELAS DO BD
require_once 'sqltables.php';

//FUNÇÕES DE SUPORTE
require_once 'support.php';
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
    <title>OverCRUD - Cadastrar Usuário</title>
</head>

<body>
    <?php
    //PHP - RECEBIMENTO DE DADOS DO FORMULÁRIO
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $cpf = $_POST['cpf'];
    $cnh = $_POST['cnh'];
    $carro = $_POST['carro'];
    $empregadoEm = intval($_POST['empregadoem']);
    $tipo = $_POST['tipo'];
    $status = 0;

    if ($empregadoEm != 0) {
        $status = 1;
    };
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
            <h1 class="text-center display-6 my-5">CADASTRO DE USUÁRIOS</h1>
            <!-- VERIFICAÇÃO DE CAMPO CPF + INSERÇÃO NO BD -->
            <?php
            $sqlVerif = $pdo->prepare("SELECT * FROM usuarios WHERE `cpf`='$cpf'");
            $sqlVerif->execute();

            if ($sqlVerif->rowCount() === 0) {
                $sqlInsert = $pdo->prepare("INSERT INTO usuarios (nome, telefone, endereco, login, password, cpf, cnh, carro, tipo, status, idempregadoem) VALUES ('$nome', '$telefone', '$endereco', '$login', '$passwordHash', '$cpf', '$cnh', '$carro', '$tipo', '$status', '$empregadoEm')");

                if ($sqlInsert->execute()) {
                    mensagemRetorno($passwordHash, "info");
                    mensagemRetorno("Dados de $nome (CPF $cpf) cadastrados com sucesso!", "success");
                } else {
                    mensagemRetorno("ERRO: Dados de $nome (CPF $cpf) não foram cadastrados...", "danger");
                };
            } else {
                mensagemRetorno("CPF $cpf já existente! Use outro CPF para este cadastro.", "warning");
            };
            ?>

            <!-- BOTÃO VOLTAR -->
            <a href="usucadastro.php" class="btn btn-warning">VOLTAR</a>
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