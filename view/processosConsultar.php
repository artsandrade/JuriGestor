<?php
include('header.php');
?>


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
    <section class="content">
        <div class="container-fluid">
            
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEstado">Filtro</label>
                        <select id="inputEstado" class="form-control">
                            <option selected>Nome do cliente</option>
                            <option>Nome fantasia</option>
                            <option>CPF</option>
                            <option>CNPJ</option>
                            <option>Número do processo</option>
                            <option>Situação</option>   
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCampoDigitado">&nbsp;</label>
                        <input type="text" class="form-control" id="inputCampoDigitado">
                    </div>
                </div>
                <button class="btn btn-primary float-right">Pesquisar</button>
            </form>
            <div class="table-responsive">
                <table class="table table-hover  mt-5 rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th>Cliente</th>
                            <th>Número do processo</th>
                            <th>Situação</th>
                            <th>Polo</th>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Arthur Andrade</td>
                            <td>2345678</td>
                            <td>Em andamento</td>
                            <td>Não sei</td>
                        </tr>
                        <tr>
                            <td>Pedro Henrique</td>
                            <td>7865432</td>
                            <td>Arquivado</td>
                            <td>Não sei também</td>
                        </tr>
                        <tr>
                            <td>Ricardo</td>
                            <td>9996766</td>
                            <td>Em andamento</td>
                            <td>Menos ainda</td>
                        </tr>
                    </tbody>
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

<?php
include('footer.php');
?>