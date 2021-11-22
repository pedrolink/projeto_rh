<?php
$sql_popup_requisitos_vaga = 'SELECT * FROM requisitos_vagas WHERE id_vaga = "' . $row_vagas['id'] . '"';
$result_popup_requisitos_vaga = mysqli_query($conexao, $sql_popup_requisitos_vaga);
$row_popup_requisitos_vaga = mysqli_fetch_array($result_popup_requisitos_vaga);
?>

<form action="dados_atualiza_vaga.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_vaga" value="<?php echo $row_vagas['id'] ?>">
    <div class="modal" tabindex="-1" role="dialog" id="popup_edita_vaga_modal<?php echo $row_vagas['id'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $row_vagas['nome'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Nome da vaga</label>
                            <input type="text" class="form-control" value="<?php echo $row_vagas['nome'] ?>" name="nome_vaga">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Cargo</label>
                            <input type="text" class="form-control" value="<?php echo $row_vagas['cargo'] ?>" name="cargo">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Salário</label>
                            <input type="text" class="form-control" value="<?php echo number_format($row_vagas['salario'], 2, ',', '.') ?>" name="salario">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Localidade</label>
                            <input type="text" class="form-control" value="<?php echo $row_vagas['localidade'] ?>" name="localidade">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nível Inglês</label>
                            <select name="nivel_ingles" class="form-control">
                                <option value="<?php echo $row_vagas['nivel_ingles'] ?>">
                                    <?php
                                    if ($row_vagas['nivel_ingles'] == 1) {
                                        echo 'Básico';
                                    } elseif ($row_vagas['nivel_ingles'] == 2) {
                                        echo 'Intermediário';
                                    } elseif ($row_vagas['nivel_ingles'] == 3) {
                                        echo 'Avançado';
                                    } elseif ($row_vagas['nivel_ingles'] == 4) {
                                        echo 'Fluente';
                                    }
                                    ?>
                                </option>
                                <option value="Básico">Básico</option>
                                <option value="Intermediário">Intermediário</option>
                                <option value="Avançado">Avançado</option>
                                <option value="Fluente">Fluente</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nível</label>
                            <select name="nivel" class="form-control">
                                <option value="<?php echo $row_vagas['nivel'] ?>">
                                    <?php
                                    if ($row_vagas['nivel'] == 1) {
                                        echo 'Estagiário';
                                    } elseif ($row_vagas['nivel'] == 2) {
                                        echo 'Júnior';
                                    } elseif ($row_vagas['nivel'] == 3) {
                                        echo 'Pleno';
                                    } elseif ($row_vagas['nivel'] == 4) {
                                        echo 'Sênior';
                                    } elseif ($row_vagas['nivel'] == 5) {
                                        echo 'Gerente';
                                    }
                                    ?>
                                </option>
                                <option value="Estagiário">Estágio</option>
                                <option value="Júnior">Júnior</option>
                                <option value="Pleno">Pleno</option>
                                <option value="Sênior">Sênior</option>
                                <option value="Gerente">Gerente</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Descrição</label>
                            <textarea class="form-control" name="descricao" value="<?php echo $row_vagas['descricao'] ?>" cols="10" rows="2"><?php echo $row_vagas['descricao'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Requisitos</label>
                            <textarea class="form-control" name="requisitos" value="<?php echo $row_popup_requisitos_vaga['requisitos'] ?>" cols="10" rows="2"><?php echo $row_popup_requisitos_vaga['requisitos'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Imagem da vaga</label>
                        </div>
                    </div>
                    <div class="form-row" style="margin-top: -15px;">
                        <div class="form-group col-md-12">
                            <input type="file" name="imagem_vaga">
                            <input type="hidden" name="input_imagem_vaga" value="<?php echo $row_vagas['imagem'] ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar alterações</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</form>