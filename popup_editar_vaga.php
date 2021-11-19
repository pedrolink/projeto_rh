<?php
$sql_popup_requisitos_vaga = 'SELECT * FROM requisitos_vagas WHERE id_vaga = "' . $row_vagas['id'] . '"';
$result_popup_requisitos_vaga = mysqli_query($conexao, $sql_popup_requisitos_vaga);
$row_popup_requisitos_vaga = mysqli_fetch_array($result_popup_requisitos_vaga);
?>

<form action="dados_atualiza_vaga.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_vaga" value="<?php echo $row_vagas['id'] ?>">
    <div style="margin-top: 50px" class="modal" tabindex="-1" role="dialog" id="popup_edita_vaga_modal<?php echo $row_vagas['id'] ?>">
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
                                <option value="<?php echo $row_vagas['nivel_ingles'] ?>"><?php echo $row_vagas['nivel_ingles'] ?></option>
                                <option value="Básico">Básico</option>
                                <option value="Intermediário">Intermediário</option>
                                <option value="Avançado">Avançado</option>
                                <option value="Fluente">Fluente</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nível</label>
                            <select name="nivel" class="form-control">
                                <option value="<?php echo $row_vagas['nivel'] ?>"><?php echo $row_vagas['nivel'] ?></option>
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
                    <!-- <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Imagem</label>
                    </div>
                </div> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar alterações</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>