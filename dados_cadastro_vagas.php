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
$nivel_ingles = trim($_POST['nivel_ingles']);

$imagem_vaga = $_FILES['imagem_vaga'];
$novo_nome_imagem = date("dmy") . time() . $imagem_vaga["name"];
$file_temp = $imagem_vaga['tmp_name'];
$location = 'images/vagas_images/';

$insert_vaga = "INSERT INTO vagas (nome, cargo, descricao, localidade, nivel, salario, nivel_ingles, imagem, ativa) VALUES ('$nome_vaga', '$cargo', '$descricao_vaga', '$localidade', '$nivel', '$salario', '$nivel_ingles', '$novo_nome_imagem', 'Sim')";
$result_insert_vaga = mysqli_query($conexao, $insert_vaga);

if ($result_insert_vaga === TRUE) {
    $sql_id_vaga = 'SELECT MAX(id) as id FROM vagas WHERE nome = "' . $nome_vaga . '"';
    $result_id_vaga = mysqli_query($conexao, $sql_id_vaga);
    $row_id_vaga = mysqli_fetch_array($result_id_vaga);

    $id_vaga = $row_id_vaga['id'];

    $insert_requisitos = "INSERT INTO requisitos_vagas (requisitos, id_vaga) VALUES ('$requisitos', '$id_vaga')";

    if ($conexao->query($insert_requisitos) === TRUE) {
        move_uploaded_file($file_temp, $location . $novo_nome_imagem);
        $_SESSION['vaga_cadastrada'] = true;
    } else {
        $_SESSION['erro_cadastro_vaga'] = true;
    }
}


$conexao->close();

header('Location: form_painel.php?menu_principal=cadastro_vagas');
exit;