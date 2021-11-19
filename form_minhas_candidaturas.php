<?php

$sql_minhas_cadidaturas = 'SELECT * FROM candidatos_vaga WHERE id_usuario = "' . $row_informacoes_usuario['id'] . '" ORDER BY id DESC';
$result_minhas_cadidaturas = $conexao->query($sql_minhas_cadidaturas);

while ($row_minhas_cadidaturas = $result_minhas_cadidaturas->fetch_assoc()) {
    $sql_vaga_candidatura = 'SELECT * FROM vagas WHERE id = "' . $row_minhas_cadidaturas['id_vaga'] . '"';
    $result_vaga_candidatura = mysqli_query($conexao, $sql_vaga_candidatura);
    $row_vaga_candidatura = mysqli_fetch_array($result_vaga_candidatura);
?>
    <div style="width: 1200px; margin-left: 170px">
        <div class="card">
            <div class="card-header">
                <?php echo $row_vaga_candidatura['nome'] ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row_vaga_candidatura['cargo'] ?></h5>
                <p class="card-text">Nível: <?php echo $row_vaga_candidatura['nivel'] ?></p>
                <p class="card-text">Salário: R$ <?php echo number_format($row_vaga_candidatura['salario'], 2, ',', '.') ?></p>
                <p class="card-text">Nível Inglês: <?php echo $row_vaga_candidatura['nivel_ingles'] ?></p>
                <p class="card-text"><?php echo $row_vaga_candidatura['descricao'] ?></p>
                <a href="form_painel.php?menu_principal=card_vaga&id=<?php echo $row_minhas_cadidaturas['id_vaga'] ?>" class="btn btn-primary">Ir para vaga</a>
            </div>
        </div>
    </div>

<?php } ?>