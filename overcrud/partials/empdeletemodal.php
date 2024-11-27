<?php
foreach ($listaEmp as $empresa): ?>
<div class='modal fade' id='empdeletemodal<?= $empresa['idempresa'] ?>'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- HEADER DO MODAL -->
            <div class='modal-header'>
                <h1 class='modal-title text-uppercase fs-5'>Excluir empresa</h1>
            </div>
            <!-- CORPO DO MODAL -->
            <div class='modal-body'>
                Tem certeza que deseja excluir esta empresa? <br><b>NOME: <?= $empresa['nome'] ?> <br>CNPJ:
                    <?= $empresa['cnpj'] ?></b>
            </div>

            <!-- FOOTER DO MODAL -->
            <div class='modal-footer'>
                <button class='btn btn-secondary' data-bs-dismiss='modal'>Voltar</button>
                <form action="./src/empdelete_action.php" method="POST" style="background-color: transparent;">
                    <input type="hidden" name="idempresa" value="<?= $empresa['idempresa'] ?>">
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="EXCLUIR">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>