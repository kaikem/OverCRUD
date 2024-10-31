<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
    <title>OverCRUD - Usuários</title>
</head>

<body>
    <!-- BASE PHP -->
    <?php
    require_once 'config.php';

    //USUÁRIOS
    $listaUsu = [];
    $sqlConsultaUsu = $pdo->query("SELECT * FROM usuarios");

    if ($sqlConsultaUsu->rowCount() > 0) {
        $listaUsu = $sqlConsultaUsu->fetchAll(PDO::FETCH_ASSOC);
    };

    //EMPRESAS
    $listaEmp = [];
    $sqlConsultaEmp = $pdo->query("SELECT * FROM empresas");

    if ($sqlConsultaEmp->rowCount() > 0) {
        $listaEmp = $sqlConsultaEmp->fetchAll(PDO::FETCH_ASSOC);
    };
    ?>

    <!-- HTML -->
    <div class="container">
        <!-- ROW DA NAVBAR -->
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
                                            <li> <a href="emplista.php" class="dropdown-item">Consultar empresas</a>
                                            </li>
                                            <li> <a href="empcadastro.html" class="dropdown-item">Cadastrar Nova</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="navbar-item dropdown">
                                        <a href="#" class="nav-link fs-5 dropdown-toggle"
                                            data-bs-toggle="dropdown">Usuários</a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li> <a href="usulista.php" class="dropdown-item">Consultar usuários</a>
                                            </li>
                                            <li> <a href="usucadastro.php" class="dropdown-item">Cadastrar Novo</a>
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

        <!-- ROW DO CORPO -->
        <div class="row d-flex mt-5" id="appBody">
            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center display-6 my-5">LISTA DE USUÁRIOS</h1>
            <!-- LISTA -->
            <?php foreach ($listaUsu as $usuario) : ?>
                <div class="col-12 col-md-10 col-lg-6 col-xl-4 justify-content-center">
                    <!-- CARD -->
                    <div class="card my-3 mx-1 shadow" id="empcard" style="min-height: 38.5rem">
                        <!-- HEADER DO CARD -->
                        <div class="card-header d-flex text-center justify-content-center align-items-center"
                            style="min-height: 8rem; max-height: 8rem;">
                            <div class="d-flex flex-column">
                                <h4 class="text-uppercase" id="usunome"> <?= $usuario['nome']; ?> </h4>
                                <h6 class="text-secondary lead" id="usucpf"> CPF: <?= $usuario['cpf']; ?> </h6>

                                <?php
                                if ($usuario['status'] == 1) {
                                    echo "<h6 class='text-success'> Status: ATIVO</h6>";
                                } else {
                                    echo "<h6 class='text-danger'> Status: INATIVO</h6>";
                                };
                                ?>
                            </div>
                        </div>
                        <!-- CORPO DO CARD -->
                        <div class="card-body">
                            <div class="card-text">
                                <!-- LOGIN -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-right-to-bracket"></i>
                                    Login: </p>
                                <div class="mt-0 mb-2 display-6 fs-5"> <?= $usuario['login']; ?> </div>

                                <!-- TIPO -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-file-invoice"></i>
                                    Tipo de
                                    Conta: </p>
                                <div class="mt-0 mb-2 display-6 fs-5">
                                    <?php
                                    if ($usuario['tipo'] == 0) {
                                        echo "Comum";
                                    } else {
                                        echo "Admin";
                                    };
                                    ?>
                                </div>

                                <!-- TELEFONE -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-phone"></i> Telefone:
                                </p>
                                <div class="mt-0 mb-2 display-6 fs-5"> <?= $usuario['telefone']; ?> </div>

                                <!-- ENDEREÇO -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-location-dot"></i>
                                    Endereço: </p>
                                <div class="mt-0 mb-2 display-6 fs-5"> <?= $usuario['endereco']; ?> </div>

                                <!-- CNH -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-id-card"></i>
                                    CNH: </p>
                                <div class="mt-0 mb-2 display-6 fs-5">
                                    <?php
                                    if ($usuario['cnh'] == "" || $usuario['cnh'] == null) {
                                        echo "- NÃO POSSUI -";
                                    } else {
                                        echo $usuario['cnh'];
                                    }
                                    ?>
                                </div>

                                <!-- CARRO -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-car"></i>
                                    Carro: </p>
                                <div class="mt-0 mb-2 display-6 fs-5">
                                    <?php
                                    if ($usuario['carro'] == "" || $usuario['carro'] == null) {
                                        echo "- NENHUM -";
                                    } else {
                                        echo $usuario['carro'];
                                    }
                                    ?>
                                </div>

                                <!-- EMPREGADO EM -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-briefcase"></i>
                                    Empregado em: </p>
                                <div class="mt-0 mb-2 display-6 fs-5">
                                    <?php
                                    for ($i = 0; $i < count($listaEmp); $i++) {
                                        if ($usuario['idempregadoem'] == $listaEmp[$i]['idempresa']) {
                                            echo $listaEmp[$i]['nome'];
                                        };
                                    };
                                    ?>
                                </div>

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
    <script src="./js/modals.js"></script>
</body>

</html>