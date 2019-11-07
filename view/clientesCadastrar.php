<?php
include('header.php');
?>
<script src="../js/clientes.js"></script>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Painel administrativo</a>
            </li>
            <li class="breadcrumb-item active">Clientes</li>
        </ol>

        <h1>Cadastro de Clientes</h1>

            <p class="mt-5">Você deseja cadastrar..</p>
            <div class="btn btn-primary mr-4 d-inline-flex" id="pessoaFisica"onclick="Mudarestado(true, false)" >Pessoa Fisíca</div>
            <div class="btn btn-primary d-inline-flex" id="pessoaJuridica" onclick="Mudarestado(false, true)">Pessoa Jurídica</div>
    
        <div>
            <form action="" id="pf" style="display: none;">
                <input type="text" value="dsaas" > 

            </form>
            <form action="" id="pj" style="display: none;">
                <input type="text" value="hatunamtata"> 



            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->


<?php
include('footer.php');
?>