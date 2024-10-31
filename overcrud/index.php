<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>OverCRUD - Login</title>
</head>

<body>
    <!-- DARKMODE -->
    <div class="container mt-2 mb-4 d-flex justify-content-end">
        <div class="row">
            <div class="btn-group btn-group-sm">
                <button class="btn btn-secondary rounded-start-5 darkmodebtn" data-bs-theme-value="dark">Dark</button>
                <button class="btn btn-light rounded-end-5 darkmodebtn" data-bs-theme-value="light">Light</button>
            </div>
        </div>
    </div>

    <!-- LOGO -->
    <div class="row d-flex justify-content-center mb-5">
        <img src="./img/logo_white2.png" class="loginlogo" alt="Overdrive Softwares e Consultoria">
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-6 col-sm-8 col-md-4">
                <!-- LOGIN CARD -->
                <div class="card shadow" id="cardlogin">
                    <div class="card-body">
                        <h5 class="card-title text-center display-6">LOGIN</h5>
                        <div class="card-text">
                            <!-- FORM -->
                            <form action="loginValidation.php" class="mt-4" method="POST">
                                <!-- LOGIN -->
                                <div class="input-group mb-3">
                                    <i class="input-group-text fa-solid fa-right-to-bracket"></i>
                                    <input type="text" class="form-control form-control-sm" name="login" id="inputlogin"
                                        minlength="6" maxlength="32" placeholder="Login" autofocus required>
                                </div>

                                <!-- SENHA -->
                                <div class="input-group mb-4">
                                    <i class="input-group-text fa-solid fa-lock"></i>
                                    <input type="password" class="form-control form-control-sm" name="senha"
                                        id="inputsenha" minlength="8" maxlength="32" placeholder="Senha" required>
                                </div>

                                <!-- ERRO -->
                                <div
                                    class="d-none <?php $loginValido == false ? 'd-flex' : 'd-none'; ?> alert alert-danger">
                                    Login e/ou senha inválidos!
                                </div>

                                <!-- BUTTONS -->
                                <div class="d-flex mt-3 justify-content-center gap-3">
                                    <button type="submit" class="btn btn-primary loginbtn"> Entrar </button>
                                    <button type="button" class="btn btn-secondary loginbtn"
                                        onclick="reset()">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="./js/darkmodetoggle.js"></script>
</body>

</html>