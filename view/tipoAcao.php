<?php
include_once("../model/conexao.php");
session_start();
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
            <li class="breadcrumb-item active">Tipo da ação</li>
        </ol>

        <!-- Page Content -->
        <!-- <h1>Blank Page</h1>
        <hr>
        <p>This is a great starting point for new custom pages.</p> -->
        <h1 class="">Tipo da ação</h1>
        <form action="../model/tipo_acao/funcoesTipoAcao.php" method="POST">
            <div class="form-row mt-5">
                <div class="form-group col-md-8 col-sm-12 col-12">
                    <input type="form-control" class="form-control" name="nomeAcao" id="nomeAcao" placeholder="Nome da ação" required>
                </div>
                <div class="col-md-2 col-sm-6 col-6">
                    <button type="submit" name="btn-consulta" class="btn btn-primary btn-block">Pesquisar</button>
                </div>
                <div class="col-md-2 col-sm-6 col-6">
                    <button type="submit" name="btn-insere" class="btn btn-primary btn-block">Incluir</button>
                </div>
            </div>
        </form>
        
        <div class="table-responsive" id="tabelaTipoAcao">
            <table class="table table-hover  mt-5 rounded" >
                <thead>
                    <tr>
                        <th scope="col" class="bg-dark text-light">Nome</th>
                        <th width="30" scope="col" class="bg-dark text-light"></th>
                        <th width="30" scope="col" class="bg-dark text-light"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../model/conexao.php");
                    include("../model/tipo_acao/consulta.php");
                    global $result;
                    while ($dados = mysqli_fetch_array($result)) :
                    ?>
                        <tr>
                            <td><?php echo $dados['nome']; ?></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAcaoAlterar<?php echo $dados['id']; ?>" data-whatever="<?php echo $dados['nome']; ?>"><i class="fas fa-pencil-alt"></i></td>
                            <?php
                                $id = mysqli_real_escape_string($conn, $dados['id']);
                                $query1 = "SELECT * FROM atendimento WHERE atendimento.tipoacao_id = '$id'";
                                $result1 = mysqli_query($conn, $query1);

                                $query2 = "SELECT * FROM processo WHERE processo.tipo_acao_id = '$id'";
                                $result2 = mysqli_query($conn, $query2);
                                    if (mysqli_num_rows($result1)>0 or mysqli_num_rows($result2)>0):?>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAcaoNao<?php echo $dados['id']; ?>"><i class="fas fa-trash-alt"></i></td>
                                <?php
                                    else:?>
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
                                            <p>Você tem certeza que deseja excluir "<?php echo $dados['nome']; ?>"?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="../model/tipo_acao/remove.php" method="POST">

                                                <input type="hidden" name="idAcao" value="<?php echo $dados['id']; ?>">
                                                <button type="submit" name="btn-remove" class="btn btn-primary">Excluir</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Alteração-->
                            <div class="modal fade" id="modalAcaoAlterar<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <p>Faça as devidas alterações abaixo</p>
                                                <input type="text" class="form-control" name="nomeAcao" required>
                                                <script>
                                                    $('#modalAcaoAlterar<?php echo $dados['id']; ?>').on('show.bs.modal', function(event) {
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
                                                <input type="hidden" name="idAcao" value="<?php echo $dados['id']; ?>">
                                                <button type="submit" name="btn-altera" class="btn btn-primary">Alterar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Não Exclusão-->
                            <div class="modal fade" id="modalAcaoNao<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Impossível excluir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Desculpe, mas o tipo da ação "<?php echo $dados['nome']; ?>" está sendo utilizado em um atendimento ou processo.
                                            Para que você possa excluir "<?php echo $dados['nome']; ?>"", é necessário primeiramente remover os cadastros que estão
                                            vinculados!</p>
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
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="tipoAcao.php">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include('footer.php');
?>