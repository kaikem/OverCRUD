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

//TABELAS DO BD
require_once "$rootOvercrud/resources/listas.php";
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
            <div class="col-8 col-sm-10 col-md-8 col-lg-6 mt-5">

                <!-- TÍTULO DA SEÇÃO -->
                <h1 class="text-center text-primary display-6 mb-5" id="sessiontitle">CADASTRO DE USUÁRIOS</h1>

                <!-- FORMULÁRIO -->
                <form class="needs-validation" action="./src/usucadastro_action.php" method="POST" id="formusucadastro"
                    novalidate>
                    <!-- FIELDSET CONTA -->
                    <fieldset>
                        <legend>DADOS DA CONTA</legend>
                        <!-- CPF -->
                        <div class="form-group">
                            <label for="cpf" class="form-label"><i class="fa-solid fa-person"></i> CPF:</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" minlength="14" maxlength="14"
                                data-mask="000.000.000-00" required>
                            <div class="invalid-feedback" id="cpfinvalido">CPF inválido</div>
                        </div>

                        <!-- SENHA -->
                        <div class="form-group">
                            <label for="password" class="form-label"><i class="fa-solid fa-lock"></i> Senha:</label>
                            <input type="password" class="form-control" name="password" id="password" minlength="8"
                                maxlength="32" required>
                            <div class="invalid-feedback">A senha precisa conter pelo menos 8 caracteres</div>
                        </div>

                        <!-- TIPO -->
                        <div class="form-group">
                            <label for="tipo" class="form-label"><i class="fa-solid fa-file-invoice"></i> Tipo:</label>
                            <select class="form-select" name="tipo" id="tipo">
                                <option value="0" selected>Comum</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </fieldset>

                    <!-- FIELDSET PESSOAIS -->
                    <fieldset>
                        <legend>DADOS PESSOAIS</legend>
                        <!-- NOME -->
                        <div class="form-group">
                            <label for="nome" class="form-label"><i class="fa-solid fa-user"></i> Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" minlength="1" maxlength="64"
                                required>
                            <div class="invalid-feedback">O nome precisa ser preenchido</div>
                        </div>

                        <!-- TELEFONE -->
                        <div class="form-group">
                            <label for="telefone" class="form-label"><i class="fa-solid fa-phone"></i> Telefone:</label>
                            <input type="tel" class="form-control" name="telefone" id="telefone" minlength="14"
                                maxlength="15" data-mask="(00) 00000-0000">
                            <div class="invalid-feedback">O telefone precisa ter entre 10 e 11 números</div>
                        </div>
                    </fieldset>

                    <!-- FIELDSET ENDEREÇO -->
                    <fieldset>
                        <legend>ENDEREÇO</legend>
                        <!-- CEP -->
                        <div class="form-group">
                            <label for="cep" class="form-label"><i class="fa-solid fa-location-dot"></i>
                                CEP:</label>
                            <input type="text" class="form-control" name="cep" id="cep" minlength="10" maxlength="10"
                                data-mask="00.000-000" oninput="buscaCep()" required>
                            <div class="invalid-feedback">CEP inválido</div>
                        </div>

                        <!-- CIDADE & ESTADO -->
                        <div class="form-group">
                            <label for="cidadeestado" class="form-label"><i class="fa-solid fa-city"></i>
                                Cidade e Estado:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cidadeestado" id="cidadeestado"
                                    style="width: 65%;" minlength="1" maxlength="32" required>
                                <span class="input-group-text">UF</span>
                                <select class="form-select" name="estadocidade" id="estadocidade" required>
                                    <option disabled selected value>--</option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">CE</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">GO</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">GO</option>
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
                                    style="width: 60%;" minlength="1" maxlength="64" required>
                                <span class="input-group-text">nº</span>
                                <!-- NÚMERO -->
                                <input type="text" class="form-control" name="numlogradouro" id="numlogradouro"
                                    minlength="1" maxlength="6" required>
                                <div class="invalid-feedback">O endereço e o número precisam ser preenchidos</div>
                            </div>
                        </div>

                        <!-- BAIRRO -->
                        <div class="form-group">
                            <label for="bairro" class="form-label"><i class="fa-solid fa-vector-square"></i>
                                Bairro:</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" minlength="1"
                                maxlength="32" required>
                            <div class="invalid-feedback">O bairro precisa ser preenchido</div>
                        </div>
                    </fieldset>

                    <!-- FIELDSET CARRO -->
                    <fieldset>
                        <legend>HABILITAÇÃO E VEÍCULO</legend>
                        <!-- CNH -->
                        <div class="form-group">
                            <label for="cnh" class="form-label"><i class="fa-solid fa-id-card"></i> CNH:</label>
                            <input type="text" class="form-control" name="cnh" id="cnh" minlength="9" maxlength="11">
                            <div class="invalid-feedback">A CNH precisa ter entre 9 e 11 números</div>
                        </div>

                        <!-- CARRO -->
                        <div class="form-group">
                            <label for="carro" class="form-label"><i class="fa-solid fa-car"></i> Carro:</label>
                            <input type="text" class="form-control" name="carro" id="carro" maxlength="32">
                        </div>
                    </fieldset>

                    <!-- FIELDSET EMPREGADO -->
                    <fieldset>
                        <legend>EMPREGADO EM...</legend>
                        <!-- EMPREGADO EM -->
                        <div class="form-group">
                            <label for="empregadoem" class="form-label"><i class="fa-solid fa-briefcase"></i>
                                Empresa:</label>
                            <select class="form-select" name="empregadoem" id="empregadoem">
                                <?php foreach ($listaEmp as $empresa): ?>
                                <option value="<?= $empresa['idempresa'] ?>"> <?= $empresa['nome'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </fieldset>

                    <!-- BUTTONS -->
                    <div class="form-group my-3 text-center align-items-center">
                        <button type="button" class="btn btn-secondary loginbtn" onclick="reset()">LIMPAR</button>
                        <input type="submit" class="btn btn-primary loginbtn" value="ENVIAR">
                    </div>
                </form>
            </div>
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
    <script src="./js/usuFormValidations.js"></script>
    <script src="./js/buscaCep.js"></script>
</body>

</html>