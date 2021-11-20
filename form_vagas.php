<?php
if (mysqli_num_rows($result_competencia_usuario) > 0) :
?>
    <?php
    if (isset($_GET['pesquisa'])) {
        $pesquisa = str_replace(',', '.', str_replace('.', '', $_GET['pesquisa']));
        if (is_numeric($pesquisa)) {
            $sql_vagas = 'SELECT * FROM vagas WHERE salario >= "' . $pesquisa . '"';
            $result_vagas = $conexao->query($sql_vagas);
        } else {
            $sql_vagas = 'SELECT * FROM vagas WHERE nome LIKE "%' . $pesquisa . '%" OR cargo LIKE "%' . $pesquisa . '%" OR localidade LIKE "%' . $pesquisa . '%"';
            $result_vagas = $conexao->query($sql_vagas);
        }
    } else {
        $sql_vagas = 'SELECT * FROM vagas ORDER BY id DESC';
        $result_vagas = $conexao->query($sql_vagas);
    }

    if ($result_vagas->num_rows > 0) { ?>
        <div id="team-area">
            <div class="container">
                <div class="row">
                    <?php
                    while ($row_vagas = $result_vagas->fetch_assoc()) {
                    ?>
                        <?php include './popup_editar_vaga.php' ?>
                        <div class="col-md-4" style="margin-top: 15px">
                            <div class="card">
                                <?php if ($row_vagas['imagem']) :  ?>
                                    <img src="images/vagas_images/<?php echo $row_vagas['imagem'] ?>" class="card-img-top" alt="Imagem perfil 1" width="288px" height="288px">
                                <?php else : ?>
                                    <img src="images/jobs.png" class="card-img-top" alt="Imagem perfil 1" width="288px !important" height="288px !important">
                                <?php endif ?>
                                <div class="card-header">
                                    <h6><?php echo $row_vagas['nome'] ?></h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Cargo:</b> <?php echo $row_vagas['cargo'] ?></li>
                                    <li class="list-group-item"><b>Localidade:</b> <?php echo $row_vagas['localidade'] ?></li>
                                    <li class="list-group-item"><b>Nível:</b>
                                        <?php
                                        if ($row_vagas['nivel'] == 0) {
                                            echo 'Estagiário';
                                        } elseif ($row_vagas['nivel'] == 1) {
                                            echo 'Júnior';
                                        } elseif ($row_vagas['nivel'] == 2) {
                                            echo 'Pleno';
                                        } elseif ($row_vagas['nivel'] == 3) {
                                            echo 'Sênior';
                                        } elseif ($row_vagas['nivel'] == 4) {
                                            echo 'Gerente';
                                        }
                                        ?>
                                    </li>
                                    <li class="list-group-item"><b>Salário:</b> R$ <?php echo number_format($row_vagas['salario'], 2, ',', '.') ?></li>
                                    <?php
                                    if ($row_informacoes_usuario['tipo_permissao'] == 'Administrador' or $row_informacoes_usuario['tipo_permissao'] == 'Time RH') :
                                    ?>
                                        <li class="list-group-item" align="center">
                                            <a type="button" class="btn btn-primary" href="form_painel.php?menu_principal=card_vaga&id=<?php echo $row_vagas['id'] ?>">Acessar a vaga</a>
                                            <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#popup_edita_vaga_modal<?php echo $row_vagas['id'] ?>">Editar</a>
                                            <input type="hidden" name="id_vaga_exluir" value="<?php echo $row_vagas['id'] ?>">
                                            <a type="button" class="btn btn-danger" href="dados_excluir_vaga.php?id_vaga_exluir=<?php echo $row_vagas['id'] ?>">Excluir</a>
                                        </li>
                                    <?php
                                    else :
                                    ?>
                                        <li class="list-group-item" align="center">
                                            <a type="button" class="btn btn-primary" href="form_painel.php?menu_principal=card_vaga&id=<?php echo $row_vagas['id'] ?>">Acessar a vaga</a>
                                        </li>
                                    <?php
                                    endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
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
                            <h5>Nenhuma vaga cadastrada até o momento, volte mais tarde e verifique as oportunidades! :)</h5>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>

<?php
else :
?>
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
                        <h5>Para acessar o painel de vagas, complete seu perfil clicando <a style="color: green" href="form_painel.php?menu_principal=perfil_usuario">aqui</a>!</h5>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php
endif
?>