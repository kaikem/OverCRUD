<?php
foreach ($listaUsu as $usuario): ?>
    <div class='modal fade' id='usudeletemodal<?= $usuario['idusuario'] ?>'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <!-- HEADER DO MODAL -->
                <div class='modal-header'>
                    <h1 class='modal-title text-uppercase fs-5'>Excluir usuário(a)</h1>
                </div>
                <!-- CORPO DO MODAL -->
                <div class='modal-body'>
                    Tem certeza que deseja excluir este(a) usuario(a)? <br><b>NOME: <?= $usuario['nome'] ?> <br>CPF:
                        <?= $usuario['cpf'] ?></b>
                </div>

                <!-- FOOTER DO MODAL -->
                <div class='modal-footer'>
                    <button class='btn btn-secondary' data-bs-dismiss='modal'>Voltar</button>
                    <form action="usudelete_action.php" method="POST" style="background-color: transparent;">
                        <input type="hidden" name="idusuario" value="<?= $usuario['idusuario'] ?>">
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger text-center" value="EXCLUIR">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>