<?php

$id_vaga = trim($_POST['id_vaga_exluir']);

$sql_delete_vaga = 'DELETE FROM vagas WHERE id="'. $id_vaga . '"';

if($conexao->query($sql_delete_vaga) === TRUE){
    $_SESSION['status_delete_vaga_success'] = true;
} else {
    $_SESSION['status_delete_vaga_error'] = true;
}

$conexao->close();

header('Location: form_painel.php');
exit;
