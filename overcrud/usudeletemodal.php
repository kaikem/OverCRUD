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
                Tem certeza que quer excluir o(a) usuário(a) <b><?= $usuario['nome'] ?> (CPF:
                    <?= $usuario['cpf'] ?>)</b>?
            </div>
            <div class='modal-footer'>
                <button class='btn btn-secondary' data-bs-dismiss='modal'>Voltar</button>
                <a class='btn btn-danger'
                    href='usudelete_action.php?idusuario=<?= $usuario['idusuario']; ?>'>Excluir</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>