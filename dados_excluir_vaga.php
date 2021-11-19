<?php
include './conexao.php';

$id_vaga = trim($_GET['id_vaga_exluir']);

$sql_imagem = 'SELECT imagem FROM vagas WHERE id = "' . $id_vaga . '"';
$result_imagem = mysqli_query($conexao, $sql_imagem);
$row_imagem = mysqli_fetch_array($result_imagem);

$sql_delete_vaga = 'DELETE FROM vagas WHERE id = "'. $id_vaga . '"';
$sql_delete_candidatos_vaga = 'DELETE FROM candidatos_vaga WHERE id_vaga = "'. $id_vaga . '"';
$sql_delete_requisitos_vagas = 'DELETE FROM requisitos_vagas WHERE id_vaga = "'. $id_vaga . '"';

$arquivo_imagem = 'images/vagas_images/' . $row_imagem['imagem'];
$deleta_imagem = unlink($arquivo_imagem);


if($conexao->query($sql_delete_vaga) === TRUE and $conexao->query($sql_delete_candidatos_vaga) === TRUE and $conexao->query($sql_delete_requisitos_vagas) === TRUE){
    $_SESSION['status_delete_vaga_success'] = true;
} else {
    $_SESSION['status_delete_vaga_error'] = true;
}

$conexao->close();

header('Location: form_painel.php');
exit;
