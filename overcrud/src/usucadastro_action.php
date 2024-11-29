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

//CLASSES
require_once "$rootOvercrud/components/Usuario.php";
require_once "$rootOvercrud/components/Endereco.php";

//PHP - RECEBIMENTO DE DADOS DO FORMULÁRIO
$cpf = $_POST['cpf'];
$password = $_POST['password'];
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$cidade = $_POST['cidadeestado'];
$estado = $_POST['estadocidade'];
$logradouro = $_POST['logradouro'];
$numlogradouro = $_POST['numlogradouro'];
$bairro = $_POST['bairro'];
$cnh = $_POST['cnh'];
$carro = $_POST['carro'];
$empregadoEm = intval($_POST['empregadoem']);
$status = 0;

$novoUsuario = new Usuario();
$novoUsuario->setNome($nome);
$novoUsuario->setTelefone($telefone);
$novoUsuario->setPassword($passwordHash);
$novoUsuario->setCpf($cpf);
$novoUsuario->setCnh($cnh);
$novoUsuario->setCarro($carro);
$novoUsuario->setIdempregadoem($empregadoEm);
$novoUsuario->setTipo($tipo);
$novoUsuario->setStatus($status);
$idenderecousu = 0;

$novoEndereco = new Endereco();
$novoEndereco->setCep($cep);
$novoEndereco->setCidade($cidade);
$novoEndereco->setEstado($estado);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setNumlogradouro($numlogradouro);
$novoEndereco->setBairro($bairro);

//VERIFICAÇÃO DE EMPREGADO EM
if ($empregadoEm != 0) {
    $status = 1;
    $novoUsuario->setStatus($status);
};

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($nome) && !isset($cnpj)) {
    require_once "$rootOvercrud/resources/logout.php";
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

            <!-- VERIFICAÇÃO DE CAMPO CPF + INSERÇÃO NO BD -->
            <div class="col-4 col-md-6 text-center">
                <?php
                $sqlVerifCpf = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios WHERE `cpf`='$cpf'");
                $sqlVerifCnh = ConexaoBD::conectarBD()->query("SELECT * FROM usuarios WHERE `cnh`='$cnh' AND `cnh`!=''");
                $sqlVerifEnd = ConexaoBD::conectarBD()->query("SELECT * FROM enderecos WHERE cep='$cep' AND cidade='$cidade' AND logradouro='$logradouro' AND numlogradouro='$numlogradouro'");

                //VERIFICAÇÃO ENDEREÇO DUPLICADO
                if ($sqlVerifEnd->rowCount() === 0) {
                    //PREPARAÇÃO E INSERÇÃO DE DADOS DO ENDEREÇO
                    $sqlInsertEnd = ConexaoBD::conectarBD()->prepare("INSERT INTO enderecos (cep, cidade, estado, logradouro, numlogradouro, bairro) VALUES ('$cep', '$cidade', '$estado', '$logradouro', '$numlogradouro', '$bairro')");
                    $sqlInsertEnd->execute();
                };

                //IDENDERECO DO ENDEREÇO NECESSÁRIO
                $sqlGetIdEnd = ConexaoBD::conectarBD()->query("SELECT MIN(idendereco) FROM enderecos WHERE cep='$cep' AND cidade='$cidade' AND logradouro='$logradouro' AND numlogradouro='$numlogradouro'");
                if ($sqlGetIdEnd->rowCount() > 0) {
                    $idendereco = $sqlGetIdEnd->fetchAll(PDO::FETCH_ASSOC);
                    $idenderecousu = $idendereco[0]["MIN(idendereco)"];
                };

                //VERIFICAÇÃO CPF + CNH
                if ($sqlVerifCpf->rowCount() === 0 && $sqlVerifCnh->rowCount() === 0) {
                    //PREPARAÇÃO PARA INSERIR DADOS DO USUÁRIO
                    $sqlInsertUsu = ConexaoBD::conectarBD()->prepare("INSERT INTO usuarios (nome, telefone, cpf, password, cnh, carro, tipo, status, idempregadoem, idenderecousu) VALUES ('$nome', '$telefone', '$cpf', '$passwordHash', '$cnh', '$carro',  '$tipo', '$status','$empregadoEm', '$idenderecousu')");

                    //EXECUÇÃO E VERIFICAÇÃO DAS INSERÇÕES
                    if ($sqlInsertUsu->execute()) {
                        mensagemRetorno("Dados de <b>" . $novoUsuario->getNome() . " (CPF " . $novoUsuario->getCpf() . ")</b> cadastrados com sucesso!", "success");
                        BotaoVoltar('../usulista.php', "secondary");
                    } else {
                        mensagemRetorno("ERRO: Dados de " . $novoUsuario->getNome() . " (CPF " . $novoUsuario->getCpf() . ") não foram cadastrados...", "danger");
                        BotaoVoltar('../usucadastro.php', "secondary");
                    };
                } else if ($sqlVerifCpf->rowCount() != 0) {
                    mensagemRetorno("O CPF " . $novoUsuario->getCpf() . " já existe no banco de dados! Use outro CPF para este cadastro.", "warning");
                    BotaoVoltar('../usucadastro.php', "secondary");
                } else if ($sqlVerifCnh->rowCount() != 0) {
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