<?php
session_start();
include('header.php');
include_once('../model/conexao.php');

$id = $_GET['id'];
$status = $_GET{'status'};

$sql = "SELECT * FROM cliente WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

<script>
$(function(){
   setDisabled(true); 
   
   
  
});

function setDisabled(state){
     $('.form input,select,textarea, btn').each(function(){
       $(this).prop("disabled", state);
     });
   }
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
<div class="row">
    <button class="btn btn-primary float-left" onclick="setDisabled(false)" id="editar">Iniciar Edição</button>
</div>

<form action="" class="mt-5 form" method="POST" id="form">
    <?php 
        
        if($status == 0){
            include('visualizarJuridica.php');
        }else        
            include('visualizarFisica.php');
    ?>
  
</form>

     </div>
</section>  
</div>
<?php
include('footer.php');
?>