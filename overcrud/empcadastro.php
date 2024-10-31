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
    <!-- HTML -->
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbarTop">
            <?php require_once 'navbarTop.php' ?>
        </div>

        <!-- CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">
            <div class="col-8 col-sm-10 col-md-8 col-lg-6 mt-5">
                <!-- TÍTULO DA SEÇÃO -->
                <h1 class="text-center display-6 mb-5">CADASTRO DE EMPRESAS</h1>
                <!-- FORMULÁRIO -->
                <form action="empcadastro_action.php" method="POST">
                    <!-- NOME -->
                    <div class="form-group">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" maxlength="64" required>
                    </div>

                    <!-- TELEFONE -->
                    <div class="form-group">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="tel" class="form-control" name="telefone" id="telefone" maxlength="15"
                            minlength="14" onkeydown="handlePhone(event)">
                    </div>

                    <!-- ENDEREÇO -->
                    <div class="form-group">
                        <label for="endereco" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" name="endereco" id="endereco" maxlength="64" required>
                    </div>

                    <!-- NOME FANTASIA -->
                    <div class="form-group">
                        <label for="fantasia" class="form-label">Nome Fantasia:</label>
                        <input type="text" class="form-control" name="fantasia" id="fantasia" maxlength="64" required>
                    </div>

                    <!-- CNPJ -->
                    <div class="form-group">
                        <label for="cnpj" class="form-label">CNPJ:</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj" maxlength="18" minlength="18"
                            onkeydown="handleCnpj(event)" required>
                    </div>

                    <!-- RESPONSÁVEL -->
                    <div class="form-group">
                        <label for="responsavel" class="form-label">Responsável:</label>
                        <input type="text" class="form-control" name="responsavel" id="responsavel" maxlength="64"
                            required>
                    </div>

                    <div class="form-group my-3">
                        <input type="submit" class="btn btn-success loginbtn" value="ENVIAR">
                        <a href="home.php" class="btn btn-warning loginbtn">VOLTAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="./js/inputmasks.js"></script>
    <script src="./js/darkmodetoggle.js"></script>
</body>

</html>