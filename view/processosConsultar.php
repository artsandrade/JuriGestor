<?php
include('header.php');
include('../model/conexao.php');
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
            
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFiltro">Filtro</label>
                        <select id="inputFiltro" class="form-control" name="inputFiltro">
                            <option selected value="0">Nome do cliente</option>
                            <option value="1">CPF</option>
                            <option value="2">CNPJ</option>
                            <option value="3">Número do processo</option> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCampoDigitado">&nbsp;</label>
                        <input type="text" class="form-control" id="inputCampoDigitado" name="inputCampoDigitado">
                    </div>
                </div>
                <button class="btn btn-primary float-right" formaction="../model/processos/consulta.php">Pesquisar</button>
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
                    <?php 
                        $sql = "SELECT * FROM processo ";
                        $query = mysqli_query($conn, $sql);

                        while ($dados = mysqli_fetch_array($query)) {
                        echo"
                        <tr>
                            <td></td>
                            <td>$dados[num_processo]</td>
                            <td>$dados[situacao]</td>
                            <td>$dados[polo]</td>
                        </tr>";
                        }
                    ?>                  
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