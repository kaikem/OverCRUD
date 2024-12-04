<?php
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
require_once "$root/overcrud/resources/pathing.php";

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

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idempresa)) {
    require_once "$rootOvercrud/resources/logout.php";
} else {
    $novaEmpresa = new Empresa();
    $novaEmpresa->setIdempresa($idempresa);
    $novaEmpresaDAO = new EmpresaDAO($novaEmpresa);

    $empresaComVinculo = false;
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
                if ($novaEmpresa->getIdempresa()) {
                    //VERIFICAÇÃO SE A EMPRESA ESTÁ VINCULADA
                    foreach ($listaEmpVinculadas as $empresaVinculada) {
                        if ($empresaVinculada['idempresa'] == $idempresa) {
                            $empresaComVinculo = true;
                            break;
                        };
                    };

                    //VERIFICAÇÃO SE EXISTE EMPRESA COM O ID E SE ELA ESTÁ VINCULADA
                    if (($novaEmpresaDAO->consultaDeIdEmp())->rowCount() > 0 && $empresaComVinculo == false) {
                        //PEGANDO OS DADOS DA EMPRESA PELO ID
                        $empresa = $novaEmpresaDAO->EmpPorId();
                        mensagemRetorno("Empresa <b>" . $empresa['nome'] . "</b> excluída com sucesso!", "success");

                        //EXCLUIR EMPRESA PELO ID
                        $novaEmpresaDAO->excluirEmp();
                    } else if (($novaEmpresaDAO->consultaDeIdEmp())->rowCount() == 0) {
                        mensagemRetorno("Esta empresa não existe no Banco de Dados!", "danger");
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