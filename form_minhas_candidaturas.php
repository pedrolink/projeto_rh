<?php

$sql_minhas_cadidaturas = 'SELECT * FROM candidatos_vaga WHERE id_usuario = "' . $row_informacoes_usuario['id'] . '" ORDER BY id DESC';
$result_minhas_cadidaturas = $conexao->query($sql_minhas_cadidaturas);

if ($result_minhas_cadidaturas->num_rows > 0) {
    while ($row_minhas_cadidaturas = $result_minhas_cadidaturas->fetch_assoc()) {
        $sql_vaga_candidatura = 'SELECT * FROM vagas WHERE id = "' . $row_minhas_cadidaturas['id_vaga'] . '"';
        $result_vaga_candidatura = mysqli_query($conexao, $sql_vaga_candidatura);
        $row_vaga_candidatura = mysqli_fetch_array($result_vaga_candidatura);
?>
        <div style="width: 1200px; margin-left: 170px">
            <div class="card" style="margin-top: 20px">
                <div class="card-header">
                    <?php echo $row_vaga_candidatura['nome'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row_vaga_candidatura['cargo'] ?></h5>
                    <p class="card-text">
                        <?php
                        echo 'Nível: ';
                        if ($row_vaga_candidatura['nivel'] == 0) {
                            echo 'Estagiário';
                        } elseif ($row_vaga_candidatura['nivel'] == 1) {
                            echo 'Júnior';
                        } elseif ($row_vaga_candidatura['nivel'] == 2) {
                            echo 'Pleno';
                        } elseif ($row_vaga_candidatura['nivel'] == 3) {
                            echo 'Sênior';
                        } elseif ($row_vaga_candidatura['nivel'] == 4) {
                            echo 'Gerente';
                        }
                        ?>
                    </p>
                    <p class="card-text">Salário: R$ <?php echo number_format($row_vaga_candidatura['salario'], 2, ',', '.') ?></p>
                    <p class="card-text">
                        <?php
                        echo 'Nível inglês: ';
                        if ($row_vaga_candidatura['nivel_ingles'] == 0) {
                            echo 'Básico';
                        } elseif ($row_vaga_candidatura['nivel_ingles'] == 1) {
                            echo 'Intermediário';
                        } elseif ($row_vaga_candidatura['nivel_ingles'] == 2) {
                            echo 'Avançado';
                        } elseif ($row_vaga_candidatura['nivel_ingles'] == 3) {
                            echo 'Fluente';
                        }
                        ?>
                    </p>
                    <p class="card-text"><?php echo $row_vaga_candidatura['descricao'] ?></p>
                    <a href="form_painel.php?menu_principal=card_vaga&id=<?php echo $row_minhas_cadidaturas['id_vaga'] ?>" class="btn btn-primary">Ir para vaga</a>
                </div>
            </div>
        </div>
    <?php }
} else { ?>
    <div class="card card-body bg-light" style="min-height: 640px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h5>Você não se candidatou a nenhuma vaga até o momento :(</h5>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php } ?>