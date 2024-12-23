<?php
//PATHING
require_once "./resources/pathing.php";
$voltar = ".";

//VERIFICAÇÃO DE SESSÃO
require_once "$rootOvercrud/validations/session_validation.php";
if ($_SESSION['valido'] == "erro") {
    logoutPagina($voltar);
}

//CONEXÃO COM BD
require_once "$rootOvercrud/components/ConexaoBD.php";

//ARRAYS DE DADOS
require_once "$rootOvercrud/resources/listas.php";
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<!-- HEAD -->
<?php
require_once "$rootOvercrud/partials/head.php";
head('', $voltar);
?>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbartop">
            <?php
            require_once "$rootOvercrud/partials/navbartop.php";
            navbarTop($voltar, $linksAdm);
            ?>
        </div>

        <!-- ROW DO TÍTULO -->
        <div class="row mt-5" id="appBody">
            <div class="col mt-5">
                <!-- TÍTULO DA SEÇÃO -->
                <h1 class="display-5 text-primary">Seja bem-vindo(a),
                    <b><?= $nomeUsu ?></b>!
                </h1>
            </div>
        </div>

        <!-- ROW DAS ESTATÍSTICAS -->
        <div class="row justify-content-center" id="appBody">

            <div class="text-center mt-5 mb-3">
                <!-- SUBTÍTULO -->
                <h2 class="display-6">Estatísticas do OverCRUD:</h2>
            </div>

            <!-- CARD EMPRESAS -->
            <div class="col-10 col-md-6 col-lg-4 justify-content-center d-flex" id="homecards">
                <ul class="list-group border border-2 border-info my-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                        <b class="text-info fs-5 me-2">EMPRESAS CADASTRADAS</b>
                        <span
                            class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2 text-white"><?= (count($listaEmp) - 1) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                        <b class="text-info fs-5 me-2">USUÁRIOS CADASTRADOS</b>
                        <span
                            class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2 text-white"><?= count($listaUsu) ?></span>
                    </li>
                </ul>
            </div>
            <div class="col-10 col-md-6 col-lg-4 justify-content-center d-flex" id="homecards">
                <ul class="list-group border border-2 border-info my-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                        <b class="text-info fs-5 me-2">USUÁRIOS COMUNS</b>
                        <span
                            class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2 text-white"><?= count($listaUsu) - count($listaUsuAdmins) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                        <b class="text-info fs-5 me-2">USUÁRIOS ADMINS</b>
                        <span
                            class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2 text-white"><?= count($listaUsuAdmins) ?></span>
                    </li>
                </ul>
            </div>
            <div class="col-10 col-md-6 col-lg-4 justify-content-center d-flex" id="homecards">
                <ul class="list-group border border-2 border-info my-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                        <b class="text-info fs-5 me-2">USUÁRIOS ATIVOS</b>
                        <span
                            class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2 text-white"><?= count($listaUsuAtivos) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                        <b class="text-info fs-5 me-2">USUÁRIOS INATIVOS</b>
                        <span
                            class="fw-bolder fs-1 bg-primary px-4 py-1 rounded-1 mb-2 text-white"><?= count($listaUsu) - count($listaUsuAtivos) ?></span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- FOOTER -->
        <?php
        require_once "$rootOvercrud/partials/footer.php";
        footer($voltar);
        ?>

        <!-- SCRIPTS JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
        <script src="./js/darkmodetoggle.js"></script>
</body>

</html>