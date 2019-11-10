<?php

include('header.php');

?>


<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="painel.html">Painel administrativo</a>
            </li>
            <li class="breadcrumb-item active">Atendimentos</li>
            <li class="breadcrumb-item active">Cadastrar</li>
        </ol>

        <h1>Cadastro de Atendimentos</h1>
        <form action="" method="POST">

            <div class="form-row mt-5">
                <div class="form-group col-md-6 col-sm-12 col-12">
                    <label for="inputCliente">Cliente</label>
                    <input class="form-control" id="inputCliente" placeholder="" name="inputCliente">

                </div>
                <div class="form-group col-md-6 col-sm-12 col-12">
                    <label for="comboTipoAcao">Tipo da ação</label>
                    <select class="form-control" id="comboTipoAcao">
                        <?php
                        include("../model/conexao.php");
                        include("../model/tipo_acao/consulta.php");
                        global $result;
                        while ($dados = mysqli_fetch_array($result)) :
                        ?>
                            <option><?php echo $dados['nome']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-12">
                    <label for="inputRelato">Relato</label>
                    <textarea class="form-control" id="inputRelato" rows="4"></textarea>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-12">
                    <div class="file-loading">
                        <input id="input-44" name="input44[]" type="file" multiple>
                    </div>
                </div>
                <div class="form-group mt-5 mr-auto">
                    <button class="btn btn-danger">Limpar</button>
                </div>
                <div class="form-group mt-5">
                    <button class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
    </div>
    </form>



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

    </form>

    <!-- 
        <div class="table-responsive">
            <table class="table table-hover mt-5 rounded">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Arquivos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Arquivo1.txt</td>

                    </tr>
                    <tr>
                        <td>Arquivo2.docx</td>
                    </tr>
                    <tr>
                        <td>Testando tamanho do texto</td>
                    </tr>

                </tbody>
            </table>
        </div> -->

    <!-- Page Content -->
    <!-- <h1>Blank Page</h1>
        <hr>
        <p>This is a great starting point for new custom pages.</p> -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->

<?php

include('footer.php');

?>