<?php

session_start();
include './conexao.php';

$id_usuario = trim($_POST['id_usuario']);
$id_vaga = trim($_POST['id_vaga']);
$descricao = trim($_POST['descricao_usuario']);
$selecionar_candidato = trim($_POST['selecionar_candidato']);
$banco_talentos = trim($_POST['banco_talentos']);

if ($selecionar_candidato) {
    $sql_usuario_selecionado = 'SELECT * FROM gestao_candidatos_selecionados WHERE id_usuario = "' . $id_usuario . '"';
    $result_usuario_selecionado = $conexao->query($sql_usuario_selecionado);

    if ($result_usuario_selecionado->num_rows > 0) {
        $_SESSION['selecionado_exist'] = true;
    } else {
        $insert_seleciona_candidato = "INSERT INTO gestao_candidatos_selecionados (id_usuario, id_vaga, descricao) VALUES ('$id_usuario', '$id_vaga', '$descricao')";

        if ($conexao->query($insert_seleciona_candidato) === TRUE) {
            $_SESSION['selecionado_succes'] = true;
        } else {
            $_SESSION['selecionado_error'] = true;
        }
    }
} elseif ($banco_talentos) {
    $sql_usuario_selecionado = 'SELECT * FROM gestao_candidatos_selecionados WHERE id_usuario = "' . $id_usuario . '"';
    $result_usuario_selecionado = $conexao->query($sql_usuario_selecionado);

    if ($result_usuario_selecionado->num_rows > 0) {
        $_SESSION['selecionado_exist'] = true;
    } else {
        $sql_usuario_selecionado = 'SELECT * FROM gestao_banco_talentos WHERE id_usuario = "' . $id_usuario . '"';
        $result_usuario_selecionado = $conexao->query($sql_usuario_selecionado);

        if ($result_usuario_selecionado->num_rows > 0) {
            $_SESSION['selecionado_exist'] = true;
        } else {
            $insert_banco_talentos = "INSERT INTO gestao_banco_talentos (id_usuario, id_vaga, descricao) VALUES ('$id_usuario', '$id_vaga', '$descricao')";

            if ($conexao->query($insert_banco_talentos) === TRUE) {
                $_SESSION['banco_talentos_success'] = true;
            } else {
                $_SESSION['banco_talentos_error'] = true;
            }
        }
    }
}

$conexao->close();

header('Location: form_painel.php?menu_principal=especificacoes_vagas&id=' . $id_vaga);
exit;
