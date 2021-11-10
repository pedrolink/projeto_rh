<?php
session_start();
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="imagem/png" href="images/icon-rh.png" />
    <title>Spaces</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Recupere sua senha</h3>

                    <!-- VERIFICA SE EMAIL INEXISTE -->
                    <?php 
                    if(isset($_SESSION['email_inexistente'])):
                    ?>
                        <div class="notification is-info">
                            <p>O e-mail digitado não existe. Tente novamente.</p>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['email_inexistente']);
                    ?>

                    <!-- VERIFICA EMAIL ENVIADO COM SUCESSO -->
                    <?php 
                    if(isset($_SESSION['success_email'])):
                    ?>
                        <div class="notification is-success">
                            <p>E-mail enviado com sucesso! Verifique seu e-mail para mais informações.</p>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['success_email']);
                    ?>

                    <!-- VERIFICA EMAIL NÃO ENVIADO -->
                    <?php 
                    if(isset($_SESSION['not_exist_email'])):
                    ?>
                        <div class="notification is-danger">
                            <p>Algum problema inesperado aconteceu durante o envio do e-mail.</p>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['not_exist_email']);
                    ?>

                    <div class="box">
                        <form action="dados_recupera_senha.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="email" type="text" class="input is-large" placeholder="E-mail" autofocus>
                                </div>
                            </div>
                            <button type="submit" value="submit" class="button is-block is-success is-large is-fullwidth">Enviar</button>
                            <a type="submit" href="index.php" style="margin-top: 5px" class="button is-block is-link is-large is-fullwidth">Voltar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>