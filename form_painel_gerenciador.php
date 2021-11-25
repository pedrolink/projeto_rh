<?php
if (isset($_GET['nome_vaga'])) {
    $nome_vaga = $_GET['nome_vaga'];
} else {
    $nome_vaga = '';
}

if (isset($_GET['cargo'])) {
    $cargo = $_GET['cargo'];
} else {
    $cargo = '';
}

if (isset($_GET['localidade'])) {
    $localidade = $_GET['localidade'];
} else {
    $localidade = '';
}

if (isset($_GET['salario_inicial'])) {
    $salario_inicial = $_GET['salario_inicial'];
} else {
    $salario_inicial = '';
}

if (isset($_GET['salario_final'])) {
    $salario_final = $_GET['salario_final'];
} else {
    $salario_final = '';
}

if (isset($_GET['nivel'])) {
    $nivel = $_GET['nivel'];
} else {
    $nivel = '';
}

if (isset($_GET['nivel_ingles'])) {
    $nivel_ingles = $_GET['nivel_ingles'];
} else {
    $nivel_ingles = '';
}
?>
<div class="container bg-light" style="height: 270px; border-radius: 20px 20px;">
    <form action="">
        <input type="hidden" name="menu_principal" value="painel_gerenciador">
        <div class="row g-2" style="margin-top: 20px">
            <div class="col-6">
                <h4>Pesquisa Painel Gerenciador</h4>
            </div>
        </div>
        <div class="row g-2" style="margin-top: 20px">
            <div class="col-3">
                <label>Nome da vaga</label>
                <input type="text" name="nome_vaga" value="<?php echo $nome_vaga ?>" class="form-control">
            </div>
            <div class="col-3">
                <label>Cargo</label>
                <input type="text" name="cargo" value="<?php echo $cargo ?>" class="form-control">
            </div>
            <div class="col-2">
                <label>Localidade</label>
                <input type="text" name="localidade" value="<?php echo $localidade ?>" class="form-control">
            </div>
            <div class="col-2">
                <label>Salário</label>
                <input type="text" name="salario_inicial" value="<?php echo $salario_inicial ?>" class="form-control">
            </div>
            <div class="col-2" style="margin-top: 28px; margin-left: -15px">
                <input type="text" name="salario_final" value="<?php echo $salario_final ?>" class="form-control">
            </div>
        </div>
        <div class="row g-2" style="margin-top: 20px">
            <div class="col-3">
                <label>Nível</label>
                <select name="nivel" class="form-control">
                    <option value="<?php echo $nivel ?>">
                        <?php
                        if ($nivel == 1) {
                            echo 'Estagiário';
                        } elseif ($nivel == 2) {
                            echo 'Júnior';
                        } elseif ($nivel == 3) {
                            echo 'Pleno';
                        } elseif ($nivel == 4) {
                            echo 'Sênior';
                        } elseif ($nivel == 5) {
                            echo 'Gerente';
                        }
                        ?>
                    </option>
                    <option value="1">Estagiário</option>
                    <option value="2">Júnior</option>
                    <option value="3">Pleno</option>
                    <option value="4">Sênior</option>
                    <option value="5">Gerente</option>
                </select>
            </div>
            <div class="col-3">
                <label>Nível Inglês</label>
                <select name="nivel_ingles" class="form-control">
                    <option value="<?php echo $nivel_ingles ?>">
                        <?php
                        if ($nivel_ingles == 1) {
                            echo 'Básico';
                        } elseif ($nivel_ingles == 2) {
                            echo 'Intermediário';
                        } elseif ($nivel_ingles == 3) {
                            echo 'Avançado';
                        } elseif ($nivel_ingles == 4) {
                            echo 'Fluente';
                        }
                        ?>
                    </option>
                    <option value="1">Básico</option>
                    <option value="2">Intermediário</option>
                    <option value="3">Avançado</option>
                    <option value="4">Fluente</option>
                </select>
            </div>
            <div class="col-2">
                <label>Ativa</label>
                <select name="ativa" class="form-control" required>
                    <option value="">Selecione</option>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
            </div>
        </div>
        <div class="row g-2" style="margin-top: 20px">
            <div class="col-2">
                <button type="submit" class="btn btn-success">Pesquisar</button>
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
            // CONDIÇÕES
            $condicao = '';

            if (!empty($_GET['nome_vaga'])) {
                if ($condicao == '') {
                    $condicao .= 'nome LIKE "%' . $_GET['nome_vaga'] . '%"';
                } else {
                    $condicao .= ' AND nome LIKE "%' . $_GET['nome_vaga'] . '%"';
                }
            }

            if (!empty($_GET['cargo'])) {
                if ($condicao == '') {
                    $condicao .= 'cargo LIKE "%' . $_GET['cargo'] . '%"';
                } else {
                    $condicao .= ' AND cargo LIKE "%' . $_GET['cargo'] . '%"';
                }
            }

            if (!empty($_GET['salario_inicial']) and !empty($_GET['salario_final'])) {
                if ($condicao == '') {
                    $condicao .= 'salario >= "' . str_replace(',', '.', str_replace('.', '', $_GET['salario_inicial'])) . '" AND salario <= "' . str_replace(',', '.', str_replace('.', '', $_GET['salario_final'])) . '"';
                } else {
                    $condicao .= ' AND salario >= "' . str_replace(',', '.', str_replace('.', '', $_GET['salario_inicial'])) . '" AND salario <= "' . str_replace(',', '.', str_replace('.', '', $_GET['salario_final'])) . '"';
                }
            }

            if (!empty($_GET['localidade'])) {
                if ($condicao == '') {
                    $condicao .= 'localidade LIKE "%' . $_GET['localidade'] . '%"';
                } else {
                    $condicao .= ' AND localidade LIKE "%' . $_GET['localidade'] . '%"';
                }
            }

            if (!empty($_GET['nivel'])) {
                if ($condicao == '') {
                    $condicao .= 'nivel = "' . $_GET['nivel'] . '"';
                } else {
                    $condicao .= ' AND nivel = "' . $_GET['nivel'] . '"';
                }
            }

            if (!empty($_GET['nivel_ingles'])) {
                if ($condicao == '') {
                    $condicao .= 'nivel_ingles = "' . $_GET['nivel_ingles'] . '"';
                } else {
                    $condicao .= ' AND nivel_ingles = "' . $_GET['nivel_ingles'] . '"';
                }
            }

            if (!empty($_GET['ativa'])) {
                if ($condicao == '') {
                    $condicao .= 'ativa = "' . $_GET['ativa'] . '"';
                } else {
                    $condicao .= ' AND ativa = "' . $_GET['ativa'] . '"';
                }
            }

            if ($condicao) {
                $sql_pesquisa_vagas = 'SELECT * FROM vagas WHERE ' . $condicao . ' ORDER BY id DESC';
            } else {
                $sql_pesquisa_vagas = 'SELECT * FROM vagas WHERE ativa = "Sim" ORDER BY id DESC';
            }

            $result_pesquisa_vagas = mysqli_query($conexao, $sql_pesquisa_vagas);
            while ($row_pesquisa_vagas = mysqli_fetch_array($result_pesquisa_vagas)) :
            ?>
                <tr>
                    <th scope="row"><a href="form_painel.php?menu_principal=tabelas_candidatos&id=<?php echo $row_pesquisa_vagas['id'] ?>"><?php echo $row_pesquisa_vagas['nome'] ?></a></th>
                    <td><?php echo $row_pesquisa_vagas['cargo'] ?></td>
                    <td>
                        <?php
                        if ($row_pesquisa_vagas['nivel'] == 1) {
                            echo 'Estágio';
                        } elseif ($row_pesquisa_vagas['nivel'] == 2) {
                            echo 'Júnior';
                        } elseif ($row_pesquisa_vagas['nivel'] == 3) {
                            echo 'Pleno';
                        } elseif ($row_pesquisa_vagas['nivel'] == 4) {
                            echo 'Sênior';
                        } elseif ($row_pesquisa_vagas['nivel'] == 5) {
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