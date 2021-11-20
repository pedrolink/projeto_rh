<?php
session_start();
include("conexao.php");

$nome_vaga = trim($_POST['nome_vaga']);
$cargo = trim($_POST['cargo']);
$localidade = trim($_POST['localidade']);
$nivel = trim($_POST['nivel']);
$descricao = trim($_POST['descricao']);
$requisitos = trim(strtoupper($_POST['requisitos']));
$salario = trim(str_replace(',', '.', str_replace('.', '', $_POST['salario'])));
$nivel_ingles = trim($_POST['nivel_ingles']);
$id_vaga = trim($_POST['id_vaga']);

$imagem_vaga = $_FILES['imagem_vaga'];
$file_temp = $imagem_vaga['tmp_name'];
$file_size = $imagem_vaga['size'];
$location = 'images/vagas_images/';

$sql_informacoes_vaga = 'SELECT * FROM vagas WHERE id = "' . $id_vaga . '"';
$result_informacoes_vaga = $conexao->query($sql_informacoes_vaga);
$row_informacoes_vaga = mysqli_fetch_array($result_informacoes_vaga);

if ($file_size <= 0){
    $novo_nome_imagem = trim($_POST['input_imagem_vaga']);
} else {
    $novo_nome_imagem = date("dmy") . time() . $imagem_vaga["name"];
    $arquivo_imagem = 'images/vagas_images/' . $row_informacoes_vaga['imagem'];
    $deleta_imagem = unlink($arquivo_imagem);
}


$sql_update_vaga = 'UPDATE vagas SET nome = "' . $nome_vaga . '", cargo = "' . $cargo . '", localidade = "' . $localidade . '", nivel = "' . $nivel . '", 
descricao = "' . $descricao . '", salario = "' . $salario . '", nivel_ingles = "' . $nivel_ingles . '", imagem = "' . $novo_nome_imagem . '" WHERE id = "' . $id_vaga . '"';

$sql_update_requisitos_vaga = 'UPDATE requisitos_vagas SET requisitos = "' . $requisitos . '" WHERE id_vaga = "' . $id_vaga . '"';

if($conexao->query($sql_update_vaga) === TRUE and $conexao->query($sql_update_requisitos_vaga) === TRUE){
    move_uploaded_file($file_temp, $location . $novo_nome_imagem);
    $_SESSION['status_update_vaga_success'] = true;
} else {
    $_SESSION['status_update_vaga_error'] = true;
}

$conexao->close();

header('Location: form_painel.php');
exit;
