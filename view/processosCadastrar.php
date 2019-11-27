<?php

include('header.php');
include('../model/conexao.php');

?>
<script src="../js/select2.full.min.js"></script>
<link rel="stylesheet" href="../css/select.css">
<link rel="stylesheet" href="../css/select2.css">
<!-- Content Wrapper. Contains page content -->
<script>
    $(document).ready(function () {
        //Initialize Select2 Elements
        $('.select2').select2({
            maximumSelectionLength: 10,
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
        <form method="post" action="#"> 
            <!-- PRIMEIRA ETAPA DO FORMULARIO -->
            <div id="etapa1">
                <div class="form-row mt-5">
                    <div class="col-md-7 col-sm-12 col-12">
                        <label for="inputNumeroProcesso">Número do processo</label>
                        <input type="text" class="form-control" id="inputNomeProcesso" name="inputNomeProcesso">
                    </div>
                   
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-7">
                        <label for="inputNomeAcao">Nome da ação</label>
                        <input type="text" id="inputNomeAcao" class="form-control" name="inputNomeAcao"> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputValorCausa">Valor da causa</label>
                        <input type="text" id="inputValorCausa" class="form-control" name="inputValorCausa">
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputPolo">Polo</label>
                            <select class="form-control" name="inputPolo" id="inputPolo">
                                <option>Ativo</option>
                                <option>Passivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputTipoProcesso">Tipo do processo</label>
                            <select class="form-control" name="inputTipoProcesso" id="inputTipoProcesso">
                                <option>Eletrônico</option>
                                <option>Fisíco</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputSituacao">Situação</label>
                            <select class="form-control" name="inputSituacao" id="inputSituacao">
                                <option>Em andamento</option>
                                <option>Trânsito em julgado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="inputTipoAcao">Tipo da ação</label>
                        <select name="inputTipoAcao" class="form-control" id="inputTipoAcao">
                            <option >Ação trabalhista</option>
                            <option >Ação sem causa</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputOrgaoJudiciario">Órgão judiciário</label>
                        <select name="inputOrgaoJudiciario" class="form-control" id="inputOrgaoJudiciario">
                            <option >Superior tribunal de Campinas</option>
                            <option >blu</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputComarca">Comarca</label>
                        <input type="text" class="form-control" id="inputComarca" name="inputComarca">
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="form-group col-md-8">
                        <label for="inputLink">Link para andamento processual</label>
                        <input type="text" id="inputLink" class="form-control" name="inputLink">
                    </div>
                </div>
               <script> 
                    function mudaestado() {
                        event.preventDefault()
                        if (document.getElementById('etapa1').style.display == 'block') {
                            document.getElementById('etapa1').style.display = 'none';
                            document.getElementById('etapa2').style.display = 'block';
                        }else {
                            document.getElementById('etapa1').style.display = 'block';
                            document.getElementById('etapa2').style.display = 'none';
                        }
                    }
               </script>
                <input class="btn btn-primary" type="submit" value="Proximo" name="Proximo" onclick="mudaestado()"> 

                </div>

                <!-- SEGUNDA ESTAPA DO FORMULARIO -->
                <div id="etapa2" style="display:none;">
                <div class="form-row mt-1">
                <div class="col-md-8">
                        <div class="form-group">
                            <label for="inputClientes">Cliente</label>
                            <select class="select2 form-control" name="inputClientes[]" id="inputClientes"
                                multiple="multiple" style="width: 100%;" >
                                <?php 
                                    $sql = "SELECT * FROM cliente";
                                    $consulta = mysqli_query($conn, $sql);

                                    while ($dados = mysqli_fetch_assoc($consulta)) {

                                        echo "<option>" . $dados['nome'] . "</option>";
                                    }
                                    ?>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="inputAdvogados">Advogados</label>
                            <select class="select2 form-control" name="inputAdvogados[]" id="inputAdvogados"
                                multiple="multiple" style="width: 100%;">
                                <option>Arthur</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="col-md-8 col-sm-12 col-12">
                        <label for="inputParteContraria">Parte contrária</label>
                        <input type="text" class="form-control" id="inputParteContraria" name="inputParteContraria">
                    </div>                    
                </div>
                <script> 
                    function request() {
                        event.preventDefault()                       
                    }
               </script>
                <div class="form-row mt-3">
                    <div class="form-group col-md-8">
                        <label for="inputAdvParteContraria">Advogado parte contrária</label>
                        <select class="select2 form-control" name="inputAdvParteContraria[]" id="inputAdvParteContraria"
                                multiple="multiple" style="width: 100%;" >
                                <?php 
                                    $sql = "SELECT * FROM advogado_contraria";
                                    $consulta = mysqli_query($conn, $sql);

                                    while ($dados = mysqli_fetch_assoc($consulta)) {

                                        echo "<option>" . $dados['nome'] . "</option>";
                                    }
                                ?> 
                        </select>                               
                    <button class="btn btn-primary mt-3" type="button" onclick="request()" data-toggle="modal" data-target="#modalCadastroAdvogadoContraria">Cadastrar Advogado</button>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputOAB">OAB</label>
                        <input type="text" id="inputOAB" class="form-control" name="inputOAB">
                    </div>
                </div>
                <div class="form-row mt-1">
                    <div class="col-md-8 col-sm-12 col-12">
                        <label for="inputEmail">Email</label>
                        <input type="text" class="form-control" id="inputEmail" name="inputEmail">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-12">
                        <label for="inputObservacao">Observação</label>
                        <textarea class="form-control" id="inputObservacao" rows="4" name="inputObservacao"></textarea>
                    </div>
                </div>
                
                <div class="mt-3 pb-5">
                    <button class="btn btn-primary float-right" formaction="../model/processos/insere.php">Cadastrar</button>
                    <button class="btn btn-danger float-left">Limpar</button>
                </div>
                </div>
            </div>
                </form> 
        </div>
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modalCadastroAdvogadoContraria" tabindex="-1" role="dialog" aria-labelledby="modalCadastroAdvogadoContraria" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre os advogados da parte contrária</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form  method="POST" >
          <div class="form-row mt-1">
                    <div class="col-md-7 col-sm-12 col-12">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" name="inputNome">
                    </div>
                    <div class="col-md-7 col-sm-12 col-12">
                        <label for="inputTelefone">Telefone</label>
                        <input type="text" class="form-control" id="inputTelefone" name="inputTelefone">
                    </div>
                   
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-7">
                        <label for="inputEmail">Email</label>
                        <input type="email" id="inputEmail" class="form-control" name="inputEmail"> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputOAB">OAB</label>
                        <input type="text" id="inputOAB" class="form-control" name="inputOAB">
                    </div>
                </div>                       

      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary"  formaction="../model/processos/insereAdvogadoContraria.php">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
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