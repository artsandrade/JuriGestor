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
                            <th width="160">Ações</th>
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
<div class="modal fade" id="modalVisualizar'.$row_clientes["id"].'" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Visualizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row mt-5">
                    <div class="form-group col-md-7 col-sm-12 col-12">
                        <label for="inputCliente">Cliente</label>
                        <input class="form-control" placeholder="'.$row_clientes["cliente"].'" readonly>
                    </div>
                    <div class="form-group col-md-5 col-sm-12 col-12">
                            <label for="comboTipoAcao">Tipo da ação</label>
                            <input class="form-control" placeholder="'.$row_clientes["tipoacao"].'" readonly>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-12">
                        <label for="inputRelato">Relato</label>
                        <textarea class="form-control" id="relato" name="relato" rows="4" readonly>'.$row_clientes["relato"].'</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idAtendimento" value="'.$row_clientes["id"].'">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditar'.$row_clientes["id"].'" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <p>Você deseja editar o atendimento do cliente '.$row_clientes["cliente"].'?</p>
            </div>
            <div class="modal-footer">
                <form action="../model/atendimento/selecionaAtendimento.php" method="POST">
                <input type="hidden" name="idAtendimento" value="'.$row_clientes["id"].'">
                <button type="submit" name="btn-editar" value="'.$row_clientes["id"].'" class="btn btn-primary">Editar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </form>
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
                </div>
                <form action="../model/atendimento/remove.php" method="POST">
                    <div class="modal-body">
                        <p>Você tem certeza que deseja excluir o atendimento do cliente "'.$row_clientes["cliente"].'"?</p>    
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idAtendimento" value="'.$row_clientes["id"].'">
                        <button type="submit" name="btn-remove" class="btn btn-primary">Excluir</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalNaoExcluir'.$row_clientes["id"].'" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Impossível excluir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <p>Desculpe, mas o atendimento do cliente "'.$row_clientes["cliente"].'" está sendo utilizado
                        em um processo. Para que você possa excluí-lo,
                        é necessário primeiramente remover os cadastros que estão vinculados!</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idAcao" value="'.$row_clientes["id"].'">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
            </div>
        </div>
    </div>';
}

include('footer.php');

?>