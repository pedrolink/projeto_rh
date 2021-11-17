<div class="card card-body bg-light">
    <h3 align="left">Cadastro de vagas</h1>
        <div style="margin-top: 30px;">

            <!-- VAGA CADASTRADA COM SUCESSO -->
            <?php
            if (isset($_SESSION['vaga_cadastrada'])) :
            ?>
                <div class="notification is-success">
                    <p>Vaga cadastrada com sucesso!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['vaga_cadastrada']);
            ?>

            <!-- ERRO AO CADASTRAR A VAGA -->
            <?php
            if (isset($_SESSION['erro_cadastro_vaga'])) :
            ?>
                <div class="notification is-danger">
                    <p>Erro ao cadastrar a vaga, favor tente novamente ou entre em contato com o administrador.</p>
                </div>
            <?php
            endif;
            unset($_SESSION['erro_cadastro_vaga']);
            ?>

            <form class="row g-3" action="dados_cadastro_vagas.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-3">
                    <label class="form-label">Nome da vaga</label>
                    <input name="nome_vaga" class="form-control" id="nome_vaga">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Cargo</label>
                    <input name="cargo" class="form-control" id="cargo">
                </div>
                <div class="col-md-1">
                    <label class="form-label">Salário</label>
                    <input name="salario" class="form-control" id="salario">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Localidade</label>
                    <input name="localidade" class="form-control" id="localidade">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Nível Inglês</label>
                    <select name="nivel_ingles" class="form-control">
                        <option>Selecione um nível</option>
                        <option value="Básico">Básico</option>
                        <option value="Intermediário">Intermediário</option>
                        <option value="Avançado">Avançado</option>
                        <option value="Fluente">Fluente</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Nível</label>
                    <select name="nivel" class="form-control">
                        <option>Selecione um nível</option>
                        <option value="Estagiário">Estágio</option>
                        <option value="Júnior">Júnior</option>
                        <option value="Pleno">Pleno</option>
                        <option value="Sênior">Sênior</option>
                        <option value="Gerente">Gerente</option>
                    </select>
                </div>
                <div class="col-12" style="margin-top: 10px;">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" name="descricao_vaga" id="descricao_vaga" cols="10" rows="5"></textarea>
                </div>
                <div class="col-12" style="margin-top: 10px;">
                    <label class="form-label">Requisitos</label>
                    <input name="requisitos" class="form-control" id="requisitos" placeholder="Exemplo: PHP, JavaScript, Python, MySQL">
                </div>
                <div class="col-12" style="margin-top: 20px;">
                    <span class="help-block">Escolha uma imagem para vaga</span>
                </div>
                <!-- <div class="col-12" style="margin-top: 10px;">
                    <input type="file" name="file" id="upload" required>
                </div> -->
                <div class="col-12" style="margin-top: 25px;">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
</div>