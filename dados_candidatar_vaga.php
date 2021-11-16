<?php
session_start();
include("conexao.php");

$id_vaga = $_POST['id_vaga'];

$sql_informacoes_usuario = 'SELECT * FROM usuarios WHERE usuario = "' . $_SESSION['usuario'] . '"';
$result_informacoes_usuario = mysqli_query($conexao, $sql_informacoes_usuario);
$row_informacoes_usuario = mysqli_fetch_array($result_informacoes_usuario);

$id_usuario = $row_informacoes_usuario['id'];

$sql_informacoes_cadidatos_vaga = 'SELECT * FROM candidatos_vaga WHERE id_usuario = "' . $id_usuario . '" AND id_vaga = "' . $id_vaga . '"';
$result_informacoes_cadidatos_vaga = $conexao->query($sql_informacoes_cadidatos_vaga);

if ($result_informacoes_cadidatos_vaga->num_rows > 0) {
    $_SESSION['cadidato_vaga_cadastrado_error'] = true;
} else {
    $sql_insert_candidatos_vaga = "INSERT INTO candidatos_vaga (id_vaga, id_usuario) VALUES ('$id_vaga', '$id_usuario')";

    if ($conexao->query($sql_insert_candidatos_vaga) === TRUE) {
        $_SESSION['candidato_vaga_success'] = true;
    } else {
        $_SESSION['candidato_vaga_error'] = true;
    }
}

$conexao->close();

header('Location: form_painel.php?menu_principal=card_vaga&id='. $id_vaga);
exit;
