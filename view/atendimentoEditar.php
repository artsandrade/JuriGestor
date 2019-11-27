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
                    <h1>Editar atendimento</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Atendimentos</a></li>
                        <li class="breadcrumb-item active"><a href="atendimentoConsultar.php">Consultar</a></li>
                        <li class="breadcrumb-item active">Editar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <?php
    if(isset($_SESSION['mensagem'])):?>
    <div class="col-sm-4 ml-auto">
        <?php if($_SESSION['mensagem']=='Cadastrado com sucesso!'):?>
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
            <form action="../model/atendimento/altera.php" method="POST" name="formulario">
                <div class="form-row mt-5">
                    <div class="form-group col-md-7 col-sm-12 col-12">
                        <label for="inputCliente">Cliente</label>
                        <input class="form-control" id="idcliente" name="idcliente" value="<?php echo $_SESSION['atendimentoCliente']?>" readonly>
                    </div>
                    <div class="form-group col-md-5 col-sm-12 col-12">
                        <label for="comboTipoAcao">Tipo da ação</label>
                        <select class="form-control" id="idtipoacao" name="idtipoacao">
                            <?php
                            include("../model/conexao.php");
                            include("../model/tipo_acao/consultaNomes.php");
                            global $result;
                            while ($dados = mysqli_fetch_array($result)) :
                                if($dados['id']==$_SESSION['atendimentoIdTipoAcao']):
                                ?>
                                    <option value="<?php echo $dados['id']; ?>" selected><?php echo $dados['nome']; ?></option>
                                <?php else:?>
                                    <option value="<?php echo $dados['id']; ?>"><?php echo $dados['nome']; ?></option>
                            <?php endif; endwhile; ?>
                        </select>

                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-12">
                        <label for="inputRelato">Relato</label>
                        <textarea class="form-control" id="relato" name="relato" rows="4" required ><?php echo $_SESSION['atendimentoRelato']?></textarea>
                    </div>
                    <div class="form-group mt-5 mr-auto">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalLimpar" title="Limpar campos">Limpar</button>
                    </div>
                    <div class="form-group mt-5">
                        <input type="hidden" id="idAtendimento" name="idAtendimento" value="<?php echo $_SESSION['atendimentoId'];?>">
                        <button type="submit" name="btn-altera" class="btn btn-primary">Editar</button> 
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<?php

include('footer.php');

?>

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