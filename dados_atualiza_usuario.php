<?php
session_start();
include("conexao.php");

$tipo_permissao = $_POST['tipo_permissao'];
$usuario = $_POST['usuario'];

$sql_update_user = 'UPDATE usuarios SET tipo_permissao = "' . $tipo_permissao . '" WHERE usuario = "' . $usuario . '"';

if($conexao->query($sql_update_user) === TRUE){
    $_SESSION['status_user_alterado'] = true;
} else {
    $_SESSION['status_user_error'] = true;
}

$conexao->close();

header('Location: form_painel.php?menu_principal=listagem_usuarios');
exit;


?>