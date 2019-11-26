<?php
session_start();
include('header.php');
include_once('../model/conexao.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

<form class="form-inline ml-5">
    <?php 
        $status = $_GET{'status'};
        if($status == 0){
            include('pessoaJuridica.php');
        }        
        include('pessoaFisica.php');
    ?>
  
</form>

     </div>
</section>  
</div>
<?php
include('footer.php');
?>