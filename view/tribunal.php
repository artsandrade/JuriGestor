<?php
include_once("../model/conexao.php");
session_start();

if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
    header('Location: ../index.php');
}

?>

<?php
include('header.php');
?>

<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Painel administrativo</a>
            </li>
            <li class="breadcrumb-item active">Tribunal</li>
        </ol>

        <!-- Page Content -->
        <!-- <h1>Blank Page</h1>
        <hr>
        <p>This is a great starting point for new custom pages.</p> -->
        <h1 class="">Tribunal</h1>
        <form action="../model/tribunal/funcoesTribunal.php" method="post">
            <div class="form-row mt-5">
                <div class="form-group col-md-8 col-sm-12 col-12">
                    <input class="form-control" id="inputTribunal" placeholder="Nome do tribunal" name="nomeTribunal" required>
                </div>
                <div class="col-md-2 col-sm-6 col-6">
                    <button type="submit" name="btn-consulta" class="btn btn-primary btn-block">Pesquisar</button>
                </div>
                <div class="col-md-2 col-sm-6 col-6">
                    <button type="submit" name="btn-insere" class="btn btn-primary btn-block">Incluir</button>
                </div>
        </form>
        <div class="table-responsive">
            <table class="table table-hover  mt-5 rounded">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th width="30" scope="col"></th>
                        <th width="30" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../model/conexao.php");
                    include("../model/tribunal/consulta.php");
                    global $result;
                    while ($dados = mysqli_fetch_array($result)) :
                        ?>
                        <tr>
                            <td><?php echo $dados['nome']; ?></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTribunalAlterar<?php echo $dados['id']; ?>" data-whatever="<?php echo $dados['nome']; ?>" title="Alterar"><i class="fas fa-pencil-alt"></i></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTribunal<?php echo $dados['id']; ?>" title="Excluir"><i class="fas fa-trash-alt"></i></td>

                            <!-- Modal Exclusão-->
                            <div class="modal fade" id="modalTribunal<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Você tem certeza que deseja excluir "<?php echo $dados['nome']; ?>"?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="../model/tribunal/remove.php" method="POST">
                                                <input type="hidden" name="idTribunal" value="<?php echo $dados['id']; ?>">
                                                <button type="submit" name="btn-remove" class="btn btn-primary">Excluir</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Exclusão-->
                            <div class="modal fade" id="modalTribunalAlterar<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="../model/tribunal/altera.php" method="POST">
                                            <div class="modal-body">
                                                <p>Faça as devidas alterações abaixo</p>
                                                <input type="text" class="form-control" name="nomeTribunal" required>
                                                <script>
                                                    $('#modalTribunalAlterar<?php echo $dados['id']; ?>').on('show.bs.modal', function(event) {
                                                        var button = $(event.relatedTarget) // Botão que acionou o modal
                                                        var recipient = button.data('whatever') // Extrai informação dos atributos data-*
                                                        // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
                                                        // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
                                                        var modal = $(this)
                                                        modal.find('.modal-body input').val(recipient)
                                                    })
                                                </script>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="idTribunal" value="<?php echo $dados['id']; ?>">
                                                <button type="submit" name="btn-altera" class="btn btn-primary">Alterar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="tribunal.php">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include('footer.php');
?>