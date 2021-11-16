<form action="dados_atualiza_perfil_usuario.php" method="POST">
    <div style="width: 1200px; height: 880px;">

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
                        <input type="email" class="form-control" name="email" value="<?php echo $row_informacoes_usuario['email'] ?>" placeholder="Digite seu e-mail">
                    </div>
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
                        <input type="text" class="form-control" name="pretencao_salarial" value="<?php echo number_format($row_competencia_usuario['pretencao_salarial'], 2, ',', '.') ?>" placeholder="Digite um valor">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Nível</label>
                        <select name="nivel" class="form-control">
                            <option value="<?php echo $row_competencia_usuario['nivel'] ?>"> <?php echo $row_competencia_usuario['nivel'] ?> </option>
                            <option value="Estagiário">Estágio</option>
                            <option value="Júnior">Júnior</option>
                            <option value="Pleno">Pleno</option>
                            <option value="Sênior">Sênior</option>
                            <option value="Gerente">Gerente</option>
                        </select>
                    </div>
                </div>
                <div class="vertical-line" style="border: 1px inset;  background-color: #75787a; margin-top: 10px"></div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="inputAddress">Habilidades</label>
                    <textarea name="habilidades" value="<?php echo $row_competencia_usuario['habilidades'] ?>" class="form-control" cols="10" rows="5" placeholder="Separar habilidades por ' ; '  Exemplo: PHP; JavaScript..."> <?php echo $row_competencia_usuario['habilidades'] ?> </textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Nível Inglês</label>
                        <select name="nivel_ingles" class="form-control">
                            <option value="<?php echo $row_competencia_usuario['nivel_ingles'] ?>"> <?php echo $row_competencia_usuario['nivel_ingles'] ?> </option>
                            <option value="Básico">Básico</option>
                            <option value="Intermediário">Intermediário</option>
                            <option value="Avançado">Avançado</option>
                            <option value="Fluente">Fluente</option>
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