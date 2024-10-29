<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
    <title>OverCRUD - Cadastrar Usuário</title>
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

    <!-- NAVBAR -->
    <div class="container">
        <div class="row" id="navbarTop">
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-sm fixed-top text-bg-secondary" style="--bs-bg-opacity: .95;">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- COLUNA 01 -->
                        <div class="col-md-4 d-none d-md-flex">
                            <!-- LOGOTIPO -->
                            <a href="home.html" class="navbar-brand p-0"><img src="./img/logo_white3.png" class=""  alt="OverCRUD" style="width: 75%;"></a>
                        </div>                        
                        
                        <!-- COLUNA 02 -->
                        <div class="col-md-6">
                            <!-- HAMBURUER BUTTON -->
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <!-- LINKS NAVBAR -->
                            <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
                                <ul class="navbar-nav gap-3">
                                    <li class="navbar-item dropdown">
                                        <a href="#" class="nav-link fs-5 dropdown-toggle" data-bs-toggle="dropdown">Empresas</a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li> <a href="emplista.php" class="dropdown-item">Consultar empresas</a> </li>
                                            <li> <a href="empcadastro.html" class="dropdown-item">Cadastrar Nova</a> </li>
                                        </ul>
                                    </li>
                                    <li class="navbar-item dropdown">
                                        <a href="#" class="nav-link fs-5 dropdown-toggle" data-bs-toggle="dropdown">Usuários</a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li> <a href="usulista.php" class="dropdown-item">Consultar usuários</a> </li>
                                            <li> <a href="usucadastro.php" class="dropdown-item">Cadastrar Novo</a> </li>
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
                                <button class="btn btn-dark rounded-start-5 darkmodebtnint" data-bs-theme-value="dark">Dark</button>
                                <button class="btn btn-light rounded-end-5 darkmodebtnint" data-bs-theme-value="light">Light</button>
                            </div>                            
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">
            <div class="col-8 col-sm-10 col-md-8 col-lg-6 mt-5">
                <!-- TÍTULO DA SEÇÃO -->
                <h1 class="text-center display-6 mb-5">CADASTRO DE USUÁRIOS</h1>  
                <!-- FORMULÁRIO -->      
                <form action="usucadastro_action.php" method="POST">
                    <div class="form-group">
                        <label for="login" class="form-label">Login:</label>
                        <input type="text" class="form-control" name="login" id="login" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <select class="form-select" name="tipo" id="tipo">
                                <option value="0">Comum</option>
                                <option value="1">Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="tel" class="form-control" name="telefone" id="telefone" maxlength="15" onkeyup="handlePhone(event)">
                    </div>

                    <div class="form-group">
                        <label for="endereco" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" name="endereco" id="endereco">
                    </div>


                    <div class="form-group">
                        <label for="cpf" class="form-label">CPF:</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" maxlength="14" onkeyup="handleCpf(event)" required>
                    </div>

                    <div class="form-group">
                        <label for="cnh" class="form-label">CNH:</label>
                        <input type="text" class="form-control" name="cnh" id="cnh">
                    </div>

                    <div class="form-group">
                        <label for="carro" class="form-label">Carro:</label>
                        <input type="text" class="form-control" name="carro" id="carro">
                    </div>

                    <div class="form-group">
                            <label for="empregadoem" class="form-label">Empresa:</label>
                            <select class="form-select" name="empregadoem" id="empregadoem">
                                <option value="0">- NENHUMA -</option>
                            <?php foreach($listaEmp as $empresa): ?>
                                <option value="<?= $empresa['idempresa']?>"> <?= $empresa['nome']?> </option>
                            <?php endforeach;?>
                            </select>
                    </div>

                    <div class="form-group my-3">
                        <input type="submit" class="btn btn-success loginbtn" value="ENVIAR">
                        <a href="home.html" class="btn btn-warning loginbtn">VOLTAR</a>
                    </div>
                </form>
            </div>
        </div>        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/inputmasks.js"></script>
    <script src="./js/darkmodetoggle.js"></script>
</body>
</html>