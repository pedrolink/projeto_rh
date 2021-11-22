<div class="container bg-light" style="height: 270px; border-radius: 20px 20px;">
    <form action="">
        <div class="row g-2" style="margin-top: 20px">
            <div class="col-6">
                <h4>Pesquisa Painel Gerenciador</h4>
            </div>
        </div>
        <div class="row g-2" style="margin-top: 20px">
            <div class="col-3">
                <label>Nome da vaga</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-3">
                <label>Cargo</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-2">
                <label>Localidade</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-2">
                <label>Salário</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-2" style="margin-top: 28px; margin-left: -15px">
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row g-2" style="margin-top: 20px">
            <div class="col-3">
                <label>Nível</label>
                <select name="" class="form-control">
                    <option value="">Selecione um nível</option>
                </select>
            </div>
            <div class="col-3">
                <label>Nível Inglês</label>
                <select name="" class="form-control">
                    <option value="">Selecione um nível</option>
                </select>
            </div>
            <div class="col-2">
                <label>Ativa</label>
                <select name="" class="form-control">
                    <option value="">Sim</option>
                    <option value="">Não</option>
                </select>
            </div>
        </div>
        <div class="row g-2" style="margin-top: 20px">
            <div class="col-2">
                <button class="btn btn-success">Pesquisar</button>
            </div>
        </div>
    </form>
</div>

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome vaga</th>
                <th scope="col">Cargo</th>
                <th scope="col">Nível</th>
                <th scope="col">Salário</th>
                <th scope="col">Localidade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $condicao = '';
            if ($condicao) {
                echo 'condição';
            } else {
                $sql_pesquisa_vagas = 'SELECT * FROM vagas WHERE ativa = "Sim"';
            }

            $result_pesquisa_vagas = mysqli_query($conexao, $sql_pesquisa_vagas);
            while ($row_pesquisa_vagas = mysqli_fetch_array($result_pesquisa_vagas)) :
            ?>
                <tr>
                    <th scope="row"><a href="form_painel.php?menu_principal=tabelas_candidatos&id=<?php echo $row_pesquisa_vagas['id'] ?>"><?php echo $row_pesquisa_vagas['nome'] ?></a></th>
                    <td><?php echo $row_pesquisa_vagas['cargo'] ?></td>
                    <td>
                        <?php
                        if ($row_pesquisa_vagas['nivel'] == 0) {
                            echo 'Estágio';
                        } elseif ($row_pesquisa_vagas['nivel'] == 1) {
                            echo 'Júnior';
                        } elseif ($row_pesquisa_vagas['nivel'] == 2) {
                            echo 'Pleno';
                        } elseif ($row_pesquisa_vagas['nivel'] == 3) {
                            echo 'Sênior';
                        } elseif ($row_pesquisa_vagas['nivel'] == 4) {
                            echo 'Gerente';
                        }
                        ?>
                    </td>
                    <td><?php echo 'R$ ' . number_format($row_pesquisa_vagas['salario'], 2, ',', '.') ?></td>
                    <td><?php echo $row_pesquisa_vagas['localidade'] ?></td>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>