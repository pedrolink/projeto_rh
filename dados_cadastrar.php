<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));

$sql = "SELECT COUNT(*) AS total FROM usuarios WHERE usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

$sql_email = "SELECT COUNT(*) AS total FROM usuarios WHERE email = '$email'";
$result_email = mysqli_query($conexao, $sql_email);
$row_email = mysqli_fetch_assoc($result);

if(($row['total'] >= 1) and ($row_email >= 1)){
    $_SESSION['usuario_existe'] = true;
    header('Location: form_cadastro.php');
    exit;
}

$sql = "INSERT INTO usuarios (nome, usuario, senha, data_cadastro, email, tipo_permissao) VALUES ('$nome', '$usuario', '$senha', NOW(), '$email', 'Usuário')";

if($conexao->query($sql) === TRUE){
    $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: form_cadastro.php');
exit;

?>