<?php
include('header.php');
?>
<script src="../js/clientes.js"></script>
<script src="../js/mascara.js"></script>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Painel administrativo</a>
            </li>
            <li class="breadcrumb-item active">Clientes</li>
        </ol>

        <h1>Cadastro de Clientes</h1>

        <p class="mt-5">Você deseja cadastrar..</p>
        <div class="btn btn-primary mr-4 d-inline-flex" id="pessoaFisica" onclick="Mudarestado(true, false)">Pessoa
            Fisíca</div>
        <div class="btn btn-primary d-inline-flex" id="pessoaJuridica" onclick="Mudarestado(false, true)">Pessoa
            Jurídica</div>

        <div>
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
                        <input class="form-control" type="text" id="inputCpf" placeholder=""
                            onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14">
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
                            <input type="text" id="inputCep" class="form-control" placeholder=""
                                aria-label="Example text with button addon"
                                onkeyup="mascara('#####-###',this,event,true)" maxlength="9"
                                aria-describedby="button-addon1">
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
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputAdvogado">Advogados</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Chebox para permitir input text">
                                </div>
                            </div>
                            <input type="text" class="form-control" id = "inputAdvogado"value="Pedro Henrique"
                                aria-label="Input text com checkbox">
                        </div>
                    </div>
                </div>
        </div>


        </form>
        <form action="" id="pj" style="display: none;">
            <input type="text" value="hatunamtata">



        </form>
    </div>
</div>
<!-- /.container-fluid -->



<?php
include('footer.php');
?>