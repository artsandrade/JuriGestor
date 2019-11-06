<?php

include('header.php');

?>


<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Painel administrativo</a>
            </li>
            <li class="breadcrumb-item active">Atendimentos</li>
        </ol>

        <h1>Cadastro de Atendimentos</h1>
        <form action="" method="POST">

            <div class="form-row mt-5">
                <div class="form-group col-md-6 col-sm-12 col-12">
                    <label for="inputCpfCliente">CPF</label>
                    <input class="form-control" id="inputCpfCliente" placeholder="" name="inputCpfCliente">

                </div>
                <div class="form-group col-md-6 col-sm-12 col-12">
                    <label for="comboTipoAcao">Tipo da ação</label>
                    <select class="form-control" id="comboTipoAcao">
                        <option>Ação Trabalhista</option>
                        <option>Ação Teste</option>
                        <option>Outra ação</option>
                        <option>Mais uma ação</option>
                    </select>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-12">
                    <label for="inputRelato">Relato</label>
                    <textarea class="form-control" id="inputRelato" rows="4"></textarea>
                </div>
        </form>
        <form>
            <div class="form-group mt-5">
                <input id="input-b3" name="input-b3[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
            </div>
        </form>

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
        </div>

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