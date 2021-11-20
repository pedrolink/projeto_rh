<form action="dados_atualiza_perfil_usuario.php" method="POST" enctype="multipart/form-data">
    <div style="width: 1200px; height: 880px; margin-left: 170px">

        <!-- PERFIL ALTERADO OU CADASTRADO COM SUCESSO -->
        <?php
        if (isset($_SESSION['competencia_usuario_success'])) :
        ?>
            <div class="notification is-success">
                <p>Perfil alterado com sucesso!</p>
            </div>
        <?php
        endif;
        unset($_SESSION['competencia_usuario_success']);
        ?>

        <!-- ERRO AO ALTERAR OU CADASTRAR PERFIL -->
        <?php
        if (isset($_SESSION['competencia_usuario_error'])) :
        ?>
            <div class="notification is-danger">
                <p>Erro ao cadastrar informações do perfil, favor tente novamente ou entre em contato com o administrador.</p>
            </div>
        <?php
        endif;
        unset($_SESSION['competencia_usuario_error']);
        ?>

        <div class="card card-body bg-light">
            <h3 align="left">1. Informações Pessoais</h1>
                <div class="form-row" style="margin-top: 5px">
                    <div class="form-group col-md-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row_informacoes_usuario['email'] ?>" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="form-group col-md-3" style="margin-left: 20px;">
                        <label>Imagem Perfil</label>
                        <input type="file" name="imagem_perfil">
                    </div>
                    <input type="hidden" name="input_imagem_usuario" value="<?php echo $row_competencia_usuario['imagem_usuario'] ?>">
                    <?php if ($row_competencia_usuario['imagem_usuario']) : ?>
                        <div class="form-group col-md-3" style="margin-left: 270px; margin-top: -40px">
                            <div class="circle" style="background-color: #aaa; border-radius: 50%; width: 150px; height: 150px; overflow: hidden; position: relative;">
                                <img src="images/profile_images/<?php echo $row_competencia_usuario['imagem_usuario'] ?>" style="position: absolute; bottom: 0; width: 100%;">
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="form-group col-md-3" style="margin-left: 270px; margin-top: -40px">
                            <div class="circle" style="background-color: #aaa; border-radius: 50%; width: 150px; height: 150px; overflow: hidden; position: relative;">
                                <img src="images/user-icon.png" style="position: absolute; bottom: 0; width: 100%;">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="vertical-line" style="border: 1px inset;  background-color: #75787a; margin-top: 10px"></div>
                <div class="form-row" style="margin-top: 10px">
                    <div class="form-group col-md-4">
                        <label>Endereço</label>
                        <input type="text" class="form-control" name="endereco_principal" value="<?php echo $row_competencia_usuario['endereco_principal'] ?>" placeholder="Digite seu endereço principal">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Endereço 2</label>
                        <input type="text" class="form-control" name="endereco_secundario" value="<?php echo $row_competencia_usuario['endereco_secundario'] ?>" placeholder="Digite seu endereço secundário">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Cidade</label>
                        <input type="text" class="form-control" name="cidade" value="<?php echo $row_competencia_usuario['cidade'] ?>" placeholder="Digite sua cidade">
                    </div>
                    <div class="form-group col-md-1">
                        <label>Estado</label>
                        <select name="estado" class="form-control">
                            <option value="<?php echo $row_competencia_usuario['estado'] ?>"> <?php echo $row_competencia_usuario['estado'] ?> </option>
                            <option value="RS">RS</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" style="margin-top: 10px">
                    <div class="form-group col-md-2">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="telefone_primario" value="<?php echo $row_competencia_usuario['telefone_primario'] ?>" placeholder="Digite seu telefone">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Telefone 2</label>
                        <input type="text" class="form-control" name="telefone_secundario" value="<?php echo $row_competencia_usuario['telefone_secundario'] ?>" placeholder="Digite seu telefone">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" value="<?php echo $row_competencia_usuario['data_nascimento'] ?>">
                    </div>
                </div>
        </div>

        <div class="card card-body bg-light" style="margin-top: 15px">
            <h3 align="left">2. Informações Profissionais</h1>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Pretenção Salarial</label>
                        <input type="text" class="form-control" name="pretencao_salarial" value="<?php echo number_format($row_competencia_usuario['pretencao_salarial'], 2, ',', '.') ?>" placeholder="Digite um valor" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Nível</label>
                        <select name="nivel" class="form-control" required>
                            <option value="<?php echo $row_competencia_usuario['nivel'] ?>">
                                <?php
                                if ($row_competencia_usuario['nivel'] == 0) {
                                    echo 'Estagiário';
                                } elseif ($row_competencia_usuario['nivel'] == 1) {
                                    echo 'Júnior';
                                } elseif ($row_competencia_usuario['nivel'] == 2) {
                                    echo 'Pleno';
                                } elseif ($row_competencia_usuario['nivel'] == 3) {
                                    echo 'Sênior';
                                } elseif ($row_competencia_usuario['nivel'] == 4) {
                                    echo 'Gerente';
                                }
                                ?>
                            </option>
                            <option value="0">Estágio</option>
                            <option value="1">Júnior</option>
                            <option value="2">Pleno</option>
                            <option value="3">Sênior</option>
                            <option value="4">Gerente</option>
                        </select>
                    </div>
                </div>
                <div class="vertical-line" style="border: 1px inset;  background-color: #75787a; margin-top: 10px"></div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="inputAddress">Habilidades</label>
                    <textarea name="habilidades" value="<?php echo $row_competencia_usuario['habilidades'] ?>" class="form-control" cols="10" rows="5" placeholder="Separar habilidades por ' ; '  Exemplo: PHP; JavaScript..." required> <?php echo $row_competencia_usuario['habilidades'] ?> </textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Nível Inglês</label>
                        <select name="nivel_ingles" class="form-control" required>
                            <option value="<?php echo $row_competencia_usuario['nivel_ingles'] ?>">
                                <?php
                                if ($row_competencia_usuario['nivel_ingles'] == 0) {
                                    echo 'Básico';
                                } elseif ($row_competencia_usuario['nivel_ingles'] == 1) {
                                    echo 'Intermediário';
                                } elseif ($row_competencia_usuario['nivel_ingles'] == 2) {
                                    echo 'Avançado';
                                } elseif ($row_competencia_usuario['nivel_ingles'] == 3) {
                                    echo 'Fluente';
                                }
                                ?>
                            </option>
                            <option value="0">Básico</option>
                            <option value="1">Intermediário</option>
                            <option value="2">Avançado</option>
                            <option value="3">Fluente</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCEP">LinkedIn url</label>
                        <input type="text" class="form-control" name="url_linkedin" value="<?php echo $row_competencia_usuario['url_linkedin'] ?>" placeholder="Informe sua URL do LinkedIn">
                    </div>
                </div>
        </div>
        <div align="center" style="margin-top: 15px">
            <button type="submit" style="width: 280px; height: 40px" class="btn btn-success">Salvar Informações</button>
        </div>
    </div>
</form>