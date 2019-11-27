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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Consultar processos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Processos</a></li>
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
                <table class="table table-hover  mt-5 rounded" id="listar_clientes">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nome da ação</th>
                            <th>Número do processo</th>
                            <th>Situação</th>
                            <th>Polo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<script src="../datatables/js/datatables.js"></script>
<script src="../datatables/js/datatables_b.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#listar_clientes').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../model/processos/consultar.php",
            "type": "POST"
        },
    });
} );
</script>

<?php

$result_clientes = "SELECT * FROM processo ";
$resultado_clientes = mysqli_query($conn, $result_clientes);
while ($row_clientes = mysqli_fetch_array($resultado_clientes)) {
echo'
<div class="modal fade" id="modalVisualizar'.$row_clientes["id"].'" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Visualizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade" id="modalExcluir'.$row_clientes["id"].'" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
        <form action="../model/processos/remove.php" method="POST">
            <div class="modal-body">
                <p>Você tem certeza que deseja excluir o processo de nº "'.$row_clientes["num_processo"].'"?.</p>    
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idProcesso" value="'.$row_clientes["id"].'">
                <button type="submit" name="btn-remove" class="btn btn-primary">Excluir</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </form>
    </div>
</div>';
    }
include('footer.php');
?>