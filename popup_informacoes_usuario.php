<?php
$sql_popup_competencias_usuario = 'SELECT * FROM competencias_usuario WHERE id_usuario = "' . $row_melhor_candidato_usuario['id'] . '"';
$result_popup_competencias_usuario = mysqli_query($conexao, $sql_popup_competencias_usuario);
$row_popup_competencias_usuario = mysqli_fetch_array($result_popup_competencias_usuario);
?>

<input type="hidden" name="id_vaga" value="<?php echo $row_melhor_candidato_usuario['id'] ?>">
<div class="modal" tabindex="-1" role="dialog" id="popup_informacoes_usuario<?php echo $row_melhor_candidato_usuario['id'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo $row_melhor_candidato_usuario['nome'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Endereço Principal</label>
                        <input type="text" class="form-control" value="<?php echo $row_melhor_usuario_competencias['endereco_principal'] ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Endereço Secundário</label>
                        <input type="text" class="form-control" value="<?php echo $row_melhor_usuario_competencias['endereco_secundario'] ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Pretenção Salarial</label>
                        <input type="text" class="form-control" value="<?php echo number_format($row_melhor_usuario_competencias['pretencao_salarial'], 2, ',', '.') ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nível Inglês</label>
                        <input type="text" class="form-control" value="<?php
                                                                        if ($row_melhor_usuario_competencias['nivel_ingles'] == 0) {
                                                                            echo 'Básico';
                                                                        } elseif ($row_melhor_usuario_competencias['nivel_ingles'] == 1) {
                                                                            echo 'Intermediário';
                                                                        } elseif ($row_melhor_usuario_competencias['nivel_ingles'] == 2) {
                                                                            echo 'Avançado';
                                                                        } elseif ($row_melhor_usuario_competencias['nivel_ingles'] == 3) {
                                                                            echo 'Fluente';
                                                                        }
                                                                        ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Telefone Primário</label>
                        <input type="text" class="form-control" value="<?php echo $row_melhor_usuario_competencias['telefone_primario'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telefone Secundário</label>
                        <input type="text" class="form-control" value="<?php echo $row_melhor_usuario_competencias['telefone_secundario'] ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Habilidades</label>
                        <textarea class="form-control" cols="10" rows="2" disabled><?php echo $row_melhor_usuario_competencias['habilidades'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Adicionar Banco de Talentos</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>