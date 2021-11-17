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
                            <div class="col-md-4" style="margin-top: 15px">
                                <div class="card">
                                    <?php if ($row_vagas['imagem']):  ?>
                                        <img src="<?php echo $row_vagas['imagem'] ?>" class="card-img-top" alt="Imagem perfil 1" width="288px" height="288px">
                                    <?php else: ?>
                                        <img src="images/jobs.png" class="card-img-top" alt="Imagem perfil 1" width="288px !important" height="288px !important">
                                    <?php endif ?>
                                    <div class="card-header">
                                        <h6><?php echo $row_vagas['nome'] ?></h6>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Cargo:</b> <?php echo $row_vagas['cargo'] ?></li>
                                        <li class="list-group-item"><b>Localidade:</b> <?php echo $row_vagas['localidade'] ?></li>
                                        <li class="list-group-item"><b>Nível:</b> <?php echo $row_vagas['nivel'] ?></li>
                                        <li class="list-group-item"><b>Salário:</b> R$ <?php echo number_format($row_vagas['salario'], 2, ',', '.') ?></li>
                                        <li class="list-group-item" align="center"><a type="button" class="btn btn-primary" href="form_painel.php?menu_principal=card_vaga&id=<?php echo $row_vagas['id'] ?>">Acessar a vaga</a></li>
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
        } else {
        }
        ?>

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