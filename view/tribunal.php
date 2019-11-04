<?php
include_once("../model/conexao.php");
session_start();

if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
    header('Location: index.html');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="../img/logomarcamin.png">

    <title>JuriGestor - Admin</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="index.html">JuriGestor</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="O que procura...?" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- <span class="badge badge-danger">9+</span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <!-- <span class="badge badge-danger">7</span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-friends"></i>
                    <span>Atendimento</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Opções:</h6>
                    <a class="dropdown-item" href="#">Cadastrar</a>
                    <a class="dropdown-item" href="#">Consultar</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-alt"></i>
                    <span>Clientes</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Opções:</h6>
                    <a class="dropdown-item" href="#">Cadastrar</a>
                    <a class="dropdown-item" href="#">Consultar</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-book-open"></i>
                    <span>Processos</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Opções:</h6>
                    <a class="dropdown-item" href="#">Cadastrar</a>
                    <a class="dropdown-item" href="#">Consultar</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-tools"></i>
                    <span>Ferramentas</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Opções:</h6>
                    <a class="dropdown-item" href="tipoAcao.php">Tipo da ação</a>
                    <a class="dropdown-item" href="tribunal.php">Tribunal</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </ul>

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
                            <input class="form-control" id="inputTribunal" placeholder="Nome do tribunal" name="nomeTribunal">
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
                        <thead>
                            <tr>
                                <th scope="col" class="bg-dark text-light">Nome</th>
                                <th width="40" scope="col" class="bg-dark text-light"></th>
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
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTribunal<?php echo $dados['id']; ?>"><i class="fas fa-trash-alt"></i></td>

                                    <!-- Modal -->
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione sair para encerrar sua sessão</div>
                <div class="modal-footer text-justify">
                    <form action="../model/efetuaLogout.php" method="POST">
                        <button class="btn btn-secondary mr-auto" type="button" data-dismiss="modal">Voltar</button>
                        <button class="btn btn-danger pl-auto" name="efetuaLogout" id="efetuaLogout">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.js"></script>

</body>

</html>