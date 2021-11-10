<div class="card card-body bg-light" style="min-height: 640px;">

    <!-- VAGA CADASTRADA COM SUCESSO -->
    <?php
    if (isset($_SESSION['status_user_alterado'])) :
    ?>
        <div class="notification is-success">
            <p>Usuário alterado com sucesso!</p>
        </div>
    <?php
    endif;
    unset($_SESSION['status_user_alterado']);
    ?>

    <!-- ERRO AO CADASTRAR A VAGA -->
    <?php
    if (isset($_SESSION['status_user_error'])) :
    ?>
        <div class="notification is-danger">
            <p>Erro ao alterar usuário, favor tente novamente ou entre em contato com o administrador.</p>
        </div>
    <?php
    endif;
    unset($_SESSION['status_user_error']);
    ?>

    <form action="dados_atualiza_usuario.php" method="POST">
        <?php
        $sql_usuarios = 'SELECT * FROM usuarios';
        $result_usuarios = $conexao->query($sql_usuarios);

        if ($result_usuarios->num_rows > 0) { ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Data Cadastro</th>
                        <th scope="col">Tipo Permissão</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row_usuarios = $result_usuarios->fetch_assoc()) {
                    ?>
                        <input type="hidden" name="usuario" value="<?php echo $row_usuarios['usuario'] ?>" />
                        <tr>
                            <th scope="row"><?php echo $row_usuarios['nome'] ?></th>
                            <td><?php echo $row_usuarios['usuario'] ?></td>
                            <td><?php echo $row_usuarios['email'] ?></td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime($row_usuarios['data_cadastro'])) ?></td>
                            <td>
                                <select class="form-control" name="tipo_permissao" id="tipo_permissao">
                                    <?php echo '<option value="' . $row_usuarios['tipo_permissao'] . '">' . $row_usuarios['tipo_permissao'] . '</option>'; ?>
                                    <option value="Time RH">Time RH</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuário">Usuário</option>
                                </select>
                            </td>
                            <td>
                                <input type="submit" class="btn btn-success" value="Salvar" name="btn_salvar" />
                            </td>
                        </tr>
                </tbody>
            <?php
                    }
            ?>
            </table>

        <?php
        } else { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <h5>Nenhum registro encontrado!</h5>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </form>
</div>