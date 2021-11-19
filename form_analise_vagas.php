<?php
if (isset($_GET['pesquisa'])) {
    $pesquisa = str_replace(',', '.', str_replace('.', '', $_GET['pesquisa']));
    if (is_numeric($pesquisa)) {
        $sql_analise = 'SELECT * FROM vagas WHERE salario >= "' . $pesquisa . '"';
        $result_analise = $conexao->query($sql_analise);
    } else {
        $sql_analise = 'SELECT * FROM vagas WHERE nome LIKE "%' . $pesquisa . '%" OR cargo LIKE "%' . $pesquisa . '%" OR localidade LIKE "%' . $pesquisa . '%"';
        $result_analise = $conexao->query($sql_analise);
    }
} else {
    $sql_analise = 'SELECT * FROM vagas ORDER BY id DESC';
    $result_analise = $conexao->query($sql_analise);
}

if ($result_analise->num_rows > 0) { ?>
    <div style="width: 1200px; margin-left: 170px">
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
                        <th scope="row"><?php echo $row_analise['id']?></th>
                        <td><a href="form_painel.php?menu_principal=especificacoes_vagas&id=<?php echo $row_analise['id'] ?>"> <?php echo $row_analise['nome']?> </a></td>
                        <td><?php echo $row_analise['cargo']?></td>
                        <td><?php echo $row_analise['localidade']?></td>
                        <td><?php echo $row_analise['nivel']?></td>
                        <td>R$ <?php echo number_format($row_analise['salario'], 2, ',', '.')?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
} else {
}
?>