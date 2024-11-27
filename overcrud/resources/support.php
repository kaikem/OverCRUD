<?php
//MENSAGEM
function mensagemRetorno($texto, $tipo)
{
    echo "<div class='alert alert-$tipo'>$texto</div>";
};

//BOTÃO VOLTAR
function BotaoVoltar($pagina, $tipo)
{
    echo "<a href='$pagina' class='btn btn-$tipo'>VOLTAR</a>";
};
