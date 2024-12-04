<?php
//PATHING
require_once "./resources/pathing.php";

//VERIFICAÇÃO DE SESSÃO
//require_once "$rootOvercrud/validations/session_validation.php";

//LIMPEZA DE USUÁRIO
session_start();
unset($_SESSION['cpf']);
unset($_SESSION['senha']);
unset($_SESSION['tipo']);
unset($_SESSION['nome']);

//ARRAYS DE DADOS
require_once "$rootOvercrud/resources/listas.php";

//FUNÇÕES DE SUPORTE
require_once "$rootOvercrud/resources/support.php";
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<!-- HEAD -->
<?php
require_once "$rootOvercrud/partials/head.php";
head('- Login');
?>

<body>
    <!-- DARKMODE 
    <div class="container mt-2 mb-4 d-flex justify-content-end">
        <div class="row">
            <div class="btn-group btn-group-sm">
                <button class="btn btn-secondary rounded-start-5 darkmodebtn" data-bs-theme-value="dark">Dark</button>
                <button class="btn btn-light rounded-end-5 darkmodebtn" data-bs-theme-value="light">Light</button>
            </div>
        </div>
    </div>
    -->


    <div class="container">
        <!-- LOGO -->
        <div class="row d-flex justify-content-center mb-5 mt-4">
            <img src="./img/logo_white4.png" class="loginlogo" alt="Overdrive Softwares e Consultoria">
        </div>

        <!-- TÍTULO & CARD DE LOGIN -->
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-8 col-sm-10 col-md-8 col-lg-5">

                <!-- TÍTULO -->
                <div class="row d-flex mb-2 text-center">
                    <h1 class="display-5 fs-1 lead">SISTEMA DE GESTÃO</h1>
                </div>

                <div class="row d-flex mb-2 justify-content-center align-items-center">
                    <!-- LOGIN CARD -->
                    <div class="card shadow" id="cardlogin">
                        <div class="card-body">
                            <h5 class="card-title text-center fs-2">FAÇA SEU LOGIN</h5>
                            <div class="card-text">
                                <!-- FORM -->
                                <form action="./validations/login_validation.php" class="mt-4"
                                    style="background-color: none;" method="POST">
                                    <!-- LOGIN -->
                                    <div class="input-group input-group-lg mb-3">
                                        <i class="input-group-text fa-solid fa-right-to-bracket p-3"></i>
                                        <input type="text" class="form-control form-control-sm" name="cpf" id="inputcpf"
                                            minlength="14" maxlength="14" placeholder="CPF" data-mask="000.000.000-00"
                                            autofocus required>
                                    </div>

                                    <!-- SENHA -->
                                    <div class="input-group input-group-lg mb-4">
                                        <i class="input-group-text fa-solid fa-lock p-3"></i>
                                        <input type="password" class="form-control form-control-sm" name="senha"
                                            id="inputsenha" minlength="8" maxlength="16" placeholder="Senha" required>
                                    </div>

                                    <!-- MENSAGEM DE ERRO -->
                                    <div class='<?= $_SESSION['valido'] == "erro" ? 'd-flex' : 'd-none' ?> text-center'
                                        id='errologin'>
                                        <?php mensagemRetorno("CPF/Senha incorretos! Por favor, tente novamente.", "danger") ?>
                                    </div>
                                    <!-- BUTTONS -->
                                    <div class="row d-flex justify-content-center m-auto" id="loginbtnrow">
                                        <button type="submit" class="btn btn-primary loginbtn m-2"> <b
                                                class="fs-5">ENTRAR</b> </button>
                                        <!-- <button type="button" class="btn btn-secondary loginbtn" 
                                            onclick="reset()">Cancelar</button> -->
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- FOOTER -->
        <?php require_once "$rootOvercrud/partials/footer.php" ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="./js/darkmodetoggle.js"></script>
</body>

</html>