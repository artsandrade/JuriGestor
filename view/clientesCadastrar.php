<?php
include('header.php');
?>
<script src="../js/clientes.js"></script>
<script src="../js/mascara.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
 <link rel="stylesheet" href="../css/sb-admin3.css">    
<!-- Content Wrapper. Contains page content -->
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
            include('pessoaFisica.php');
            include('pessoaJuridica.php');
            ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->








<?php
include('footer.php');
?>