<?php
include('header.php');
?>

<link rel="stylesheet" href="../datatables/css/datatables.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Consulta de Clientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Clientes</a></li>
                        <li class="breadcrumb-item active">Consulta</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content mb-5">
        <div class="container-fluid">  
            <!-- <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEstado">Filtro</label>
                        <select id="inputEstado" class="form-control">
                            <option selected>Nome do cliente</option>
                            <option>Nome fantasia</option>
                            <option>CPF</option>
                            <option>CNPJ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCampoDigitado">&nbsp;</label>
                        <input type="text" class="form-control" id="inputCampoDigitado">
                    </div>
                </div>
                <button class="btn btn-primary float-right">Pesquisar</button>
            </form> -->
            <div class="table-responsive">
                <table class="table table-hover  mt-5 rounded" id="listar_clientes">
                    <thead class="thead-dark">
                        <tr>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Ações</th>
                    </thead>
                </table>
            </div>
            <!-- Page Content -->
            <!-- <h1>Blank Page</h1>
        <hr>
        <p>This is a great starting point for new custom pages.</p> -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="../datatables/js/datatables.js"></script>
<script src="../datatables/js/datatables_b.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#listar_clientes').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../model/cliente/consultar.php",
            "type": "POST"
        },
    });
} );
</script>

<?php
include('footer.php');
?>