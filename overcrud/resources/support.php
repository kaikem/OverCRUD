<?php
//----------------------------------------------------------------------
//FUNÇÕES DE SUPORTE
//mensagem
function mensagemRetorno($texto, $tipo)
{
    echo "<div class='alert alert-$tipo'>$texto</div>";
};

function BotaoVoltar($pagina, $tipo)
{
    echo "<a href='$pagina' class='btn btn-$tipo'>VOLTAR</a>";
}

//function BotaoVoltar($pagina){
//    echo "<a href='$pagina' class='btn btn-warning'>VOLTAR</a>";
//}