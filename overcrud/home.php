<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//CONEXÃO COM BD
require_once './config/databases/config.php';

//TABELAS DO BD
require_once './src/databases/sqltables.php';
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link href="./css/style.css" rel="stylesheet" />
    <title>OverCRUD</title>
</head>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbarTop">
            <?php require_once 'navbarTop.php'; ?>
        </div>

        <!-- ROW DO TÍTULO -->
        <div class="row mt-5" id="appBody">
            <div class="col mt-5">
                <!-- TÍTULO DA SEÇÃO -->
                <h1 class="display-5 text-primary">Seja bem-vindo(a), <b><?= $nomeUsu ?></b>!</h1>
            </div>
        </div>

        <!-- ROW DAS ESTATÍSTICAS -->
        <div class="row justify-content-center" id="appBody">

            <div class="text-center mt-5 mb-3">
                <!-- SUBTÍTULO -->
                <h2 class="display-6">Estatísticas do OverCRUD:</h2>
            </div>

            <!-- CARD EMPRESAS -->
            <div class="col-12 col-md-10 col-lg-6 justify-content-center" id="homecards">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b class="text-info fs-4">EMPRESAS CADASTRADAS</b>
                        <span class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2"><?= (count($listaEmp) - 1) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b class="text-info fs-4">USUÁRIOS CADASTRADOS</b>
                        <span class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2"><?= count($listaUsu) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b class="text-info fs-4">USUÁRIOS COMUNS</b>
                        <span class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2"><?= count($listaUsu) - count($listaUsuAdmins) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b class="text-info fs-4">USUÁRIOS ADMINS</b>
                        <span class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2"><?= count($listaUsuAdmins) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b class="text-info fs-4">USUÁRIOS ATIVOS</b>
                        <span class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2"><?= count($listaUsuAtivos) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b class="text-info fs-4">USUÁRIOS INATIVOS</b>
                        <span class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2"><?= count($listaUsu) - count($listaUsuAtivos) ?></span>
                    </li>
                </ul>

            </div>

        </div>

        <!-- FOOTER -->
        <?php require_once 'footer.php' ?>

        <!-- SCRIPTS JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
        <script src="./js/darkmodetoggle.js"></script>
</body>

</html>