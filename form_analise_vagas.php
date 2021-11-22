<?php
if (isset($_GET['pesquisa'])) {
    $pesquisa = str_replace(',', '.', str_replace('.', '', $_GET['pesquisa']));
    if (is_numeric($pesquisa)) {
        $sql_analise = 'SELECT * FROM vagas WHERE salario >= "' . $pesquisa . '" and ativa = "Sim"';
        $result_analise = $conexao->query($sql_analise);
    } else {
        $sql_analise = 'SELECT * FROM vagas WHERE nome LIKE "%' . $pesquisa . '%" OR cargo LIKE "%' . $pesquisa . '%" OR localidade LIKE "%' . $pesquisa . '%" and ativa = "Sim"';
        $result_analise = $conexao->query($sql_analise);
    }
} else {
    $sql_analise = 'SELECT * FROM vagas WHERE ativa = "Sim" ORDER BY id DESC';
    $result_analise = $conexao->query($sql_analise);
}

if ($result_analise->num_rows > 0) { ?>
    <div style="width: 1200px; margin-left: 170px">

        <!-- VAGA INATIVADA COM SUCESSO -->
        <?php
        if (isset($_SESSION['status_vaga_inativada_success'])) :
        ?>
            <div class="notification is-success">
                <p>Vaga inativada com sucesso!</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_vaga_inativada_success']);
        ?>

        <!-- ERRO AO INVATIVAR A VAGA -->
        <?php
        if (isset($_SESSION['status_vaga_inativada_error'])) :
        ?>
            <div class="notification is-danger">
                <p>Erro ao inativar a vaga, favor tente novamente ou entre em contato com o administrador.</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_vaga_inativada_error']);
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID Vaga</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Localidade</th>
                    <th scope="col">Nível</th>
                    <th scope="col">Salário</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row_analise = $result_analise->fetch_assoc()) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row_analise['id'] ?></th>
                        <td><a href="form_painel.php?menu_principal=especificacoes_vagas&id=<?php echo $row_analise['id'] ?>"> <?php echo $row_analise['nome'] ?> </a></td>
                        <td><?php echo $row_analise['cargo'] ?></td>
                        <td><?php echo $row_analise['localidade'] ?></td>
                        <td>
                            <?php
                            if ($row_analise['nivel'] == 0) {
                                echo 'Estagiário';
                            } elseif ($row_analise['nivel'] == 1) {
                                echo 'Júnior';
                            } elseif ($row_analise['nivel'] == 2) {
                                echo 'Pleno';
                            } elseif ($row_analise['nivel'] == 3) {
                                echo 'Sênior';
                            } elseif ($row_analise['nivel'] == 4) {
                                echo 'Gerente';
                            }
                            ?>
                        </td>
                        <td>R$ <?php echo number_format($row_analise['salario'], 2, ',', '.') ?></td>
                        <td><a type="button" class="btn btn-danger" href="dados_fecha_vaga.php?id_vaga=<?php echo $row_analise['id'] ?>" style="margin-top: -5px;">Finalizar vaga</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
} else { ?>
    <div class="card card-body bg-light" style="min-height: 640px;">

        <!-- VAGA INATIVADA COM SUCESSO -->
        <?php
        if (isset($_SESSION['status_vaga_inativada_success'])) :
        ?>
            <div class="notification is-success">
                <p>Vaga inativada com sucesso!</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_vaga_inativada_success']);
        ?>

        <!-- ERRO AO INVATIVAR A VAGA -->
        <?php
        if (isset($_SESSION['status_vaga_inativada_error'])) :
        ?>
            <div class="notification is-danger">
                <p>Erro ao inativar a vaga, favor tente novamente ou entre em contato com o administrador.</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_vaga_inativada_error']);
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h5>Nenhuma vaga cadastrada até o momento...</h5>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php } ?>