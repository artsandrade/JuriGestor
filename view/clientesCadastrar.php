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
                    <h1>Cadastro de clientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Clientes</a></li>
                        <li class="breadcrumb-item active">Cadastro</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid pb-5">
            <p class="mt-5">Você deseja cadastrar..</p>
            <div class="btn btn-primary mr-4 d-inline-flex" id="pessoaFisica" onclick="Mudarestado(true, false)">Pessoa
                Fisíca</div>
            <div class="btn btn-primary d-inline-flex" id="pessoaJuridica" onclick="Mudarestado(false, true)">Pessoa
                Jurídica</div>
            <?php
            include('pessoaJuridica.php');
            include('pessoaFisica.php');
            
            ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->








<?php
include('footer.php');
?>