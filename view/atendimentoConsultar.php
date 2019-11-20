<?php
include_once("../model/conexao.php");
session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
    header('Location: ../view/index.html');
}
?>

<?php
include('header.php');
?>

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

            <form>
                <div class="form-row mt-5">
                    <div class="col-md-7 col-sm-12 col-12">
                        <label for="nomeCliente">Cliente</label>
                        <input type="text" class="form-control" id="nomeCliente">
                    </div>
                    <div class="col-md-3 col-sm-12 col-12">
                        <label for="comboTipoAcao">Tipo da ação</label>
                        <select id="comboTipoAcao" class="form-control">
                            <option>Selecione</option>
                            <?php
                            include("../model/conexao.php");
                            include("../model/tipo_acao/consulta.php");
                            global $result;
                            while ($dados = mysqli_fetch_array($result)) :
                                ?>
                                <option><?php echo $dados['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12 mt-auto">
                        <button type="submit" class="btn btn-primary btn-block">Pesquisar</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover mt-5 rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-dark text-light">Cliente</th>
                            <th scope="col" class="bg-dark text-light">Tipo da ação</th>
                            <th scope="col" class="bg-dark text-light">Relato</th>
                            <th width="20" scope="col" class="bg-dark text-light"></th>
                            <th width="20" scope="col" class="bg-dark text-light"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../model/conexao.php");
                        include("../model/atendimento/consulta.php");
                        global $result;
                        while ($dados = mysqli_fetch_array($result)) :
                            ?>
                            <tr>
                                <!--Consultando nome do tipo da ação pela id-->
                                <?php
                                    if (!isset($_SESSION)) {
                                        session_start();
                                    }
                                    $id = mysqli_real_escape_string($conn, $dados['tipoacao_id']);
                                    $query2 = "SELECT * FROM tipo_acao WHERE id = '$id'";
                                    $result2 = mysqli_query($conn, $query2);
                                    $dados2 = mysqli_fetch_array($result2)
                                    ?>

                                <!--Consultando nome do cliente pela id-->
                                <?php
                                    if (!isset($_SESSION)) {
                                        session_start();
                                    }
                                    $id = mysqli_real_escape_string($conn, $dados['cliente_id']);
                                    $query3 = "SELECT * FROM cliente WHERE id = '$id'";
                                    $result3 = mysqli_query($conn, $query3);
                                    $dados3 = mysqli_fetch_array($result3)
                                    ?>

                                <td><?php echo substr($dados3['nome'], 0, 40); ?></td>
                                <td><?php echo substr($dados2['nome'], 0, 40); ?></td>
                                <td><?php echo substr($dados['relato'], 0, 50); ?>...</td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAcaoAlterar<?php echo $dados['id']; ?>" data-whatever="<?php echo $dados['nome']; ?>"><i class="fas fa-pencil-alt"></i></td>
                                <?php
                                    $id = mysqli_real_escape_string($conn, $dados['id']);
                                    $query1 = "SELECT * FROM processo WHERE processo.atendimento_id = '$id'";
                                    $result1 = mysqli_query($conn, $query1);
                                    if (mysqli_num_rows($result1) > 0) : ?>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAtendimentoNao<?php echo $dados['id']; ?>"><i class="fas fa-trash-alt"></i></td>
                                <?php
                                    else : ?>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAcao<?php echo $dados['id']; ?>"><i class="fas fa-trash-alt"></i></td>
                                <?php endif; ?>

                                <!-- Modal Exclusão-->
                                <div class="modal fade" id="modalAcao<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Você tem certeza que deseja excluir o atendimento do cliente "<?php echo $dados3['nome']; ?>"?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="../model/atendimento/remove.php" method="POST">

                                                    <input type="hidden" name="idAtendimento" value="<?php echo $dados['id']; ?>">
                                                    <button type="submit" name="btn-remove" class="btn btn-primary">Excluir</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Não Exclusão-->
                                <div class="modal fade" id="modalAtendimentoNao<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Impossível excluir</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Desculpe, mas o atendimento do cliente "<?php echo $dados3['nome']; ?>" está atribuído a um processo.
                                                    Para que você possa excluir esse atendimento, é necessário primeiramente remover o processo a ele vinculado!</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('footer.php');

?>