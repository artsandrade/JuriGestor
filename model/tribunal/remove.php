<?php
session_start();
include_once("../conexao.php");

if(isset($_POST['btn-remove'])){
    
        $id = mysqli_real_escape_string($conn, $_POST['idTribunal']);

        $query = "DELETE FROM tribunal WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        
            header('Location: ../../view/tribunal.php?sucesso');
        
} 
?>