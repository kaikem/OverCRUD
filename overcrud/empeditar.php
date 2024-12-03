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

//FUNÇÃO DE MENSAGENS
require_once "$rootOvercrud/resources/support.php";

//TABELAS DO BD
require_once "$rootOvercrud/resources/listas.php";

//RECEBIMENTO DE IDEMPRESA
$idempresa = $_GET['idempresa'];

$novaEmpresa = new Empresa();
$novaEmpresa->setIdempresa($idempresa);
$novaEmpresaDAO = new EmpresaDAO($novaEmpresa);

$empresaComVinculo = false;

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idempresa)) {
    require_once "$rootOvercrud/resources/logout.php";
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<!-- HEAD -->
<?php
require_once "$rootOvercrud/partials/head.php";
head('- Editar Empresa');
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
            <h1 class="text-center text-primary display-6 my-5">EDITAR EMPRESA</h1>

            <!-- CONFIRMAÇÃO DA EDIÇÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                if ($novaEmpresa->getIdempresa()) {
                    //VERIFICAÇÃO SE EXISTE EMPRESA COM O ID
                    if (($novaEmpresaDAO->consultaDeIdEmp())->rowCount() > 0) {
                        //PEGANDO OS DADOS DA EMPRESA PELO ID
                        $empresa = $novaEmpresaDAO->EmpPorId();

                        //VERIFICAÇÃO SE EXISTE ENDEREÇO PARA A EMPRESA
                        $enderecoEmp = 0;
                        for ($i = 0; $i < count($listaEnd); $i++) {
                            if ($empresa['idenderecoemp'] == $listaEnd[$i]['idendereco']) {
                                $enderecoEmp = $listaEnd[$i];
                            };
                        };
                    } else {
                        mensagemRetorno("Esta empresa não existe no Banco de Dados!", "danger");
                        BotaoVoltar('emplista.php', "secondary");
                    };
                } else {
                    mensagemRetorno("Empresa não encontrada (atributo inexistente)!", "danger");
                    BotaoVoltar('emplista.php', "secondary");
                };
                ?>
            </div>

            <!-- FORMULÁRIO DE EDIÇÃO -->
            <div
                class="col-6 col-md-8 <?php if (($novaEmpresaDAO->consultaDeIdEmp())->rowCount() == 0) echo 'd-none'; ?>">
                <form class="needs-validation" action="./src/empeditar_action.php" method="POST" novalidate>
                    <!-- FIELDSET EMPRESA -->
                    <fieldset>
                        <legend>DADOS DA EMPRESA</legend>
                        <input type="hidden" name="idempresa" value="<?= $empresa['idempresa'] ?>">
                        <input type="hidden" name="idendereco" value="<?= $enderecoEmp['idendereco'] ?>">
                        <!-- CNPJ -->
                        <div class="form-group">
                            <label for="cnpj" class="form-label">CNPJ:</label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj" minlength="18" maxlength="18"
                                data-mask="00.000.000/0000-00" value="<?= $empresa['cnpj'] ?>" required>
                            <div class="invalid-feedback" id="cnpjinvalido">CNPJ inválido!</div>
                        </div>

                        <!-- NOME -->
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" minlength="1" maxlength="64"
                                value="<?= $empresa['nome'] ?>" required>
                            <div class="invalid-feedback">O nome precisa ser preenchido</div>
                        </div>

                        <!-- NOME FANTASIA -->
                        <div class="form-group">
                            <label for="fantasia" class="form-label">Nome Fantasia:</label>
                            <input type="text" class="form-control" name="fantasia" id="fantasia" minlength="1"
                                maxlength="64" value="<?= $empresa['fantasia'] ?>" required>
                            <div class="invalid-feedback">O nome fantasia precisa ser preenchido</div>
                        </div>

                        <!-- TELEFONE -->
                        <div class="form-group">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="tel" class="form-control" name="telefone" id="telefone" minlength="14"
                                maxlength="15" data-mask="(00) 00000-0000" value="<?= $empresa['telefone'] ?>">
                            <div class="invalid-feedback">O telefone precisa ter entre 10 e 11 números</div>
                        </div>
                    </fieldset>

                    <!-- FIELDSET ENDEREÇO -->
                    <fieldset>
                        <!-- CEP -->
                        <div class="form-group">
                            <label for="cep" class="form-label"><i class="fa-solid fa-location-dot"></i>
                                CEP:</label>
                            <input type="text" class="form-control" name="cep" id="cep" minlength="10" maxlength="10"
                                data-mask="00.000-000" oninput="buscaCep()" value="<?= $enderecoEmp['cep'] ?>" required>
                            <div class="invalid-feedback">CEP inválido</div>
                        </div>

                        <!-- CIDADE & ESTADO -->
                        <div class="form-group">
                            <label for="cidadeestado" class="form-label"><i class="fa-solid fa-city"></i>
                                Cidade e Estado:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cidadeestado" id="cidadeestado"
                                    style="width: 65%;" minlength="1" maxlength="32"
                                    value="<?= $enderecoEmp['cidade'] ?>" required>
                                <span class="input-group-text">UF</span>
                                <select class="form-select" name="estadocidade" id="estadocidade"
                                    value="<?= $enderecoEmp['estado'] ?>" required>
                                    <option value="AC" <?= $enderecoEmp['estado'] == "AC" ? 'selected' : ''; ?>>AC
                                    </option>
                                    <option value="AL" <?= $enderecoEmp['estado'] == "AL" ? 'selected' : ''; ?>>AL
                                    </option>
                                    <option value="AM" <?= $enderecoEmp['estado'] == "AM" ? 'selected' : ''; ?>>AM
                                    </option>
                                    <option value="AP" <?= $enderecoEmp['estado'] == "AP" ? 'selected' : ''; ?>>AP
                                    </option>
                                    <option value="BA" <?= $enderecoEmp['estado'] == "BA" ? 'selected' : ''; ?>>BA
                                    </option>
                                    <option value="CE" <?= $enderecoEmp['estado'] == "CE" ? 'selected' : ''; ?>>CE
                                    </option>
                                    <option value="DF" <?= $enderecoEmp['estado'] == "DF" ? 'selected' : ''; ?>>DF
                                    </option>
                                    <option value="ES" <?= $enderecoEmp['estado'] == "ES" ? 'selected' : ''; ?>>ES
                                    </option>
                                    <option value="GO" <?= $enderecoEmp['estado'] == "GO" ? 'selected' : ''; ?>>GO
                                    </option>
                                    <option value="MA" <?= $enderecoEmp['estado'] == "MA" ? 'selected' : ''; ?>>MA
                                    </option>
                                    <option value="MG" <?= $enderecoEmp['estado'] == "MG" ? 'selected' : ''; ?>>MG
                                    </option>
                                    <option value="MS" <?= $enderecoEmp['estado'] == "MS" ? 'selected' : ''; ?>>MS
                                    </option>
                                    <option value="MT" <?= $enderecoEmp['estado'] == "MT" ? 'selected' : ''; ?>>CE
                                    </option>
                                    <option value="PA" <?= $enderecoEmp['estado'] == "PA" ? 'selected' : ''; ?>>GO
                                    </option>
                                    <option value="PB" <?= $enderecoEmp['estado'] == "PB" ? 'selected' : ''; ?>>PB
                                    </option>
                                    <option value="PE" <?= $enderecoEmp['estado'] == "PE" ? 'selected' : ''; ?>>PE
                                    </option>
                                    <option value="PI" <?= $enderecoEmp['estado'] == "PI" ? 'selected' : ''; ?>>PI
                                    </option>
                                    <option value="PR" <?= $enderecoEmp['estado'] == "PR" ? 'selected' : ''; ?>>PR
                                    </option>
                                    <option value="RJ" <?= $enderecoEmp['estado'] == "RJ" ? 'selected' : ''; ?>>RJ
                                    </option>
                                    <option value="RO" <?= $enderecoEmp['estado'] == "RO" ? 'selected' : ''; ?>>RO
                                    </option>
                                    <option value="RR" <?= $enderecoEmp['estado'] == "RR" ? 'selected' : ''; ?>>RR
                                    </option>
                                    <option value="RS" <?= $enderecoEmp['estado'] == "RS" ? 'selected' : ''; ?>>RS
                                    </option>
                                    <option value="SE" <?= $enderecoEmp['estado'] == "SE" ? 'selected' : ''; ?>>SE
                                    </option>
                                    <option value="SC" <?= $enderecoEmp['estado'] == "SC" ? 'selected' : ''; ?>>SC
                                    </option>
                                    <option value="SP" <?= $enderecoEmp['estado'] == "SP" ? 'selected' : ''; ?>>SP
                                    </option>
                                    <option value="TO" <?= $enderecoEmp['estado'] == "TO" ? 'selected' : ''; ?>>GO
                                    </option>
                                </select>
                                <div class="invalid-feedback">A cidade e o Estado precisam ser preenchidos</div>
                            </div>
                        </div>

                        <!-- LOGRADOURO -->
                        <div class="form-group">
                            <label for="logradouro" class="form-label"><i class="fa-solid fa-road"></i>
                                Endereço:</label>
                            <div class="input-group">
                                <!-- ENDEREÇO -->
                                <input type="text" class="form-control" name="logradouro" id="logradouro"
                                    style="width: 60%;" minlength="1" maxlength="64"
                                    value="<?= $enderecoEmp['logradouro'] ?>" required>
                                <span class="input-group-text">nº</span>
                                <!-- NÚMERO -->
                                <input type="text" class="form-control" name="numlogradouro" id="numlogradouro"
                                    minlength="1" maxlength="6" value="<?= $enderecoEmp['numlogradouro'] ?>" required>
                                <div class="invalid-feedback">O endereço e o número precisam ser preenchidos</div>
                            </div>
                        </div>

                        <!-- BAIRRO -->
                        <div class="form-group">
                            <label for="bairro" class="form-label"><i class="fa-solid fa-vector-square"></i>
                                Bairro:</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" minlength="1"
                                maxlength="32" value="<?= $enderecoEmp['bairro'] ?>" required>
                            <div class="invalid-feedback">O bairro precisa ser preenchido</div>
                        </div>
                    </fieldset>

                    <!-- FIELDSET RESPONSÁVEL -->
                    <fieldset>
                        <legend>RESPONSÁVEL</legend>
                        <!-- RESPONSÁVEL -->
                        <div class="form-group">
                            <label for="responsavel" class="form-label">Responsável:</label>
                            <input type="text" class="form-control" name="responsavel" id="responsavel" minlength="1"
                                maxlength="64" value="<?= $empresa['responsavel'] ?>" required>
                            <div class="invalid-feedback">O responsável precisa ser preenchido</div>
                        </div>
                    </fieldset>

                    <!-- BUTTONS -->
                    <div class="form-group my-3 text-center">
                        <a href="emplista.php" class="btn btn-secondary loginbtn">VOLTAR</a>
                        <input type="submit" class="btn btn-primary loginbtn" value="ATUALIZAR">
                    </div>
                </form>
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
        <script src="./js/mudarDisplay.js"></script>
        <script src="./js/empFormValidations.js"></script>
        <script src="./js/buscaCep.js"></script>
</body>

</html>