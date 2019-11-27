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
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Consulta de Processos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Processos</a></li>
                        <li class="breadcrumb-item active">Consulta</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content mb-5">
        <div class="container-fluid">  
            <div class="table-responsive">
                <table class="table table-hover  mt-5 rounded" id="listar_processos">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nome Ação</th>
                            <th>Número do processo</th>
                            <th>Situação</th>
                            <th>Polo</th>
                            <th>Ações</th>
                    
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
    $('#listar_processos').DataTable({
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
// $result_clientes = "SELECT * FROM cliente WHERE escritorio_id = '$id'";
// $resultado_clientes = mysqli_query($conn, $result_clientes);
// while ($row_clientes = mysqli_fetch_array($resultado_clientes)) {
// echo'
// <div class="modal fade" id="modalExcluirCliente'.$row_clientes["id"].'" tabindex="-1" role="dialog" aria-labelledby=modalExcluirCliente'.$row_clientes["nome"].'" aria-hidden="true">
//   <div class="modal-dialog" role="document">
//     <div class="modal-content">
//       <div class="modal-header">
//         <h5 class="modal-title" id="exampleModalLabel">ARTHUR NÃO SABE FAZER BANCO DE DADOS!</h5>
//         <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
//           <span aria-hidden="true">&times;</span>
//         </button>
//       </div>
//       <div class="modal-body">
//         Deseja realmente excluir o cliente "'.$row_clientes["nome"].'"?
//       </div>
//       <div class="modal-footer">
//             <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
//             <a href="../model/cliente/remove.php?id='.$row_clientes["id"].'" type="submti" class="btn btn-danger" >Excluir</a>     
//       </div>
//     </div>
//   </div>
// </div>
// <div class="modal fade" id="modalVisualizarCliente'.$row_clientes["id"].'" tabindex="-1" role="dialog" aria-labelledby=modalExcluirCliente'.$row_clientes["nome"].'" aria-hidden="true">
//   <div class="modal-dialog" role="document">
//     <div class="modal-content">
//       <div class="modal-header">
//         <h5 class="modal-title" id="exampleModalLabel">ARTHUR NÃO SABE FAZER BANCO DE DADOS!</h5>
//         <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
//           <span aria-hidden="true">&times;</span>
//         </button>
//       </div>
//       <div class="modal-body">
//         Visualizar os dados do cliente "'.$row_clientes["nome"].'"?
//       </div>
//       <div class="modal-footer">
//             <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
//             <a href="visualizarCliente.php?id='.$row_clientes["id"].'&status='.$row_clientes["status"].'" type="submti" class="btn btn-primary" >Visualizar</a>     
//       </div>
//     </div>
//   </div>
// </div>';
// }
include('footer.php');
?>