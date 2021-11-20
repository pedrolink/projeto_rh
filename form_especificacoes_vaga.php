<?php

$id_vaga = $_GET['id'];
$sql_vaga = 'SELECT * FROM vagas WHERE id = "' . $id_vaga . '"';
$result_vaga = mysqli_query($conexao, $sql_vaga);
$row_vaga = mysqli_fetch_array($result_vaga);

$sql_requisitos_vaga = 'SELECT * FROM requisitos_vagas WHERE id_vaga = "' . $id_vaga . '"';
$result_requisitos_vaga = mysqli_query($conexao, $sql_requisitos_vaga);
$row_requisitos_vaga = mysqli_fetch_array($result_requisitos_vaga);

$sql_candidatos_vaga = 'SELECT * FROM candidatos_vaga WHERE id_vaga = "' . $id_vaga . '"';
$result_cadidatos_vaga = $conexao->query($sql_candidatos_vaga);

$requisitos_vaga = $row_requisitos_vaga['requisitos'];
$lista_vagas = explode(";", $requisitos_vaga);

while ($row_candidatos_vaga = $result_cadidatos_vaga->fetch_assoc()) {
    $pontos_usuario = 0;

    foreach ($lista_vagas as &$vaga) {

        # COMPARA HABILIDADES DO USUÁRIO

        $sql_compara_requisito_usuario = 'SELECT * FROM competencias_usuario WHERE id_usuario = "' . $row_candidatos_vaga['id_usuario'] . '" AND habilidades LIKE "%' . trim($vaga) . '%"';
        $result_compara_requisito_usuario = $conexao->query($sql_compara_requisito_usuario);

        if ($result_compara_requisito_usuario->num_rows > 0) {
            $pontos_usuario += 1;
        }
    }

    # COMPARA INGLÊS DO USUÁRIO

    $sql_requisito_ingles = 'SELECT * FROM competencias_usuario WHERE id_usuario = "' . $row_candidatos_vaga['id_usuario'] . '" AND nivel_ingles >= ' . $row_vaga['nivel_ingles'];
    $result_requisito_ingles = $conexao->query($sql_requisito_ingles);

    if ($result_requisito_ingles->num_rows > 0) {
        $pontos_usuario += 1;
    }

    # COMPARA SALÁRIO USUÁRIO

    $espectativa_salario = $row_vaga['salario'] + 500;

    $sql_requisito_salario = 'SELECT * FROM competencias_usuario WHERE id_usuario = "' . $row_candidatos_vaga['id_usuario'] . '" AND pretencao_salarial <= "' . $espectativa_salario . '"';
    $result_requisito_salario = $conexao->query($sql_requisito_salario);

    if ($result_requisito_salario->num_rows > 0) {
        $pontos_usuario += 1;
    }

    # COMPARA NÍVEL

    $sql_requisito_nivel = 'SELECT * FROM competencias_usuario WHERE id_usuario = "' . $row_candidatos_vaga['id_usuario'] . '" AND nivel >= ' . $row_vaga['nivel'];
    $result_requisito_nivel = $conexao->query($sql_requisito_nivel);

    if ($result_requisito_nivel->num_rows > 0) {
        $pontos_usuario += 1;
    }

    # ATUALIZA PONTOS

    $sql_update_pontos = 'UPDATE candidatos_vaga SET pontos = "' . $pontos_usuario . '" WHERE id_usuario = "' . $row_candidatos_vaga['id_usuario'] . '" AND id_vaga = "' . $id_vaga . '"';

    if ($conexao->query($sql_update_pontos) === TRUE) {
        $_SESSION['pontos_success'] = true;
    } else {
        $_SESSION['pontos_error'] = true;
    }
}

# TRAZ MELHORES USUÁRIO SELECIONADOS PARA A VAGA 

$sql_melhor_candidato = 'SELECT * FROM candidatos_vaga WHERE id_vaga = ' . $id_vaga . ' AND pontos = (SELECT MAX(pontos) FROM candidatos_vaga)';
$result_melhor_candidato = $conexao->query($sql_melhor_candidato);

if ($result_melhor_candidato->num_rows > 0) {

    while ($row_melhor_candidato = $result_melhor_candidato->fetch_assoc()) {
        $sql_melhor_candidato_usuario = 'SELECT * FROM usuarios WHERE id = "' . $row_melhor_candidato['id'] . '"';
        $result_melhor_candidato_usuario = mysqli_query($conexao, $sql_melhor_candidato_usuario);
        $row_melhor_candidato_usuario = mysqli_fetch_array($result_melhor_candidato_usuario);

        $sql_melhor_usuario_competencias = 'SELECT * FROM 	competencias_usuario WHERE id_usuario = "' . $row_melhor_candidato['id'] . '"';
        $result_melhor_usuario_competencias = mysqli_query($conexao, $sql_melhor_usuario_competencias);
        $row_melhor_usuario_competencias = mysqli_fetch_array($result_melhor_usuario_competencias);

?>

        <div class="card" style="width: 24rem;">
            <img class="card-img-top" src="images/foto_perfil.PNG">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row_melhor_candidato_usuario['nome'] ?></h5>
                <p class="card-text">Cargo: <?php echo $row_vaga['cargo'] ?></p>
                <p class="card-text" style="margin-top: -10px;">Pontuação: <?php echo $row_melhor_candidato['pontos'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $row_melhor_candidato_usuario['email'] ?></li>
                <li class="list-group-item">
                    <?php
                    if ($row_melhor_usuario_competencias['nivel'] == 0) {
                        echo 'Estagiário';
                    } elseif ($row_melhor_usuario_competencias['nivel'] == 1) {
                        echo 'Júnior';
                    } elseif ($row_melhor_usuario_competencias['nivel'] == 2) {
                        echo 'Pleno';
                    } elseif ($row_melhor_usuario_competencias['nivel'] == 3) {
                        echo 'Sênior';
                    } elseif ($row_melhor_usuario_competencias['nivel'] == 4) {
                        echo 'Gerente';
                    }
                    ?>
                </li>
                <li class="list-group-item"><?php echo $row_melhor_usuario_competencias['cidade'] . ' - ' . $row_melhor_usuario_competencias['estado'] ?></li>
            </ul>
            <div class="card-body">
                <a href="form_painel.php?menu_principal=informacoes_usuario&id_usuario=<?php echo $row_melhor_candidato['id'] ?>" class="card-link">Mais informações</a>
                <?php
                if ($row_melhor_usuario_competencias['url_linkedin']) :
                ?>
                    <a href="<?php echo $row_melhor_usuario_competencias['url_linkedin'] ?>" target="_blank" class="card-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                        </svg>
                        </i>LinkedIn</a>
                <?php
                endif;
                ?>
            </div>
        </div>

    <?php }
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
                        <h5>Nenhuma candidatura até o momento...</h5>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php } ?>