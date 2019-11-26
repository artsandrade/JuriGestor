<form action="" class="mt-5" id="pf" style="display: none;" method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputNome">Nome completo</label>
            <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputSenha">Senha</label>
            <input type="password" class="form-control" id="inputSenha" name="inputSenha" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEstadoCivil">Estado Civil</label>
            <select id="inputEstadoCivil" name="inputEstadoCivil" class="form-control">
                <option>Solteiro</option>
                <option>Casado</option>
                <option>Viuvo</option>
            </select>
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-3">
            <label for="inputCpf">CPF</label>
            <input class="form-control" type="text" name="inputCpf" id="inputCpf" placeholder="" onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14">
        </div>
        <div class="form-group col-md-3">
            <label for="inputRg">RG</label>
            <input type="text" class="form-control" id="inputRg" name="inputRg" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmissor">Órgão emissor</label>
            <input type="text" class="form-control" id="inputEmissor"name="inputEmissor" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmissão">Data de emissão</label>
            <input type="date" class="form-control" id="inputEmissao" name="inputEmissao" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-3">
            <label for="inputProfissao">Profissão</label>
            <input type="text" class="form-control" id="inputProfissao" name="inputProfissao" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputCtps">CTPS</label>
            <input type="text" class="form-control" id="inputCtps" name="inputCtps" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-6">
            <label for="inputNomePai">Nome do pai</label>
            <input type="text" class="form-control" id="inputNomePai" name="inputNomePai">
        </div>
        <div class="form-group col-md-6">
            <label for="inputNomeMae">Nome da mãe</label>
            <input type="text" class="form-control" id="inputNomeMae" name="inputNomeMae">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-6">
            <label for="inputCep">CEP</label>
            <div class="input-group mb-3">
                <input type="text" id="inputCep" name="inputCep" class="form-control" placeholder="" aria-label="Example text with button addon" onkeyup="mascara('#####-###',this,event,true)" maxlength="9" aria-describedby="button-addon1">
            </div>
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-6">
            <label for="inputEndereco">Endereco</label>
            <input type="text" class="form-control" id="inputEndereco" name="inputEndereco" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputNumero">Número</label>
            <input type="text" class="form-control" id="inputNumero" name="inputNumero" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputComplemento">Complemento</label>
            <input type="text" class="form-control" id="inputComplemento" name="inputComplemento" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-4">
            <label for="inputTelefone">Telefone</label>
            <input type="text" class="form-control" id="inputTelefone"name="inputTelefone" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputCelular">Celular</label>
            <input type="text" class="form-control" id="inputCelular" name="inputCelular" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputRecado">Telefone para recado</label>
            <input type="text" class="form-control" id="inputRecado" name="inputRecado" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-8">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="col-md-8">
            <div class="form-group">
                <label for="inputAdvogados">Advogados</label>
                <select class="select2 form-control" name="inputAdvogados[]" id="inputAdvogados " multiple="multiple" style="width: 100%;">
                    <option>Arthur</option>
                    <option>Pedro</option>
                    <option>Gabriel</option>
                    <option>Ricardo</option>
                    <option>Esqueci</option>
                    <option>Nome</option>
                    <option>Do outro</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-12">
            <label for="inputObservacao">Observação</label>
            <textarea class="form-control" id="inputObservacao" name="inputObservacao" rows="3"></textarea>
        </div>
    </div>
   
    <div class="mt-3 pb-5">
        <button class="btn btn-primary float-right" formaction="../model/cliente/insere.php">Cadastrar</button>
        <button class="btn btn-danger float-left ">Limpar</button>
    </div>
</form>