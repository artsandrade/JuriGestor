<?php
session_start();
include('header.php');
include_once('../model/conexao.php');

    $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);
    $iduser = mysqli_real_escape_string($conn, $_SESSION['id_user']);
?>

<link rel="stylesheet" href="../datatables/css/datatables.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Consultar clientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Clientes</a></li>
                        <li class="breadcrumb-item active">Consultar</li>
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

$result_clientes = "SELECT * FROM cliente WHERE escritorio_id = '$id'";
$resultado_clientes = mysqli_query($conn, $result_clientes);
while ($row_clientes = mysqli_fetch_array($resultado_clientes)) {
echo'
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
                        <p>Você tem certeza que deseja excluir o cliente "'.$row_clientes["nome"].'"?</p>    
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idAtendimento" value="'.$row_clientes["id"].'">
                        <a href="../model/cliente/remove.php?id='.$row_clientes["id"].'" type="submti" class="btn btn-primary" >Excluir</a>     
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
                        <p>Desculpe, mas o cliente "'.$row_clientes["nome"].'" está sendo vinculado
                        a um atendimento ou processo. Para que você possa excluí-lo,
                        é necessário primeiramente remover os cadastros que estão vinculados!</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idAcao" value="'.$row_clientes["id"].'">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="modalVisualizarCliente'.$row_clientes["id"].'" tabindex="-1" role="dialog" aria-labelledby=modalExcluirCliente'.$row_clientes["nome"].'" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Visualizar os dados do cliente "'.$row_clientes["nome"].'"?
      </div>
      <div class="modal-footer">
            <a href="visualizarCliente.php?id='.$row_clientes["id"].'&status='.$row_clientes["status"].'" type="submti" class="btn btn-primary" >Visualizar</a>     
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>';



}

include('footer.php');
?>