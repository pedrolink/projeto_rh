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

$sql_update_vaga = 'UPDATE vagas SET nome = "' . $nome_vaga . '", cargo = "' . $cargo . '", localidade = "' . $localidade . '", nivel = "' . $nivel . '", 
descricao = "' . $descricao . '", salario = "' . $salario . '", nivel_ingles = "' . $nivel_ingles . '" WHERE id = "' . $id_vaga . '"';

$sql_update_requisitos_vaga = 'UPDATE requisitos_vagas SET requisitos = "' . $requisitos . '" WHERE id_vaga = "' . $id_vaga . '"';

if($conexao->query($sql_update_vaga) === TRUE and $conexao->query($sql_update_requisitos_vaga) === TRUE){
    $_SESSION['status_update_vaga_success'] = true;
} else {
    $_SESSION['status_update_vaga_error'] = true;
}

$conexao->close();

header('Location: form_painel.php');
exit;
