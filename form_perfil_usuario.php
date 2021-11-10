<form>
    <div style="width: 1200px; height: 880px;">
        <div class="card card-body bg-light">
            <h3 align="left">1. Informações Pessoais</h1>
                <div class="form-row" style="margin-top: 5px">
                    <div class="form-group col-md-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Digite seu e-mail">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Senha Atual</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Digite a senha atual">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Senha Nova</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Digite a senha nova">
                    </div>
                </div>
                <div class="vertical-line" style="border: 1px inset;  background-color: #75787a; margin-top: 10px"></div>
                <div class="form-row" style="margin-top: 10px">
                    <div class="form-group col-md-4">
                        <label>Endereço</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Digite seu endereço principal">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Endereço 2</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Digite seu endereço secundário">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Cidade</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Digite sua cidade">
                    </div>
                    <div class="form-group col-md-1">
                        <label>Estado</label>
                        <select id="inputEstado" class="form-control">
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" style="margin-top: 10px">
                    <div class="form-group col-md-2">
                        <label>Telefone</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Digite seu telefone">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Telefone 2</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Digite seu telefone">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Data de Nascimento</label>
                        <input type="date" class="form-control" id="inputEmail4" placeholder="Digite sua cidade">
                    </div>
                </div>
        </div>

        <div class="card card-body bg-light" style="margin-top: 15px">
            <h3 align="left">2. Informações Profissionais</h1>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Pretenção Salarial</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Digite um valor">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Nível</label>
                        <select id="inputEstado" class="form-control">
                            <option>...</option>
                            <option>Estágio</option>
                            <option>Júnior</option>
                            <option>Pleno</option>
                            <option>Sênior</option>
                            <option>Gerente</option>
                        </select>
                    </div>
                </div>
                <div class="vertical-line" style="border: 1px inset;  background-color: #75787a; margin-top: 10px"></div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="inputAddress">Habilidades</label>
                    <textarea name="" class="form-control" id="" cols="10" rows="5"></textarea>
                    <!-- <input type="tex" class="form-control" id="inputAddress" placeholder="Rua dos Mega, nº 0"> -->
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Nível Inglês</label>
                        <select id="inputEstado" class="form-control">
                            <option>Escolher...</option>
                            <option>Básico</option>
                            <option>Intermediário</option>
                            <option>Avançado</option>
                            <option>Fluente</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCEP">LinkedIn url</label>
                        <input type="text" class="form-control" id="inputCEP">
                    </div>
                </div>
        </div>
        <div align="center" style="margin-top: 15px">
            <button type="submit" style="width: 280px; height: 40px" class="btn btn-success">Salvar Informações</button>
        </div>
    </div>
</form>