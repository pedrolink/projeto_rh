<?php
session_start();
include("conexao.php");

$id_vaga = trim($_GET['id_vaga']);

$sql_update_inativar_vaga = 'UPDATE vagas SET ativa = "Não" WHERE id = "' . $id_vaga . '"';

if($conexao->query($sql_update_inativar_vaga) === TRUE){
    $_SESSION['status_vaga_inativada_success'] = true;
} else {
    $_SESSION['status_vaga_inativada_error'] = true;
}

$conexao->close();

header('Location: form_painel.php?menu_principal=analise_vagas');
exit;