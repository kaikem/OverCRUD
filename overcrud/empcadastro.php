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

        <!-- CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">
            <div class="col-8 col-sm-10 col-md-8 col-lg-6 mt-5">

                <!-- TÍTULO DA SEÇÃO -->
                <h1 class="text-center text-primary display-6 mb-5">CADASTRO DE EMPRESAS</h1>

                <!-- FORMULÁRIO -->
                <form class="needs-validation" action="empcadastro_action.php" method="POST" id="formempcadastro"
                    novalidate>
                    <!-- FIELDSET GERAL -->
                    <fieldset>
                        <legend>DADOS DA EMPRESA</legend>
                        <!-- CNPJ -->
                        <div class="form-group">
                            <label for="cnpj" class="form-label"><i class="fa-solid fa-tree-city"></i> CNPJ:</label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj" maxlength="18" minlength="18"
                                onkeydown="handleCnpj(event)" required>
                            <div class="invalid-feedback">CNPJ inválido!</div>
                        </div>

                        <!-- NOME -->
                        <div class="form-group">
                            <label for="nome" class="form-label"><i class="fa-solid fa-building"></i> Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" maxlength="64" required>
                            <div class="invalid-feedback">O nome precisa ser preenchido</div>
                        </div>

                        <!-- NOME FANTASIA -->
                        <div class="form-group">
                            <label for="fantasia" class="form-label"><i class="fa-solid fa-shop"></i> Nome
                                Fantasia:</label>
                            <input type="text" class="form-control" name="fantasia" id="fantasia" maxlength="64"
                                required>
                            <div class="invalid-feedback">O nome fantasia precisa ser preenchido</div>
                        </div>

                        <!-- TELEFONE -->
                        <div class="form-group">
                            <label for="telefone" class="form-label"><i class="fa-solid fa-phone"></i> Telefone:</label>
                            <input type="tel" class="form-control" name="telefone" id="telefone" maxlength="15"
                                minlength="14" onkeydown="handlePhone(event)">
                            <div class="invalid-feedback">O telefone precisa ter entre 10 e 11 números</div>
                        </div>

                        <!-- ENDEREÇO -->
                        <div class="form-group">
                            <label for="endereco" class="form-label"><i class="fa-solid fa-location-dot"></i>
                                Endereço:</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" maxlength="64"
                                required>
                            <div class="invalid-feedback">O endereço precisa ser preenchido</div>
                        </div>

                        <!-- RESPONSÁVEL -->
                        <div class="form-group">
                            <label for="responsavel" class="form-label"><i class="fa-solid fa-user-tie"></i>
                                Responsável:</label>
                            <input type="text" class="form-control" name="responsavel" id="responsavel" maxlength="64"
                                required>
                            <div class="invalid-feedback">O responsável precisa ser preenchido</div>
                        </div>
                    </fieldset>

                    <!-- BUTTONS -->
                    <div class="form-group my-3 text-center">
                        <!-- <a href="emplista.php" class="btn btn-danger loginbtn">VOLTAR</a> -->
                        <button type="button" class="btn btn-secondary loginbtn" onclick="reset()">LIMPAR</button>
                        <input type="submit" class="btn btn-primary loginbtn" value="ENVIAR">
                    </div>
                </form>
            </div>
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
    <script src="./js/empFormValidations.js"></script>
</body>

</html>