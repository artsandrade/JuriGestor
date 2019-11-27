<?php
include('header.php');
?>
<script src="../js/clientes.js"></script>
<script src="../js/mascara.js"></script>
<script src="../js/select2.full.min.js"></script>
<link rel="stylesheet" href="../css/select.css">
<link rel="stylesheet" href="../css/select2.css">
<!-- Content Wrapper. Contains page content -->
<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            maximumSelectionLength: 3,
            theme: 'bootstrap4'
        });


    });
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cadastrar cliente</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Clientes</a></li>
                        <li class="breadcrumb-item active">Cadastrar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <script>
        function desabilitaBotoes() {
            document.getElementById("pessoaJuridica").disabled = true;
            document.getElementById("pessoaFisica").disabled = true;
            document.getElementById('btnCancelar').style.display = 'block';
        }

        function reload() {
            document.location.reload(true);
        }
    </script>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid pb-5">
            <p class="mt-5">Você deseja cadastrar..</p>
            <button class="btn btn-primary mr-4 d-inline-flex" id="pessoaFisica" onclick="Mudarestado(true, false);desabilitaBotoes();">Pessoa
                Fisíca</button>
            <button class="btn btn-primary d-inline-flex" id="pessoaJuridica" onclick="Mudarestado(false, true);desabilitaBotoes();">Pessoa
                Jurídica</button>
            <button class="btn btn-danger float-right" style="display:none" data-toggle="modal" data-target="#modalExemplo" id="btnCancelar">Cancelar</button>
            <?php
            include('pessoaJuridica.php');
            include('pessoaFisica.php');

            ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancelar cadastro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Clique em <span class="text-primary">"Voltar"</span> caso deseja continuar na página, ou <span class="text-danger">"Cancelar"</span> para cancelar o cadastro!
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Voltar</button>
                <button class="btn btn-danger" onclick="reload();">Cancelar</button>
            </div>
        </div>
    </div>
</div>





<?php
include('footer.php');
?>