<?php

$sql_minhas_cadidaturas = 'SELECT * FROM candidatos_vaga WHERE id_usuario = "' . $row_informacoes_usuario['id'] . '"';
$result_minhas_cadidaturas = $conexao->query($sql_minhas_cadidaturas);

while ($row_minhas_cadidaturas = $result_minhas_cadidaturas->fetch_assoc()) {
    $sql_vaga_candidatura = 'SELECT * FROM vagas WHERE id = "' . $row_minhas_cadidaturas['id_vaga'] . '"';
    $result_vaga_candidatura = mysqli_query($conexao, $sql_vaga_candidatura);
    $row_vaga_candidatura = mysqli_fetch_array($result_vaga_candidatura);
?>

    <div class="card" style="width: 18rem;">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    
    <div class="card" style="width: 18rem;">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
<?php } ?>