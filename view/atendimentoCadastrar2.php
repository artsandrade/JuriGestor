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
            <form action="" method="POST" name="formulario">
                <div class="form-row mt-5">
                    <div class="form-group col-md-6 col-sm-11 col-10">
                        <label for="inputCliente">Cliente</label>
                        <input class="form-control" id="idcliente" placeholder="" name="idcliente" required>
                    </div>
                    <div class="form-group col-md-1 col-sm-1 col-1 mt-auto" style="text-align: left;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPesquisaCliente" title="Pesquisar cliente"><i class="fas fa-search"></i>
                    </div>
                    <div class="form-group col-md-5 col-sm-12 col-12">
                        <label for="comboTipoAcao">Tipo da ação</label>
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
<!-- Modal para verificar se fará upload arquivo -->
<div class="modal fade" id="modalArquivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar arquivos</h5>                                    
            </div>
            <div class="modal-body">
                <p>Você deseja adicionar arquivos a esse atendimento?</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="arquivoAtendimento.php" role="button">Sim</a>
                <a class="btn btn-secondary" href="atendimentoCadastrar.php" role="button">Não</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#modalArquivo').modal('show');
    });
      </script>