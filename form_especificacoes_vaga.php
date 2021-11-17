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

    $sql_requisito_ingles = 'SELECT * FROM competencias_usuario WHERE id_usuario = "' . $row_candidatos_vaga['id_usuario'] . '" AND nivel_ingles = "' . $row_vaga['nivel_ingles'] . '"';
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

    $sql_requisito_nivel = 'SELECT * FROM competencias_usuario WHERE id_usuario = "' . $row_candidatos_vaga['id_usuario'] . '" AND nivel = "' . $row_vaga['nivel'] . '"';
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
while ($row_melhor_candidato = $result_melhor_candidato->fetch_assoc()) {
    $sql_melhor_candidato_usuario = 'SELECT * FROM usuarios WHERE id = "' . $row_melhor_candidato['id'] . '"';
    $result_melhor_candidato_usuario = mysqli_query($conexao, $sql_melhor_candidato_usuario);
    $row_melhor_candidato_usuario = mysqli_fetch_array($result_melhor_candidato_usuario);

    $sql_melhor_usuario_competencias = 'SELECT * FROM 	competencias_usuario WHERE id_usuario = "' . $row_melhor_candidato['id'] . '"';
    $result_melhor_usuario_competencias = mysqli_query($conexao, $sql_melhor_usuario_competencias);
    $row_melhor_usuario_competencias = mysqli_fetch_array($result_melhor_usuario_competencias);

    echo $row_melhor_candidato_usuario['usuario'] . '</br>';
    echo $row_melhor_usuario_competencias['habilidades']  . '</br></br>';
}
