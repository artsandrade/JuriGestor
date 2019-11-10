<?php
session_start();
include_once("../conexao.php");

if(isset($_POST['btn-remove'])){
    
        $id = mysqli_real_escape_string($conn, $_POST['idAtendimento']);

        $query = "DELETE FROM atendimento WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        header('Location: ../../view/atendimentoConsultar.php?sucesso');
        
} 
?>