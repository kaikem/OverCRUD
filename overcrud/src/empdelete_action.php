<?php
//SELECT idempresa FROM empresas WHERE idempresa IN (SELECT idempregadoem FROM usuarios WHERE usuarios.idempregadoem = empresas.idempresa);
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

//RECEBIMENTO DO IDEMPRESA
$idempresa = $_POST['idempresa'];
$empresa = [];

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idempresa)) {
    require_once '../resources/logout.php';
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once '../partials/head.php';
head('- Excluir Empresa');
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
            <h1 class="text-center text-primary display-6 my-5">EXCLUIR EMPRESA</h1>

            <!-- CONFIRMAÇÃO DE EXCLUSÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                if ($idempresa) {
                    $sqlConsulta = ConexaoBD::conectarBD()->query("SELECT * FROM empresas WHERE idempresa='$idempresa'");

                    if ($sqlConsulta->rowCount() > 0) {
                        $empresa = $sqlConsulta->fetch(PDO::FETCH_ASSOC);
                        mensagemRetorno("Empresa <b>{$empresa['nome']}</b> excluída com sucesso!", "success");

                        $sqlExcluir = ConexaoBD::conectarBD()->prepare("DELETE FROM empresas WHERE idempresa='$idempresa'");
                        $sqlExcluir->execute();
                    } else {
                        mensagemRetorno("Empresa não existe no Banco de Dados!", "danger");
                    }
                } else {
                    mensagemRetorno("Empresa não encontrada (atributo inexistente)!", "danger");
                };

                //BOTÃO VOLTAR
                BotaoVoltar('../emplista.php', "secondary");
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
    <script src="./js/mudarDisplay.js"></script>
</body>

</html>