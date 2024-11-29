<?php
//PATHING
require_once "pathing.php";

//VERIFICAÇÃO DE SESSÃO
require_once "$rootOvercrud/validations/session_validation.php";

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    require_once "$rootOvercrud/resources/logout.php";
};

//CONEXÃO COM BD
require_once "$rootOvercrud/components/ConexaoBD.php";

//FUNÇÕES DE SUPORTE
require_once "$rootOvercrud/resources/support.php";

//FUNÇÕES DE SUPORTE
require_once "$rootOvercrud/resources/listas.php";

//RECEBIMENTO DO IDEMPRESA
$idempresa = $_POST['idempresa'];
$empresa = [];
$empresaComVinculo = false;

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idempresa)) {
    require_once "$rootOvercrud/resources/logout.php";
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once "$rootOvercrud/partials/head.php";
head('- Excluir Empresa');
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
            <h1 class="text-center text-primary display-6 my-5">EXCLUIR EMPRESA</h1>

            <!-- CONFIRMAÇÃO DE EXCLUSÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                if ($idempresa) {
                    //CONSULTA DE EMPRESA POR ID
                    $sqlConsultaIdEmp = ConexaoBD::conectarBD()->query("SELECT * FROM empresas WHERE idempresa='$idempresa'");

                    /*CONSULTA DE EMPRESAS VINCULADAS
                    $sqlConsultaEmpVinculada = ConexaoBD::conectarBD()->query("SELECT idempresa FROM empresas WHERE idempresa IN (SELECT idempregadoem FROM usuarios WHERE usuarios.idempregadoem = empresas.idempresa)");

                    if ($sqlConsultaEmpVinculada->rowCount() > 0) {
                        $listaEmpVinculadas = $sqlConsultaEmpVinculada->fetchAll(PDO::FETCH_ASSOC);
                    };*/

                    //VERIFICAÇÃO SE A EMPRESA ESTÁ VINCULADA
                    foreach ($listaEmpVinculadas as $empresaVinculada) {
                        if ($empresaVinculada['idempresa'] == $idempresa) {
                            $empresaComVinculo = true;
                            break;
                        };
                    };

                    //VERIFICAÇÃO SE EXISTE EMPRESA COM O ID E SE ELA ESTÁ VINCULADA
                    if ($sqlConsultaIdEmp->rowCount() > 0 && $empresaComVinculo == false) {
                        $empresa = $sqlConsultaIdEmp->fetch(PDO::FETCH_ASSOC);
                        mensagemRetorno("Empresa <b>{$empresa['nome']}</b> excluída com sucesso!", "success");

                        $sqlExcluir = ConexaoBD::conectarBD()->prepare("DELETE FROM empresas WHERE idempresa='$idempresa'");
                        $sqlExcluir->execute();
                    } else if ($sqlConsultaIdEmp->rowCount() == 0) {
                        mensagemRetorno("Empresa não existe no Banco de Dados!", "danger");
                    } else if ($empresaComVinculo) {
                        mensagemRetorno("Empresa vinculada à usuário(s)! Por favor, faça a desvinculação antes de excluir.", "danger");
                    };
                } else {
                    mensagemRetorno("Empresa não encontrada (atributo inexistente)!", "danger");
                };

                //BOTÃO VOLTAR
                BotaoVoltar('../emplista.php', "secondary");
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