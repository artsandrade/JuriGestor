<?php
include_once("../model/conexao.php");
session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
    header('Location: ../view/index.html');
}
?>

<?php
include('header.php');

include_once "../model/conexao.php";
?>

<div class="content-wrapper pb-5">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Arquivos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Atendimentos</a></li>
                        <li class="breadcrumb-item"><a href="atendimentoCadastrar.php">Cadastrar</a></li>
                        <li class="breadcrumb-item active">Arquivos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    

    <section class="content">
        <div class="container-fluid">
            <form action="" method="POST">

                <div class="form-row mt-5">
                    <div class="form-group col-md-12 col-sm-12 col-12">
                        <div class="file-loading">
                            <input id="input-44" name="input44[]" type="file" multiple>
                        </div>
                    </div>
                    
                    <div class="form-group mt-5 ml-auto">
                    <a class="btn btn-primary" href="atendimentoCadastrar.php" role="button">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

</div>


<?php

include('footer.php');

?>

<script>
    $(document).ready(function() {
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
        }).on('fileuploaded', function(event, previewId, index, fileId) {
            console.log('File Uploaded', 'ID: ' + fileId + ', Thumb ID: ' + previewId);
        }).on('fileuploaderror', function(event, data, msg) {
            console.log('File Upload Error', 'ID: ' + data.fileId + ', Thumb ID: ' + data.previewId);
        }).on('filebatchuploadcomplete', function(event, preview, config, tags, extraData) {
            console.log('File Batch Uploaded', preview, config, tags, extraData);
        });
    });
</script>