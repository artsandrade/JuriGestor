<form action="" id="pj" class="mt-5" style="display: none;">

    <div class="form-row mt-1">
        <div class="form-group col-md-6">
            <label for="inputNomeFantasia">Nome fantasia</label>
            <input type="text" class="form-control" id="inputNomeFantasia" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputCnpj">CNPJ</label>
            <input type="text" class="form-control" id="inputCnpj" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputInscricaoEstadual">Inscrição Estadual</label>
            <input type="text" class="form-control" id="inputInscricaoEstadual" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-6">
            <label for="inputEndereco2">Endereco</label>
            <input type="text" class="form-control" id="inputEndereco2" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputNumero2">Número</label>
            <input type="text" class="form-control" id="inputNumero2" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputComplemento2">Complemento</label>
            <input type="text" class="form-control" id="inputComplemento2" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-6">
            <label for="inputBairro">Bairro</label>
            <input type="text" class="form-control" id="inputBairro" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEstado">Estado</label>
            <input type="text" class="form-control" id="inputEstado" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputCidade">Cidade</label>
            <input type="text" class="form-control" id="inputCidade" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-4">
            <label for="inputTelefone2">Telefone</label>
            <input type="text" class="form-control" id="inputTelefone2" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputNumero2">Celular</label>
            <input type="text" class="form-control" id="inputNumero2" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputRecado2">Telefone para recado</label>
            <input type="text" class="form-control" id="inputRecado2" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-8">
            <label for="inputEmail2">Email</label>
            <input type="email" class="form-control" id="inputEmail2" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="col-md-8">
            <div class="form-group">
                <label for="inputAdvogados2">Advogados</label>
                <select class="select2 form-control" name= "advogados[]"id="inputAdvogados2" multiple="multiple"
                     style="width: 100%;">
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
            <textarea class="form-control" id="inputObservacao" rows="4"></textarea>
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
                    <label class="custom-file-label" for="inputArquivos">Escolher arquivo</label>
                    <input type="file" class="custom-file-input" id="inputArquivos" aria-describedby="descricaoArquivos">
                    <small id="descricaoArquivos" class="form-text text-muted">
                        É permitido o envio de arquivos de até 2MB.
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-6">
            <label for="inputNomeCompleto">Nome completo</label>
            <input type="text" class="form-control" id="inputNomeCompleto" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputDataNasc">Data de nascimento</label>
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
            <label for="inputCargo">Cargo</label>
            <input type="text" class="form-control" id="inputCargo" placeholder="">
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
        <div class="form-group col-md-6">
            <label for="inputBairro2">Bairro</label>
            <input type="text" class="form-control" id="inputBairro2" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEstado2">Estado</label>
            <select id="inputEstado2" class="form-control">
                <option>MG</option>
                <option>SP</option>
                <option>BA</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputCidade2">Cidade</label>
            <select id="inputCidade2" class="form-control">
                <option>Frutal</option>
                <option>Fronteira</option>
                <option>Floripa</option>
            </select>
        </div>
    </div>
    <div class="form-row mt-1">
        <div class="form-group col-md-4">
            <label for="inputTelefone3">Telefone</label>
            <input type="text" class="form-control" id="inputTelefone3" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputNumero3">Celular</label>
            <input type="text" class="form-control" id="inputNumero" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputRecado3">Telefone para recado</label>
            <input type="text" class="form-control" id="inputRecado3" placeholder="">
        </div>
    </div>
    <div class="form-row mt-1 mb-4">
        <div class="form-group col-md-8">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail">
        </div>
    </div>

    <div class="mb-5 pb-3">
        <button class="btn btn-secondary float-right">Incluir responsável</button>
        <button class="btn btn-danger float-left mr-3">Limpar</button>
        <button class="btn btn-primary float-left">Cadastrar</button>
    </div>
</form>