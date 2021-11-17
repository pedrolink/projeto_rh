<?php

session_start();
include './conexao.php';

$nome_vaga = trim($_POST['nome_vaga']);
$cargo = trim($_POST['cargo']);
$localidade = trim($_POST['localidade']);
$nivel = trim($_POST['nivel']);
$descricao_vaga = trim($_POST['descricao_vaga']);
$requisitos = trim(strtoupper($_POST['requisitos']));
$salario = trim(str_replace(',', '.', str_replace('.', '', $_POST['salario'])));
// $file_new_name = date('dmy') . time() . $_FILES['file']['name'];
// $file_name = $_FILES['file']['name'];
// $file_temp = $_FILES['file']['tmp_name'];
// $file_size = $_FILES['file']['size'];
// $location = 'images/';

$insert_vaga = "INSERT INTO vagas (nome, cargo, descricao, localidade, nivel, salario, imagem) VALUES ('$nome_vaga', '$cargo', '$descricao_vaga', '$localidade', '$nivel', '$salario', '$file_new_name')";
$result_insert_vaga = mysqli_query($conexao, $insert_vaga);

if ($result_insert_vaga === TRUE) {
    $sql_id_vaga = 'SELECT MAX(id) as id FROM vagas WHERE nome = "' . $nome_vaga . '"';
    $result_id_vaga = mysqli_query($conexao, $sql_id_vaga);
    $row_id_vaga = mysqli_fetch_array($result_id_vaga);

    $id_vaga = $row_id_vaga['id'];

    $insert_requisitos = "INSERT INTO requisitos_vagas (requisitos, id_vaga) VALUES ('$requisitos', '$id_vaga')";

    if ($conexao->query($insert_requisitos) === TRUE) {
        // move_uploaded_file($file_temp, $location . $file_new_name);
        $_SESSION['vaga_cadastrada'] = true;
    } else {
        $_SESSION['erro_cadastro_vaga'] = true;
    }
}


$conexao->close();

header('Location: form_painel.php?menu_principal=cadastro_vagas');
exit;