<?php
//VERIFICAÇÃO DE SESSÃO
require_once '../validations/session_validation.php';

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    require_once '../resources/logout.php';
};

//CONEXÃO COM BD
require_once '../components/ConexaoBD.php';

//FUNÇÕES DE SUPORTE
require_once '../resources/support.php';

//RECEBIMENTO DE IDUSUARIO
$idusuario = $_POST['idusuario'];
$usuario = [];

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idusuario)) {
    require_once '../resources/logout.php';
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once './partials/head.php';
head('- Excluir Usuário');
?>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbartop">
            <?php require_once '../partials/navbartop.php' ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5">EXCLUIR USUÁRIO(A)</h1>

            <!-- CONFIRMAÇÃO DE EXCLUSÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                if ($idusuario) {
                    $sqlConsulta = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios WHERE idusuario='$idusuario'");

                    if ($sqlConsulta->rowCount() > 0) {
                        $usuario = $sqlConsulta->fetch(PDO::FETCH_ASSOC);
                        mensagemRetorno("Usuario(a) <b>{$usuario['nome']}</b> excluído(a) com sucesso!", "success");

                        $sqlExcluir = ConexaoBD::conectarBD()->prepare("DELETE FROM usuarios WHERE idusuario='$idusuario'");
                        $sqlExcluir->execute();
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
        <?php require_once '../partials/footer.php' ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="./js/darkmodetoggle.js"></script>
    <script src="./js/modals.js"></script>
    <script src="./js/usuMudarDisplay.js"></script>
</body>

</html>