<?php
session_start();
include_once("../conexao.php");

if(isset($_POST['btn-remove'])){
    
        $id = mysqli_real_escape_string($conn, $_POST['idAcao']);

        $query = "DELETE FROM tipo_acao WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        header('Location: ../../view/tipoAcao.php?sucesso');
        
} 
?>