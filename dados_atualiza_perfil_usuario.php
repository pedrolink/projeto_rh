<?php

session_start();
include './conexao.php';


$email = trim($_POST['email']);

$endereco_principal = trim($_POST['endereco_principal']);
$endereco_secundario = trim($_POST['endereco_secundario']);
$cidade = trim($_POST['cidade']);
$estado = trim($_POST['estado']);

$telefone_primario = trim($_POST['telefone_primario']);
$telefone_secundario = trim($_POST['telefone_secundario']);
$data_nascimento = date('Y-m-d', strtotime(trim($_POST['data_nascimento'])));

$pretencao_salarial = trim(str_replace(',', '.', str_replace('.', '', $_POST['pretencao_salarial'])));
$nivel = trim($_POST['nivel']);

$habilidades = trim(strtoupper($_POST['habilidades']));

$nivel_ingles = trim($_POST['nivel_ingles']);
$url_linkedin = trim($_POST['url_linkedin']);


$imagem_perfil = $_FILES['imagem_perfil'];
$file_temp = $imagem_perfil['tmp_name'];
$file_size = $imagem_perfil['size'];
$location = 'images/profile_images/';

$sql_informacoes_usuario = 'SELECT * FROM usuarios WHERE usuario = "' . $_SESSION['usuario'] . '"';
$result_informacoes_usuario = mysqli_query($conexao, $sql_informacoes_usuario);
$row_informacoes_usuario = mysqli_fetch_array($result_informacoes_usuario);

$id_usuario = $row_informacoes_usuario['id'];

$sql_informacoes_competencia = 'SELECT * FROM competencias_usuario WHERE id_usuario = "' . $id_usuario . '"';
$result_informacoes_competencia = $conexao->query($sql_informacoes_competencia);
$row_informacoes_competencia = mysqli_fetch_array($result_informacoes_competencia);

if ($file_size <= 0){
    $novo_nome_imagem = trim($_POST['input_imagem_usuario']);
} else {
    $novo_nome_imagem = date("dmy") . time() . $imagem_perfil["name"];
    $arquivo_imagem = 'images/profile_images/' . $row_informacoes_competencia['imagem_usuario'];
    $deleta_imagem = unlink($arquivo_imagem);
}

$sql_update_user = 'UPDATE usuarios SET email = "' . $email . '" WHERE usuario = "' . $row_informacoes_usuario['usuario'] . '"';

if ($result_informacoes_competencia->num_rows > 0) {
    $sql_update_competencias = 'UPDATE competencias_usuario SET habilidades = "' . $habilidades . '", pretencao_salarial = "' . $pretencao_salarial .
        '", nivel = "' . $nivel . '", cidade = "' . $cidade . '", endereco_principal = "' . $endereco_principal .
        '", endereco_secundario = "' . $endereco_secundario . '", estado = "' . $estado . '", telefone_primario = "' . $telefone_primario .
        '", telefone_secundario = "' . $telefone_secundario . '", data_nascimento = "' . $data_nascimento . '", nivel_ingles = "' . $nivel_ingles .
        '", url_linkedin = "' . $url_linkedin . '", imagem_usuario = "' . $novo_nome_imagem . '" WHERE id_usuario = "' . $id_usuario . '"';

    if ($conexao->query($sql_update_user) === TRUE and $conexao->query($sql_update_competencias) === TRUE) {
        move_uploaded_file($file_temp, $location . $novo_nome_imagem);
        $_SESSION['competencia_usuario_success'] = true;
    } else {
        $_SESSION['competencia_usuario_error'] = true;
    }
} else {
    $sql_insert_competencias = "INSERT INTO competencias_usuario (id_usuario, habilidades, pretencao_salarial, nivel, cidade, endereco_principal, endereco_secundario, estado, telefone_primario, telefone_secundario, data_nascimento, nivel_ingles, url_linkedin, imagem_usuario) 
    VALUES ('$id_usuario', '$habilidades', '$pretencao_salarial', '$nivel', '$cidade', '$endereco_principal','$endereco_secundario','$estado','$telefone_primario','$telefone_secundario','$data_nascimento','$nivel_ingles','$url_linkedin', '$novo_nome_imagem')";

    if($conexao->query($sql_insert_competencias) === TRUE and $conexao->query($sql_update_user) === TRUE){
        move_uploaded_file($file_temp, $location . $novo_nome_imagem);
        $_SESSION['competencia_usuario_success'] = true;
    } else {
        $_SESSION['competencia_usuario_error'] = true;
    }
}

$conexao->close();

header('Location: form_painel.php?menu_principal=perfil_usuario');
exit;
