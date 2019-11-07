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
            <li class="breadcrumb-item active">Atendimentos</li>
        </ol>

        <h1>Cadastro de Atendimentos</h1>
        <form>
            <div class="form-row mt-5">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">CPF do Cliente</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEstado">Tipo da ação</label>
                    <select id="inputEstado" class="form-control">
                        <option>Ação trabalhista</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Pesquisar</button>
        </form>
        <div class="table-responsive">
            <table class="table table-hover mt-5 rounded">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Tipo da ação</th>
                        <th scope="col">Relato</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mark</td>
                        <td>Ação trabalhista</td>
                        <td>Reclamação sobre abuso de desvio de função</td>

                    </tr>
                    <tr>

                        <td>Mark</td>
                        <td>Ação trabalhista</td>
                        <td>Reclamação sobre abuso de desvio de função</td>
                    </tr>
                    <tr>

                        <td>Mark</td>
                        <td>Ação trabalhista</td>
                        <td>Reclamação sobre abuso de desvio de função</td>
                    </tr>
                </tbody>
            </table>
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