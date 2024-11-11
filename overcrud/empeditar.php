<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//CONEXÃO COM BD
require_once 'config.php';

//FUNÇÃO DE MENSAGENS
require_once 'support.php';

//TABELAS DO BD
require_once 'sqltables.php';

//RECEBIMENTO DE IDEMPRESA
$idempresa = $_GET['idempresa'];
$empresa = [];
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
    <title>OverCRUD - Editar Empresa</title>
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
            <h1 class="text-center text-primary display-6 my-5">EDITAR EMPRESA</h1>

            <?php
            if ($idempresa) {
                $sqlConsulta = $pdo->prepare("SELECT * FROM empresas WHERE idempresa='$idempresa'");
                $sqlConsulta->execute();
                if ($sqlConsulta->rowCount() > 0) {
                    $empresa = $sqlConsulta->fetch(PDO::FETCH_ASSOC);
                } else {
                    mensagemRetorno("Empresa não existe no Banco de Dados!", "danger");
                    BotaoVoltar('emplista.php');
                };
            } else {
                mensagemRetorno("Empresa não encontrada (atributo inexistente)!", "danger");
                BotaoVoltar('emplista.php');
            };
            ?>

            <!-- FORMULÁRIO DE EDIÇÃO -->
            <div class="col-6 col-md-8 <?php if ($sqlConsulta->rowCount() == 0) echo 'd-none'; ?>">
                <form action="empeditar_action.php" method="POST">
                    <fieldset>
                        <legend>DADOS DA EMPRESA</legend>
                        <input type="hidden" name="idempresa" value="<?= $empresa['idempresa'] ?>">
                        <!-- CNPJ -->
                        <div class="form-group">
                            <label for="cnpj" class="form-label">CNPJ:</label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj" maxlength="18" minlength="18"
                                onkeydown="handleCnpj(event)" value="<?= $empresa['cnpj'] ?>" required>
                        </div>

                        <!-- NOME -->
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" maxlength="64"
                                value="<?= $empresa['nome'] ?>" required>
                        </div>

                        <!-- NOME FANTASIA -->
                        <div class="form-group">
                            <label for="fantasia" class="form-label">Nome Fantasia:</label>
                            <input type="text" class="form-control" name="fantasia" id="fantasia" maxlength="64"
                                value="<?= $empresa['fantasia'] ?>">
                        </div>

                        <!-- TELEFONE -->
                        <div class="form-group">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="tel" class="form-control" name="telefone" id="telefone" maxlength="15"
                                minlength="14" onkeydown="handlePhone(event)" value="<?= $empresa['telefone'] ?>">
                        </div>

                        <!-- ENDEREÇO -->
                        <div class="form-group">
                            <label for="endereco" class="form-label">Endereço:</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" maxlength="64"
                                value="<?= $empresa['endereco'] ?>">
                        </div>

                        <!-- RESPONSÁVEL -->
                        <div class="form-group">
                            <label for="responsavel" class="form-label">Responsável:</label>
                            <input type="text" class="form-control" name="responsavel" id="responsavel" maxlength="64"
                                value="<?= $empresa['responsavel'] ?>" required>
                        </div>

                    </fieldset>

                    <!-- BUTTONS -->
                    <div class="form-group my-3 text-center">
                        <a href="emplista.php" class="btn btn-secondary loginbtn">VOLTAR</a>
                        <input type="submit" class="btn btn-primary loginbtn" value="ATUALIZAR">
                    </div>
                </form>
            </div>

            <!-- FOOTER -->
            <?php require_once 'footer.php' ?>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
        <script src="./js/inputmasks.js"></script>
        <script src="./js/darkmodetoggle.js"></script>
        <script src="./js/modals.js"></script>
        <script src="./js/empMudarDisplay.js"></script>
</body>

</html>