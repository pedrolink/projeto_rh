<?php
$sql_informacoes_vaga = 'SELECT * FROM vagas WHERE id = "' . $_GET['id'] . '"';
$result_informacoes_vaga = mysqli_query($conexao, $sql_informacoes_vaga);
$row_informacoes_vaga = mysqli_fetch_array($result_informacoes_vaga);

$sql_requisitos_vaga = 'SELECT * FROM requisitos_vagas WHERE id_vaga = "' . $_GET['id'] . '"';
$result_requisitos_vaga = mysqli_query($conexao, $sql_requisitos_vaga);
$row_requisitos_vaga = mysqli_fetch_array($result_requisitos_vaga);
?>

<div class="container marketing">

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
            <button type="button" class="btn btn-success btn-lg btn-block">Candidatar-se</button>
        </div>
        <div class="col-md-5">
            <img src="images/card_image_people.jpg" alt="Avatar" style="border-radius: 10%;" width="600" height="600">
        </div>
    </div>

    <hr class="featurette-divider">

</div>