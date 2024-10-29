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
    <!-- BASE PHP -->
    <?php
    //IMPORTAÇÕES
    require_once 'config.php';
    require_once 'support.php';

    //RECEBIMENTO DE DADOS DO FORMULÁRIO
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $cnh = $_POST['cnh'];
    $carro = $_POST['carro'];
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

        <!-- ROW DO CORPO -->
        <div class="row d-flex mt-5" id="appBody">
            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center display-6 my-5">CADASTRO DE USUÁRIOS</h1>
            <!-- VERIFICAÇÃO DE CAMPO CNPJ + INSERÇÃO NO BD -->
            <?php
            $sqlVerif = $pdo->prepare("SELECT * FROM usuarios WHERE `cpf`='$cpf'");
            $sqlVerif->execute();

            if ($sqlVerif->rowCount() === 0) {
                $sqlInsert = $pdo->prepare("INSERT INTO usuarios (nome, telefone, endereco, login, senha, cpf, cnh, carro) VALUES ('$nome', '$telefone', '$endereco', '$login', '$senha', '$cpf', '$cnh', '$carro')");

                if ($sqlInsert->execute()) {
                    mensagemRetorno("Dados de $nome (CPF $cpf) cadastrados com sucesso!", "success");
                } else {
                    mensagemRetorno("ERRO: Dados de $nome (CPF $cpf) não foram cadastrados...", "danger");
                };
            } else {
                mensagemRetorno("CPF $cpf já existente! Use outro CPF para este cadastro.", "warning");
            };
            ?>

            <!-- BOTÃO VOLTAR -->
            <a href="usucadastro.html" class="btn btn-warning">VOLTAR</a>
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