<script>
    function voltaURL(){
        var url = document.referrer;
        window.location = url;
    }
</script>

<div align="left" style="margin-left: 30px">
    <i class="bi bi-arrow-bar-left"></i>
    <a type="button" class="btn btn-dark" onclick="return voltaURL();" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16" style="margin-top: -5px; margin-right: 10px">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
        Voltar
    </a>
</div>

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome candidato</th>
                <th scope="col">E-mail</th>
                <th scope="col">Pretenção Salarial</th>
                <th scope="col">Nível</th>
                <th scope="col">Cidade</th>
                <th scope="col">Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_pesquisa_candidatos_vaga = 'SELECT * FROM candidatos_vaga WHERE id_vaga = "' . $_GET['id'] . '"';
            $result_pesquisa_candidatos_vaga = mysqli_query($conexao, $sql_pesquisa_candidatos_vaga);

            while ($row_pesquisa_candidatos_vaga = mysqli_fetch_array($result_pesquisa_candidatos_vaga)) :

                $sql_pesquisa_candidatos = 'SELECT * FROM usuarios WHERE id = "' . $row_pesquisa_candidatos_vaga['id_usuario'] . '"';
                $result_pesquisa_candidatos = mysqli_query($conexao, $sql_pesquisa_candidatos);
                $row_pesquisa_candidatos = mysqli_fetch_array($result_pesquisa_candidatos);

                $sql_pesquisa_candidatos_competencias = 'SELECT * FROM competencias_usuario WHERE id_usuario = "' . $row_pesquisa_candidatos_vaga['id_usuario'] . '"';
                $result_pesquisa_candidatos_competencias = mysqli_query($conexao, $sql_pesquisa_candidatos_competencias);
                $row_pesquisa_candidatos_competencias = mysqli_fetch_array($result_pesquisa_candidatos_competencias);

                // PESQUISA CANDIDATOS NO BANCO DE TALENTOS OU SELECIONADOS PARA A VAGA
                $color = '';

                $sql_pesquisa_selecionado = 'SELECT * FROM gestao_candidatos_selecionados WHERE id_usuario = "' . $row_pesquisa_candidatos_vaga['id_usuario'] . '"';
                $result_pesquisa_selecionado = mysqli_query($conexao, $sql_pesquisa_selecionado);
                if ($result_pesquisa_selecionado->num_rows > 0) {
                    $color = 'table-success';
                }

                $sql_pesquisa_banco_talentos = 'SELECT * FROM gestao_banco_talentos WHERE id_usuario = "' . $row_pesquisa_candidatos_vaga['id_usuario'] . '"';
                $result_pesquisa_banco_talentos = mysqli_query($conexao, $sql_pesquisa_banco_talentos);
                if ($result_pesquisa_banco_talentos->num_rows > 0) {
                    $color = 'table-primary';
                }

            ?>
                <tr class="<?php echo $color ?>">
                    <th scope="row"><?php echo $row_pesquisa_candidatos['nome'] ?></th>
                    <td><?php echo $row_pesquisa_candidatos['email'] ?></td>
                    <td><?php echo 'R$ ' . number_format($row_pesquisa_candidatos_competencias['pretencao_salarial'], 2, ',', '.') ?></td>
                    <td>
                        <?php
                        if ($row_pesquisa_candidatos_competencias['nivel'] == 0) {
                            echo 'Estágio';
                        } elseif ($row_pesquisa_candidatos_competencias['nivel'] == 1) {
                            echo 'Júnior';
                        } elseif ($row_pesquisa_candidatos_competencias['nivel'] == 2) {
                            echo 'Pleno';
                        } elseif ($row_pesquisa_candidatos_competencias['nivel'] == 3) {
                            echo 'Sênior';
                        } elseif ($row_pesquisa_candidatos_competencias['nivel'] == 4) {
                            echo 'Gerente';
                        } 
                        ?>
                    </td>
                    <td><?php echo $row_pesquisa_candidatos_competencias['cidade'] . ' ' . $row_pesquisa_candidatos_competencias['estado'] ?></td>
                    <td><?php echo $row_pesquisa_candidatos_competencias['telefone_primario'] ?></td>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>