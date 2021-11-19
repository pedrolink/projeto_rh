<?php
include './conexao.php';

session_start();

$sql_informacoes_usuario = 'SELECT * FROM usuarios WHERE usuario = "' . $_SESSION['usuario'] . '"';
$result_informacoes_usuario = mysqli_query($conexao, $sql_informacoes_usuario);
$row_informacoes_usuario = mysqli_fetch_array($result_informacoes_usuario);

$sql_competencia_usuario = 'SELECT * FROM competencias_usuario WHERE id_usuario = "' . $row_informacoes_usuario['id'] . '"';
$result_competencia_usuario = mysqli_query($conexao, $sql_competencia_usuario);
$row_competencia_usuario = mysqli_fetch_array($result_competencia_usuario);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="imagem/png" href="images/icon-rh.png" />
    <title>Spaces</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a class="navbar-brand" href="form_painel.php">
                <img src="images/icon-rh.png" alt="Logo" style="width:40px;">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="form_painel.php">Spaces <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['nome'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <!-- PERFIS NO SISTEMA -->
                            <?php
                            if ($row_informacoes_usuario['tipo_permissao'] == 'Administrador') :
                            ?>
                                <a class="dropdown-item" href="form_painel.php?menu_principal=listagem_usuarios">Administrador</a>
                            <?php
                            endif;
                            ?>

                            <!-- ANÁLISE DE VAGAS -->
                            <?php
                            if ($row_informacoes_usuario['tipo_permissao'] == 'Administrador' or $row_informacoes_usuario['tipo_permissao'] == 'Time RH') :
                            ?>
                                <a class="dropdown-item" href="form_painel.php?menu_principal=analise_vagas">Análise de vagas</a>
                            <?php
                            endif;
                            ?>

                            <!-- BANCO DE TALENTOS -->
                            <?php
                            if ($row_informacoes_usuario['tipo_permissao'] == 'Administrador' or $row_informacoes_usuario['tipo_permissao'] == 'Time RH') :
                            ?>
                                <a class="dropdown-item" href="form_painel.php?menu_principal=banco_talentos">Banco de talentos</a>
                            <?php
                            endif;
                            ?>

                            <!-- CADASTRO DE VAGAS -->
                            <?php
                            if ($row_informacoes_usuario['tipo_permissao'] == 'Administrador' or $row_informacoes_usuario['tipo_permissao'] == 'Time RH') :
                            ?>
                                <a class="dropdown-item" href="form_painel.php?menu_principal=cadastro_vagas">Cadastro de vagas</a>
                            <?php
                            endif;
                            ?>

                            <a class="dropdown-item" href="form_painel.php?menu_principal=minhas_candidaturas">Minhas Candidaturas</a>
                            <a class="dropdown-item" href="form_painel.php?menu_principal=perfil_usuario">Perfil</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="dados_logout.php">Sair</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="GET">
                    <?php
                    if (isset($_GET['menu_principal'])) {
                        if ($_GET['menu_principal'] == 'analise_vagas') {
                    ?>
                            <input type="hidden" name="menu_principal" value="analise_vagas">
                    <?php
                        }
                    }
                    ?>
                    <input class="form-control mr-sm-2" name="pesquisa" style="width: 300px;" type="text" placeholder="Qual vaga deseja encontrar?">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>
    </div>

    <div style="margin-top: 15px">

        <!-- VAGA ALTERADA COM SUCESSO -->
        <?php
        if (isset($_SESSION['status_update_vaga_success'])) :
        ?>
            <div class="notification is-success">
                <p>Informações da vaga atualizadas com sucesso!</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_update_vaga_success']);
        ?>

        <!-- ERRO AO ATUALIZAR VAGA -->
        <?php
        if (isset($_SESSION['status_update_vaga_error'])) :
        ?>
            <div class="notification is-danger">
                <p>Erro ao alterar informações da vaga, favor tente novamente ou entre em contato com o administrador.</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_update_vaga_error']);
        ?>

        <!-- VAGA EXCLUÍDA COM SUCESSO -->
        <?php
        if (isset($_SESSION['status_delete_vaga_success'])) :
        ?>
            <div class="notification is-success">
                <p>Vaga deletada com sucesso!</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_delete_vaga_success']);
        ?>

        <!-- ERRO AO DELETAR VAGA -->
        <?php
        if (isset($_SESSION['status_delete_vaga_error'])) :
        ?>
            <div class="notification is-danger">
                <p>Erro ao deletar a vaga, favor tente novamente ou entre em contato com o administrador.</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_delete_vaga_error']);
        ?>

        <?php
        if (empty($_GET['menu_principal']) or $_GET['menu_principal'] == 'vagas') {
            include './form_vagas.php';
        }

        if (isset($_GET['menu_principal'])) {
            if ($_GET['menu_principal'] == 'cadastro_vagas') {
                include './form_cadastro_vagas.php';
            }

            if ($_GET['menu_principal'] == 'listagem_usuarios') {
                include './form_listagem_usuarios.php';
            }

            if ($_GET['menu_principal'] == 'perfil_usuario') {
                include './form_perfil_usuario.php';
            }

            if ($_GET['menu_principal'] == 'card_vaga') {
                include './form_card_vaga.php';
            }

            if ($_GET['menu_principal'] == 'banco_talentos') {
                include './form_banco_talentos.php';
            }

            if ($_GET['menu_principal'] == 'analise_vagas') {
                include './form_analise_vagas.php';
            }

            if ($_GET['menu_principal'] == 'especificacoes_vagas') {
                include './form_especificacoes_vaga.php';
            }

            if ($_GET['menu_principal'] == 'minhas_candidaturas') {
                include './form_minhas_candidaturas.php';
            }

            if ($_GET['menu_principal'] == 'informacoes_usuario') {
                include './form_informacoes_usuario.php';
            }
        }
        ?>
    </div>

    <!-- <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-dark" href="form_painel.php">Spaces</a>
        </div>
    </footer> -->

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
</body>

</html>