<?php
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
require_once "$root/overcrud/resources/pathing.php";
$voltar = "..";

//VERIFICAÇÃO DE SESSÃO
require_once "$rootOvercrud/validations/session_validation.php";
if($_SESSION['valido'] == "erro"){
    logoutPagina($voltar);
}

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    logoutPagina($voltar);
};

//CONEXÃO COM BD
require_once "$rootOvercrud/components/ConexaoBD.php";

//FUNÇÕES DE SUPORTE
require_once "$rootOvercrud/resources/support.php";

//FUNÇÕES DE SUPORTE
require_once "$rootOvercrud/resources/listas.php";

//RECEBIMENTO DE IDUSUARIO
$idusuario = $_POST['idusuario'];

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idusuario)) {
    logoutPagina($voltar);
} else {
    $novoUsuario = new Usuario();
    $novoUsuario->setIdusuario($idusuario);
    $novoUsuarioDAO = new UsuarioDAO($novoUsuario);
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once "$rootOvercrud/partials/head.php";
head('- Excluir Usuário');
?>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbartop">
            <?php require_once "$rootOvercrud/partials/navbartop.php" ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5">EXCLUIR USUÁRIO(A)</h1>

            <!-- CONFIRMAÇÃO DE EXCLUSÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                //VERIFICAÇÃO SE EXISTE USUÁRIO COM O ID
                if ($novoUsuario->getIdusuario()) {
                    if (($novoUsuarioDAO->consultaDeIdUsu())->rowCount() > 0) {
                        //PEGANDO OS DADOS DO USUÁRIO PELO ID
                        $usuario = $novoUsuarioDAO->UsuPorId();
                        mensagemRetorno("Usuario(a) <b>" . $usuario['nome'] . "</b> excluído(a) com sucesso!", "success");

                        //EXCLUIR USUÁRIO PELO ID
                        $novoUsuarioDAO->excluirUsu();
                    } else {
                        mensagemRetorno("Usuário(a) não existe no Banco de Dados!", "danger");
                    }
                } else {
                    mensagemRetorno("Usuário(a) não encontrado(a) (atributo inexistente)!", "danger");
                };

                //BOTÃO VOLTAR
                BotaoVoltar('../usulista.php', "secondary");
                ?>
            </div>

        </div>

        <!-- FOOTER -->
        <?php require_once "$rootOvercrud/partials/footer.php" ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="./js/darkmodetoggle.js"></script>
    <script src="./js/modals.js"></script>
    <script src="./js/mudarDisplay.js"></script>
</body>

</html>