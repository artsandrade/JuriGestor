<?php
include_once("../model/conexao.php");
session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
    header('Location: ../view/index.html');
}
?>

<?php
include('header.php');

include_once "../model/conexao.php";
?>
<script type="text/javascript" src="../js/buscaCliente.js"></script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pb-5">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cadastro de atendimento</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Atendimentos</a></li>
                        <li class="breadcrumb-item active">Cadastrar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="../model/atendimento/insere.php" method="POST" name="formulario">
                <div class="form-row mt-5">
                    <div class="form-group col-md-6 col-sm-11 col-10">
                        <label for="inputCliente">Cliente</label>
                        <input class="form-control" id="idcliente" placeholder="" name="idcliente" readonly required>
                    </div>
                    <div class="form-group col-md-1 col-sm-1 col-1 mt-auto" style="text-align: left;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPesquisaCliente" title="Pesquisar cliente"><i class="fas fa-search"></i>
                    </div>
                    <div class="form-group col-md-5 col-sm-12 col-12">
                        <label for="comboTipoAcao">Tipo da ação</label>
                        <select class="form-control" id="idtipoacao" name="idtipoacao">
                            <?php
                            include("../model/conexao.php");
                            include("../model/tipo_acao/consulta.php");
                            global $result;
                            while ($dados = mysqli_fetch_array($result)) :
                                ?>
                                <option value="<?php echo $dados['id']; ?>"><?php echo $dados['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-12">
                        <label for="inputRelato">Relato</label>
                        <textarea class="form-control" id="relato" name="relato" rows="4"></textarea>
                    </div>
                    <div class="form-group mt-5 mr-auto">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalLimpar" title="Limpar campos">Limpar</button>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" name="btn-insere" class="btn btn-primary">Cadastrar</button> 
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<?php

include('footer.php');

?>
<!-- Modal pesquisa de cliente -->
<div class="modal fade" id="modalPesquisaCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="tabelaCliente">
            <form action="../model/atendimento/consultaCliente.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesquisar cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row mt-auto">
                        <div class="form-group col-md-12 col-sm-12 col-12">
                            <input class="form-control" id="nomeCliente" placeholder="Nome do cliente" name="nomeCliente" onkeyup="buscarCliente(this.value)" required>
                        </div>
                    </div>

                    <div class="table-responsive" id="resultado">
                        <table class="table table-hover  mt-5 rounded">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Documento</th>
                                    <th width="30" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("../model/conexao.php");
                                include("../model/atendimento/consultaCliente.php");
                                global $result;
                                while ($dados = mysqli_fetch_array($result)) :
                                    ?>
                                    <tr>
                                        
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTribunalNao<?php echo $dados['id']; ?>" title="Selecionar cliente"><i class="fas fa-check"></i></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal limpar campos -->
<div class="modal fade" id="modalLimpar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="tabelaCliente">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Limpar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row mt-auto">
                        <div class="form-group col-md-12 col-sm-12 col-12">
                            <input class="form-control" id="nomeCliente" placeholder="Nome do cliente" name="nomeCliente" onkeyup="buscarCliente(this.value)" required>
                        </div>
                    </div>

                    <div class="table-responsive" id="resultado">
                        
                    </div>
                    <div class="modal-footer">
                        <button href="atendimentoCadastrar.php" type="button" class="btn btn-secondary" data-dismiss="modal">Limpar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
            </form>
        </div>
    </div>
</div>


<!--Modal para arquivo-->

<div class="modal fade" id="modalArquivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="tabelaCliente">
            <form action="../model/atendimento/consultaCliente.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesquisar cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row mt-auto">
                        <div class="form-group col-md-12 col-sm-12 col-12">
                            <input class="form-control" id="nomeCliente" placeholder="Nome do cliente" name="nomeCliente" onkeyup="buscarCliente(this.value)" required>
                        </div>
                    </div>

                    <div class="table-responsive" id="resultado">
                        <table class="table table-hover  mt-5 rounded">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Documento</th>
                                    <th width="30" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("../model/conexao.php");
                                include("../model/atendimento/consultaCliente.php");
                                global $result;
                                while ($dados = mysqli_fetch_array($result)) :
                                    ?>
                                    <tr>
                                        
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTribunalNao<?php echo $dados['id']; ?>" title="Selecionar cliente"><i class="fas fa-check"></i></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
            </form>
        </div>
    </div>
</div>