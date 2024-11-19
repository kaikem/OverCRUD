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

//RECEBIMENTO DE IDEMPRESA
$idempresa = $_GET['idempresa'];
$empresa = [];

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idempresa)) {
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

            <!-- CONFIRMAÇÂO DA EDIÇÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                if ($idempresa) {
                    $sqlConsulta = $pdo->prepare("SELECT * FROM empresas WHERE idempresa='$idempresa'");
                    $sqlConsulta->execute();
                    if ($sqlConsulta->rowCount() > 0) {
                        $empresa = $sqlConsulta->fetch(PDO::FETCH_ASSOC);
                    } else {
                        mensagemRetorno("Empresa não existe no Banco de Dados!", "danger");
                        BotaoVoltar('emplista.php', "secondary");
                    };
                } else {
                    mensagemRetorno("Empresa não encontrada (atributo inexistente)!", "danger");
                    BotaoVoltar('emplista.php', "secondary");
                };
                ?>
            </div>

            <!-- FORMULÁRIO DE EDIÇÃO -->
            <div class="col-6 col-md-8 <?php if ($sqlConsulta->rowCount() == 0) echo 'd-none'; ?>">
                <form class="needs-validation" action="empeditar_action.php" method="POST" novalidate>
                    <fieldset>
                        <legend>DADOS DA EMPRESA</legend>
                        <input type="hidden" name="idempresa" value="<?= $empresa['idempresa'] ?>">
                        <!-- CNPJ -->
                        <div class="form-group">
                            <label for="cnpj" class="form-label">CNPJ:</label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj" maxlength="18" minlength="18"
                                data-mask="00.000.000/0000-00" value="<?= $empresa['cnpj'] ?>" required>
                            <div class="invalid-feedback" id="cnpjinvalido">CNPJ inválido!</div>
                        </div>

                        <!-- NOME -->
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" maxlength="64"
                                value="<?= $empresa['nome'] ?>" required>
                            <div class="invalid-feedback">O nome precisa ser preenchido</div>
                        </div>

                        <!-- NOME FANTASIA -->
                        <div class="form-group">
                            <label for="fantasia" class="form-label">Nome Fantasia:</label>
                            <input type="text" class="form-control" name="fantasia" id="fantasia" maxlength="64"
                                value="<?= $empresa['fantasia'] ?>" required>
                            <div class="invalid-feedback">O nome fantasia precisa ser preenchido</div>
                        </div>

                        <!-- TELEFONE -->
                        <div class="form-group">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="tel" class="form-control" name="telefone" id="telefone" maxlength="15"
                                minlength="14" data-mask="(00) 00000-0000" value="<?= $empresa['telefone'] ?>">
                            <div class="invalid-feedback">O telefone precisa ter entre 10 e 11 números</div>
                        </div>

                        <!-- ENDEREÇO -->
                        <div class="form-group">
                            <label for="endereco" class="form-label">Endereço:</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" maxlength="64"
                                value="<?= $empresa['endereco'] ?>" required>
                            <div class="invalid-feedback">O endereço precisa ser preenchido</div>
                        </div>

                        <!-- RESPONSÁVEL -->
                        <div class="form-group">
                            <label for="responsavel" class="form-label">Responsável:</label>
                            <input type="text" class="form-control" name="responsavel" id="responsavel" maxlength="64"
                                value="<?= $empresa['responsavel'] ?>" required>
                            <div class="invalid-feedback">O responsável precisa ser preenchido</div>
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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="./js/darkmodetoggle.js"></script>
        <script src="./js/modals.js"></script>
        <script src="./js/empMudarDisplay.js"></script>
        <script src="./js/empFormValidations.js"></script>
</body>

</html>