<?php

include('header.php');

?>
<script src="../js/select2.full.min.js"></script>
<link rel="stylesheet" href="../css/select.css">
<link rel="stylesheet" href="../css/select2.css">
<!-- Content Wrapper. Contains page content -->
<script>
    $(document).ready(function () {
        //Initialize Select2 Elements
        $('.select2').select2({
            maximumSelectionLength: 3,
            theme: 'bootstrap4'
        });

    });
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cadastro de processos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Processos</a></li>
                        <li class="breadcrumb-item active">Cadastro</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid">
            <form class="">
                <div class="form-row mt-5">
                    <div class="col-md-7 col-sm-12 col-12">
                        <label for="inputNumeroProcesso">Número do processo</label>
                        <input type="text" class="form-control" id="inputNomeProcesso">
                    </div>
                    <div class="col-md-3 col-sm-12 col-12">
                        <label for="comboTipoAcao">Tipo da ação</label>
                        <select id="comboTipoAcao" class="form-control">
                            <option>Ação trabalhista</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12 mt-auto">
                        <button type="submit" class="btn btn-primary btn-block">Pesquisar</button>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-7">
                        <label for="inputNomeAcao">Nome da ação</label>
                        <input type="text" id="inputNomeAcao" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputValorCausa">Valor da causa</label>
                        <input type="text" id="inputValorCausa" class="form-control">
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputPolo">Polo</label>
                            <select class="form-control" name="" id="inputPolo">
                                <option>Ativo</option>
                                <option>Passivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputTipoProcesso">Tipo do processo</label>
                            <select class="form-control" name="" id="inputTipoProcesso">
                                <option>Eletrônico</option>
                                <option>Fisíco</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputSituacao">Situação</label>
                            <select class="form-control" name="" id="inputSituacao">
                                <option>Em andamento</option>
                                <option>Trânsito em julgado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="inputTipoAcao">Tipo da ação</label>
                        <select name="" class="form-control" id="inputTipoAcao">
                            <option value="">Ação trabalhista</option>
                            <option value="">Ação sem causa</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputOrgaoJudiciario">Órgão judiciário</label>
                        <select name="" class="form-control" id="inputOrgaoJudiciario">
                            <option value="">Superior tribunal de Campinas</option>
                            <option value="">blu</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputComarca">Comarca</label>
                        <input type="text" class="form-control" id="inputComarca">
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="form-group col-md-8">
                        <label for="inputLink">Link para andamento processual</label>
                        <input type="text" id="inputLink" class="form-control">
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="col-md-8 col-sm-12 col-12">
                        <label for="inputCliente">Cliente</label>
                        <input type="text" class="form-control" id="inputCliente">
                    </div>
                    <div class="col-md-2 col-sm-12 mt-auto">
                        <button type="submit" class="btn btn-primary btn-block">Incluir cliente</button>
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="inputAdvogados">Advogados</label>
                            <select class="select2 form-control" name="advogados[]" id="inputAdvogados "
                                multiple="multiple" style="width: 100%;">
                                <option>Arthur</option>
                                <option>Pedro</option>
                                <option>Gabriel</option>
                                <option>Ricardo</option>
                                <option>Paulo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="col-md-8 col-sm-12 col-12">
                        <label for="inputParteContraria">Parte contrária</label>
                        <input type="text" class="form-control" id="inputParteContraria">
                    </div>
                    <div class="col-md-2 col-sm-12 mt-auto">
                        <button type="submit" class="btn btn-primary btn-block">Incluir parte</button>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-8">
                        <label for="inputAdvParteContraria">Advogado parte contrária</label>
                        <input type="text" class="form-control" id="inputAdvParteContraria">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputOAB">OAB</label>
                        <input type="text" id="inputOAB" class="form-control">
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="col-md-8 col-sm-12 col-12">
                        <label for="inputEmail">Email</label>
                        <input type="text" class="form-control" id="inputEmail">
                    </div>
                    <div class="col-md-2 col-sm-12 mt-auto">
                        <button type="submit" class="btn btn-primary btn-block">Incluir advogado</button>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-12">
                        <label for="inputObservacao">Observação</label>
                        <textarea class="form-control" id="inputObservacao" rows="4"></textarea>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-12 col-sm-12 col-12">
                        <div class="file-loading">
                            <input id="input-44" name="input44[]" type="file" multiple>
                        </div>
                    </div>
                </div>
                <div class="mt-3 pb-5">
                    <button class="btn btn-primary float-right">Cadastrar</button>
                    <button class="btn btn-danger float-left ">Limpar</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function () {
        $("#input-44").fileinput({
            uploadUrl: "../model/upload.php",
            maxFilePreviewSize: 10240,
            language: 'pt-BR',
            theme: 'fas',
            enableResumableUpload: false,
            // uploadExtraData: {
            //     'uploadToken': 'SOME-TOKEN', // para controle / segurança de acesso  
            // }
            maxFileCount: 5,
            showCancel: true,
            initialPreviewAsData: true,
            deleteUrl: "http://localhost/file-delete.php"
        }).on('fileuploaded', function (event, previewId, index, fileId) {
            console.log('File Uploaded', 'ID: ' + fileId + ', Thumb ID: ' + previewId);
        }).on('fileuploaderror', function (event, data, msg) {
            console.log('File Upload Error', 'ID: ' + data.fileId + ', Thumb ID: ' + data.previewId);
        }).on('filebatchuploadcomplete', function (event, preview, config, tags, extraData) {
            console.log('File Batch Uploaded', preview, config, tags, extraData);
        });
    });
</script>
<script src="../js/mascara.js"></script>
<?php

include('footer.php');

?>