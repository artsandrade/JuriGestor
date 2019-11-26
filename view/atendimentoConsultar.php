<?php
session_start();
include_once('../model/conexao.php');
if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
    header('Location: ../view/index.html');
}
    $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);
    $iduser = mysqli_real_escape_string($conn, $_SESSION['id_user']);
?>

<?php
include('header.php');
?>

<link rel="stylesheet" href="../datatables/css/datatables.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Consultar atendimentos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Atendimentos</a></li>
                        <li class="breadcrumb-item active">Consultar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            
            <div class="table-responsive">
                <table class="table table-hover mt-5 rounded" id="listar_clientes">
                    <thead class="thead-dark">
                        <tr>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Tipo da ação</th>
                            <th>Relato</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
        </div>
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
            "url": "../model/atendimento/consulta.php",
            "type": "POST"
        },
    });
} );
</script>

<?php

$result_clientes = "SELECT * FROM atendimentoView WHERE atendimentoView.escritorio_id = '$id'";
$resultado_clientes = mysqli_query($conn, $result_clientes);
while ($row_clientes = mysqli_fetch_array($resultado_clientes)) {
echo'
<div class="modal fade" id="modalExcluirCliente'.$row_clientes["id"].'" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir atendimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja excluir o atendimento do cliente '.$row_clientes["cliente"].'?
            </div>
            <div class="modal-footer">
                <form action="../model/atendimento/remove.php" method="POST">
                <input type="hidden" name="idAtendimento" value="'.$row_clientes["id"].'">
                <button type="submit" name="btn-remove" class="btn btn-primary">Excluir</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </form>
            </div>
        </div>
    </div>
</div>';
}

include('footer.php');

?>