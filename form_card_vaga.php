<?php
$sql_informacoes_vaga = 'SELECT * FROM vagas WHERE id = "' . $_GET['id'] . '"';
$result_informacoes_vaga = mysqli_query($conexao, $sql_informacoes_vaga);
$row_informacoes_vaga = mysqli_fetch_array($result_informacoes_vaga);

$sql_requisitos_vaga = 'SELECT * FROM requisitos_vagas WHERE id_vaga = "' . $_GET['id'] . '"';
$result_requisitos_vaga = mysqli_query($conexao, $sql_requisitos_vaga);
$row_requisitos_vaga = mysqli_fetch_array($result_requisitos_vaga);
?>

<div class="container marketing">

    <!-- CANDIDATURA EFETUADA COM SUCESSO -->
    <?php
    if (isset($_SESSION['candidato_vaga_success'])) :
    ?>
        <div class="notification is-success">
            <p>Candidatura efetuada com sucesso! Logo entraremos em contato com você, boa sorte :)</p>
        </div>
    <?php
    endif;
    unset($_SESSION['candidato_vaga_success']);
    ?>

    <!-- ERRO AO SE CANDIDATAR-SE -->
    <?php
    if (isset($_SESSION['candidato_vaga_error'])) :
    ?>
        <div class="notification is-danger">
            <p>Erro ao cadastrar informações, favor tente novamente ou entre em contato com o administrador.</p>
        </div>
    <?php
    endif;
    unset($_SESSION['candidato_vaga_error']);
    ?>

    <!-- PERFIL JÁ SE CANDIDATOU PARA A VAGA -->
    <?php
    if (isset($_SESSION['cadidato_vaga_cadastrado_error'])) :
    ?>
        <div class="notification is-warning">
            <p>Perfil já cadastrado na vaga. Aguarde entrarmos em contato com você.</p>
        </div>
    <?php
    endif;
    unset($_SESSION['cadidato_vaga_cadastrado_error']);
    ?>

    <div class="row" align="center">
        <div class="col-lg-4">
            <img src="images/cifrao_circle.png" alt="Avatar" width="150" height="120">
        </div>
        <div class="col-lg-4">
            <img src="images/maleta_circle.png" alt="Avatar" width="150" height="120">
        </div>
        <div class="col-lg-4">
            <img src="images/code_circle.png" alt="Avatar" width="150" height="120">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading"><?php echo $row_informacoes_vaga['nome'] ?></h2>
            <h5 style="margin-top: 20px;"><span class="text-muted">Descrição:</span></h5>
            <p class="lead"><?php echo $row_informacoes_vaga['descricao'] ?></p>
            <h5 style="margin-top: 20px;"><span class="text-muted">Requisitos:</span></h5>
            <p class="lead"><?php echo $row_requisitos_vaga['requisitos'] ?></p>
            <form action="dados_candidatar_vaga.php" method="POST">
                <input type="hidden" name="id_vaga" value="<?php echo $_GET['id'] ?>">
                <button type="submit" class="btn btn-success btn-lg btn-block">Candidatar-se</button>
            </form>
        </div>
        <div class="col-md-5">
            <img src="images/card_image_people.jpg" alt="Avatar" style="border-radius: 10%;" width="600" height="600">
        </div>
    </div>

    <hr class="featurette-divider">
</div>