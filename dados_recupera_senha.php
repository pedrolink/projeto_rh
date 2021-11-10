<?php
// error_reporting(0);

session_start();
include("conexao.php");
require 'PHPMailer/PHPMailerAutoload.php';

$email = mysqli_real_escape_string($conexao, trim($_POST['email']));

$sql = "SELECT COUNT(*) AS total FROM usuarios WHERE email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 0){
    $_SESSION['email_inexistente'] = true;
    header('Location: form_atualizar_senha.php');
    exit;
}

$sql = "SELECT nome FROM usuarios WHERE email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

$mail = new PHPMailer;
$mail->isSMTP();

//Configurações do Servidor de e-mail
$mail->Host = "smtp.gmail.com";
$mail->Port = "587";
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = "true";
$mail->Username = "pedrohplink@gmail.com";
$mail->Password = "M@use262326";

//Configuração da mensagem
$mail->setFrom($mail->Username, $row['nome']);
$mail->addAddress($email);
$mail->Subject = "Recuperar senha Projeto RH";

$mail_text = '
    Olá,<br><br>
    Para resetar sua senha acesse o seguinte link: <b><a href="http://localhost:8080/projeto_rh/form_resetar_senha.php">Resetar minha senha</a>!</b><br><br>
    Atenciosamente, <br>
    Equipe Projeto RH
';

$mail->IsHTML(true);
$mail->Body = $mail_text;

if($mail->send()){
    $_SESSION['success_email'] = true;
} else {
    $_SESSION['not_exist_email'] = true;
}

$conexao->close();

header('Location: form_atualizar_senha.php');
exit;

?>