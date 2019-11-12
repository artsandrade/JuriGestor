<form action="" class="mt-5" id="pf" style="display: none;">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputNome">Nome completo</label>
            <input type="text" class="form-control" id="inputNome" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputDataNasc">Senha</label>
            <input type="date" class="form-control" id="inputDataNasc" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEstadoCivil">Estado Civil</label>
            <select id="inputEstadoCivil" class="form-control">
                <option>Solteiro</option>
                <option>Casado</option>
                <option>Viuvo</option>
            </select>
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-3">
            <label for="inputCpf">CPF</label>
            <input class="form-control" type="text" id="inputCpf" placeholder="" onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14">
        </div>
        <div class="form-group col-md-3">
            <label for="inputRg">RG</label>
            <input type="text" class="form-control" id="inputRg" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmissor">Órgão emissor</label>
            <input type="text" class="form-control" id="inputEmissor" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmissão">Data de emissão</label>
            <input type="date" class="form-control" id="inputEmissao" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-3">
            <label for="inputProfissao">Profissão</label>
            <input type="text" class="form-control" id="inputProfissao" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputCtps">CTPS</label>
            <input type="text" class="form-control" id="inputCtps" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-6">
            <label for="inputNomePai">Nome do pai</label>
            <input type="text" class="form-control" id="inputNomePai">
        </div>
        <div class="form-group col-md-6">
            <label for="inputNomeMae">Nome da mãe</label>
            <input type="text" class="form-control" id="inputNomeMae">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-6">
            <label for="inputCep">CEP</label>
            <div class="input-group mb-3">
                <input type="text" id="inputCep" class="form-control" placeholder="" aria-label="Example text with button addon" onkeyup="mascara('#####-###',this,event,true)" maxlength="9" aria-describedby="button-addon1">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-6">
            <label for="inputEndereco">Endereco</label>
            <input type="text" class="form-control" id="inputEndereco" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputNumero">Número</label>
            <input type="text" class="form-control" id="inputNumero" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputComplemento">Complemento</label>
            <input type="text" class="form-control" id="inputComplemento" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-4">
            <label for="inputTelefone">Telefone</label>
            <input type="text" class="form-control" id="inputTelefone" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputNumero">Celular</label>
            <input type="text" class="form-control" id="inputNumero" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputRecado">Telefone para recado</label>
            <input type="text" class="form-control" id="inputRecado" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-8">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="col-md-8">
            <div class="form-group">
                <label for="inputAdvogados">Advogados</label>
                <select class="select2 form-control" name="advogados[]" id="inputAdvogados " multiple="multiple" style="width: 100%;">
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
            <textarea class="form-control" id="inputObservacao" rows="3"></textarea>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mt-5 rounded">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Arquivos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Copia o outro.py</td>
                </tr>
                <tr>
                    <td>Ou deixa esse mesmo.docs</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row mt-2">
        <div class="col-md-8">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputArquivos">
                    <label class="custom-file-label" for="inputArquivos" aria-describedby="inputArquivos">Escolher
                        arquivo</label>
                    <small id="inputArquivos" class="form-text text-muted">
                        É permitido o envio de arquivos de até 2MB.
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 pb-5">
        <button class="btn btn-primary float-right">Cadastrar</button>
        <button class="btn btn-danger float-left ">Limpar</button>
    </div>
</form>