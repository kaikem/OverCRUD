<?php
//PATHING
require_once "./resources/pathing.php";
$voltar = ".";

//VERIFICAÇÃO DE SESSÃO
require_once "$voltar/validations/session_validation.php";
if ($_SESSION['valido'] == "erro") {
    logoutPagina($voltar);
};
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<!-- HEAD -->
<?php
require_once "$rootOvercrud/partials/head.php";
head('- Sobre', $voltar);
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

        <!-- ROW DO CORPO -->
        <div class="row d-flex mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5" id="sessiontitle">SOBRE O OVERCRUD</h1>

            <div class="col">
                <p class="">Sistema CRUD <i>(Create, Read, Update, and Delete)</i> de gerenciamento de funcionários e
                    empresas que possibilita o cadastro, exclusão, alteração e consulta de informações.</p>
                <p>Dentre as principais funcionalidades desta aplicação estão:</p>

                <!-- LISTA -->
                <ul>
                    <li><i class="fa-solid fa-magnifying-glass text-info"></i> <b class="text-info">CONSULTA DE
                            DADOS:</b>
                        Consulta rápida
                        e
                        ordenada de
                        funcionários
                        e empresas cadastradas.</li>
                    <li><i class="fa-regular fa-pen-to-square text-info"></i> <b class="text-info">EDIÇÃO DE
                            REGISTROS:</b> Edição de
                        dados com atualização em
                        tempo real.</li>
                    <li><i class="fa-solid fa-plus text-info"></i> <b class="text-info">ADIÇÃO E REMOÇÃO DE
                            CADASTROS:</b> Adição e remoção
                        de
                        cadastros para ambas categorias.</li>
                    <li><i class="fa-regular fa-user text-info"></i> <b class="text-info">CONTROLE DE PERMISSÕES:</b>
                        Dois níveis de
                        acesso para melhor atribuição.</li>
                    <li><i class="fa-solid fa-database text-info"></i></i> <b class="text-info">PERSISTÊNCIA DE
                            DADOS:</b>
                        Dados salvos em bancos de dados permanentes.</li>
                </ul>

                <!-- PARCERIA -->
                <p>Este software foi desenvolvido através de uma parceria entre as empresas:</p>
                <div id="imagensparceria" class="text-center">
                    <img src="./img/logo_footer.png" style="width: 30%;" alt="Overdrive Softwares e Consultoria">
                    <img src="./img/plus.png" style="width: 5%;" class="mx-5" alt="+">
                    <img src="./img/sh_logo.png" style="width: 15%;" alt="Shangai Geek Gamer Store">
                </div>
            </div>



        </div>

        <!-- FOOTER -->
        <?php
        require_once "$rootOvercrud/partials/footer.php";
        footer($voltar);
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./js/darkmodetoggle.js"></script>
</body>

</html>