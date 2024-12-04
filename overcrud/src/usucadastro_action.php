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

//CLASSES
require_once "$rootOvercrud/components/UsuarioDAO.php";
require_once "$rootOvercrud/components/EnderecoDAO.php";

//RECEBIMENTO DE DADOS DO FORMULÁRIO
//usuário
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$password = $_POST['password'];
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$telefone = $_POST['telefone'];
$cnh = $_POST['cnh'];
$carro = $_POST['carro'];
$tipo = $_POST['tipo'];
$status = 0;
$empregadoEm = intval($_POST['empregadoem']);

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($nome) && !isset($cpf)) {
    logoutPagina($voltar);
} else {
    $novoUsuario = new Usuario();
    $novoUsuario->setCpf($cpf);
    $novoUsuario->setNome($nome);
    $novoUsuario->setPassword($passwordHash);
    $novoUsuario->setTelefone($telefone);
    $novoUsuario->setCnh($cnh);
    $novoUsuario->setCarro($carro);
    $novoUsuario->setTipo($tipo);
    $novoUsuario->setStatus($status);
    $novoUsuario->setIdempregadoem($empregadoEm);
    $idenderecousu = 0;
    $novoUsuarioDAO = new UsuarioDAO($novoUsuario);
};

//endereço
$cep = $_POST['cep'];
$cidade = $_POST['cidadeestado'];
$estado = $_POST['estadocidade'];
$logradouro = $_POST['logradouro'];
$numlogradouro = $_POST['numlogradouro'];
$bairro = $_POST['bairro'];

$novoEndereco = new Endereco();
$novoEndereco->setCep($cep);
$novoEndereco->setCidade($cidade);
$novoEndereco->setEstado($estado);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setNumlogradouro($numlogradouro);
$novoEndereco->setBairro($bairro);
$novoEnderecoDAO = new EnderecoDAO($novoEndereco);

//VERIFICAÇÃO DE EMPREGADO EM
if ($empregadoEm != 0) {
    $status = 1;
    $novoUsuario->setStatus($status);
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once "$rootOvercrud/partials/head.php";
head('- Cadastrar Usuário');
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
            <h1 class="text-center text-primary display-6 my-5">CADASTRO DE USUÁRIOS</h1>

            <!-- VERIFICAÇÃO DE CPF, CNH E ENDEREÇO + INSERÇÃO NO BD -->
            <div class="col-4 col-md-6 text-center">
                <?php
                //VERIFICAÇÃO CPF E CNH
                if (($novoUsuarioDAO->buscarPorCpf($novoUsuario->getCpf()))->rowCount() === 0 && ($novoUsuarioDAO->buscarPorCnh($novoUsuario->getCnh()))->rowCount() === 0) {
                    //VERIFICAÇÃO ENDEREÇO DUPLICADO
                    if (($novoEnderecoDAO->buscarEnd())->rowCount() === 0) {
                        //INSERÇÃO DE ENDEREÇO NO BANCO DE DADOS
                        $novoEnderecoDAO->inserirNovoEnd();
                    };

                    //IDENDERECO DO ENDEREÇO NECESSÁRIO
                    $novoUsuario->setIdenderecousu($novoEnderecoDAO->buscarIdEnd());

                    //EXECUÇÃO E VERIFICAÇÃO DAS INSERÇÕES
                    if (($novoUsuarioDAO->prepInserirUsu())->execute()) {
                        mensagemRetorno("Dados de <b>" . $novoUsuario->getNome() . " (CPF " . $novoUsuario->getCpf() . ")</b> cadastrados com sucesso!", "success");
                        BotaoVoltar('../usulista.php', "secondary");
                    } else {
                        mensagemRetorno("ERRO: Dados de " . $novoUsuario->getNome() . " (CPF " . $novoUsuario->getCpf() . ") não foram cadastrados...", "danger");
                        BotaoVoltar('../usucadastro.php', "secondary");
                    };
                } else if (($novoUsuarioDAO->buscarPorCpf($novoUsuario->getCpf()))->rowCount() != 0) {
                    mensagemRetorno("O CPF " . $novoUsuario->getCpf() . " já existe no banco de dados! Use outro CPF para este cadastro.", "warning");
                    BotaoVoltar('../usucadastro.php', "secondary");
                } else if (($novoUsuarioDAO->buscarPorCnh($novoUsuario->getCnh()))->rowCount() != 0) {
                    mensagemRetorno("A CNH " . $novoUsuario->getCnh() . " já existe no banco de dados! Use outra CNH para este cadastro.", "warning");
                    BotaoVoltar('../usucadastro.php', "secondary");
                };
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
</body>

</html>