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
                    <h1>Tipo da ação</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Ferramentas</a></li>
                        <li class="breadcrumb-item active">Tipo da ação</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <?php
    if(isset($_SESSION['mensagem'])):?>
    <div class="col-sm-4 ml-auto">
        <?php if($_SESSION['mensagem']=='Cadastrado com sucesso!' || $_SESSION['mensagem']=='Alterado com sucesso!'):?>
            <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['mensagem'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php else:?>
            <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['mensagem'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>
    </div>
    <?php unset($_SESSION['mensagem']); endif;?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <form action="../model/tipo_acao/funcoesTipoAcao.php" method="post">
                <div class="form-row mt-5">
                    <div class="form-group col-md-9 col-sm-12 col-12">
                        <input class="form-control" id="inputAcao" placeholder="Nome do tipo da ação" name="nomeAcao" required>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6">
                        <button type="submit" name="btn-insere" class="btn btn-primary btn-block">Incluir</button>
                    </div>

            </form>
            <div class="table-responsive">
                <table class="table table-hover  mt-5 rounded" id="listar_clientes">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nome</th>
                            <th width="120">Ações</th>
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
            "url": "../model/tipo_acao/consulta.php",
            "type": "POST"
        },
    });
} );
</script>

<?php

$result_clientes = "SELECT * FROM tipo_acao WHERE tipo_acao.escritorio_id = '$id'";
$resultado_clientes = mysqli_query($conn, $result_clientes);
while ($row_clientes = mysqli_fetch_array($resultado_clientes)) {
echo'
<div class="modal fade" id="modalAlterar'.$row_clientes["id"].'" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../model/tipo_acao/altera.php" method="POST">
                <div class="modal-body">
                    <p>Preencha o campo abaixo com o novo nome para "'.$row_clientes["nome"].'".</p>
                    <input type="text" class="form-control" name="nomeAcao" required>     
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idAcao" value=value="'.$row_clientes["id"].'">
                    <button type="submit" name="btn-altera" class="btn btn-primary">Alterar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>
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
                <form action="../model/tipo_acao/remove.php" method="POST">
                    <div class="modal-body">
                        <p>Você tem certeza que deseja excluir "'.$row_clientes["nome"].'"?.</p>    
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idAcao" value=value="'.$row_clientes["id"].'">
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
                        <p>Desculpe, mas o tipo da ação "'.$row_clientes["nome"].'" está sendo utilizado
                        em um atendimento ou processo. Para que você possa excluir "'.$row_clientes["nome"].'",
                        é necessário primeiramente remover os cadastros que estão vinculados!</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idAcao" value=value="'.$row_clientes["id"].'">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
            </div>
        </div>
    </div>';
    }
include('footer.php');
?>