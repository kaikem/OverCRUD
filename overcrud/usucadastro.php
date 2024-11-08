<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    header("Location: index.php");
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
    <title>OverCRUD - Cadastrar Usuário</title>
</head>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbarTop">
            <?php require_once 'navbarTop.php' ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">
            <div class="col-8 col-sm-10 col-md-8 col-lg-6 mt-5">
                <!-- TÍTULO DA SESSÃO -->
                <h1 class="text-center text-primary display-6 mb-5">CADASTRO DE USUÁRIOS</h1>
                <!-- FORMULÁRIO -->
                <form action="usucadastro_action.php" method="POST">
                    <!-- FIELDSET CONTA -->
                    <fieldset>
                        <legend>DADOS DA CONTA</legend>
                        <!-- CPF -->
                        <div class="form-group">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" maxlength="14" minlength="14"
                                onkeydown="handleCpf(event)" required>
                        </div>

                        <!-- SENHA -->
                        <div class="form-group">
                            <label for="password" class="form-label">Senha:</label>
                            <input type="password" class="form-control" name="password" id="password" maxlength="16"
                                minlength="8" required>
                        </div>

                        <!-- TIPO -->
                        <div class="form-group">
                            <label for="tipo" class="form-label">Tipo:</label>
                            <select class="form-select" name="tipo" id="tipo">
                                <option value="0">Comum</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>

                    </fieldset>

                    <!-- FIELDSET PESSOAIS -->
                    <fieldset>
                        <legend>DADOS PESSOAIS</legend>
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
                            <input type="text" class="form-control" name="endereco" id="endereco" maxlength="64"
                                required>
                        </div>

                        <!-- CNH -->
                        <div class="form-group">
                            <label for="cnh" class="form-label">CNH:</label>
                            <input type="text" class="form-control" name="cnh" id="cnh" maxlength="11" minlength="9">
                        </div>

                        <!-- CARRO -->
                        <div class="form-group">
                            <label for="carro" class="form-label">Carro:</label>
                            <input type="text" class="form-control" name="carro" id="carro" maxlength="32">
                        </div>
                    </fieldset>

                    <!-- FIELDSET EMPREGADO -->
                    <fieldset>
                        <!-- EMPREGADO EM -->
                        <legend>EMPREGADO EM</legend>
                        <div class="form-group">
                            <label for="empregadoem" class="form-label">Empresa:</label>
                            <select class="form-select" name="empregadoem" id="empregadoem">
                                <?php foreach ($listaEmp as $empresa): ?>
                                    <option value="<?= $empresa['idempresa'] ?>"> <?= $empresa['nome'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </fieldset>

                    <!-- BUTTONS -->
                    <div class="form-group my-3 text-center align-items-center">
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
    <script src="./js/inputValidations.js"></script>
</body>

</html>