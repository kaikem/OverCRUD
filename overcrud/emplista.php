<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
    <title>OverCRUD - Empresas</title>
</head>

<body>
    <!-- BASE PHP -->
    <?php
    require_once 'config.php';

    //EMPRESAS
    $listaEmp = [];
    $sqlConsultaEmp = $pdo->query("SELECT * FROM empresas");

    if ($sqlConsultaEmp->rowCount() > 0) {
        $listaEmp = $sqlConsultaEmp->fetchAll(PDO::FETCH_ASSOC);
    };
    ?>

    <!-- HTML -->
    <div class="container">
        <div class="row" id="navbarTop">
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-sm fixed-top text-bg-secondary" style="--bs-bg-opacity: .95;">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- COLUNA 01 -->
                        <div class="col-md-4 d-none d-md-flex">
                            <!-- LOGOTIPO -->
                            <a href="home.html" class="navbar-brand p-0"><img src="./img/logo_white3.png" class=""
                                    alt="OverCRUD" style="width: 75%;"></a>
                        </div>

                        <!-- COLUNA 02 -->
                        <div class="col-md-6">
                            <!-- HAMBURUER BUTTON -->
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                                data-bs-target="#navbarMain">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- LINKS NAVBAR -->
                            <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
                                <ul class="navbar-nav gap-3">
                                    <li class="navbar-item dropdown">
                                        <a href="#" class="nav-link fs-5 dropdown-toggle"
                                            data-bs-toggle="dropdown">Empresas</a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li> <a href="#" class="dropdown-item">Consultar empresas</a> </li>
                                            <li> <a href="empcadastro.html" class="dropdown-item">Cadastrar Nova</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="navbar-item dropdown">
                                        <a href="#" class="nav-link fs-5 dropdown-toggle"
                                            data-bs-toggle="dropdown">Usuários</a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li> <a href="#" class="dropdown-item">Consultar usuários</a> </li>
                                            <li> <a href="usucadastro.html" class="dropdown-item">Cadastrar Novo</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="navbar-item">
                                        <a href="#" class="nav-link fs-5">Contato</a>
                                    </li>
                                    <li class="navbar-item">
                                        <a href="#" class="nav-link fs-5">Sobre</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- COLUNA 03 -->
                        <div class="col-md-2 d-none d-md-flex align-items-center justify-content-end">
                            <!-- DARKMODE -->
                            <div class="btn-group btn-grup-sm">
                                <button class="btn btn-dark rounded-start-5 darkmodebtnint"
                                    data-bs-theme-value="dark">Dark</button>
                                <button class="btn btn-light rounded-end-5 darkmodebtnint"
                                    data-bs-theme-value="light">Light</button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">
            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center display-6 my-5">LISTA DE EMPRESAS</h1>
            <!-- LISTA -->
            <?php foreach ($listaEmp as $empresa) : ?>
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="card my-2 mx-2 shadow" id="empcard" style="min-height: 14rem;">
                    <div class="card-header text-center">
                        <h5> <?= $empresa['nome']; ?> </h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p class="mb-0 fw-bolder"> Nome Fantasia: </p>
                            <p> <?= $empresa['fantasia']; ?> </p>
                            <p class="mb-0 fw-bolder"> CNPJ: </p>
                            <p class="mb-0"> <?= $empresa['cnpj']; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="./js/darkmodetoggle.js"></script>
</body>

</html>