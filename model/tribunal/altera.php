<?php
session_start();
include_once("../conexao.php");

if(isset($_POST['btn-altera'])){
    
        $id = mysqli_real_escape_string($conn, $_POST['idTribunal']);
        $nome = mysqli_real_escape_string($conn, $_POST['nomeTribunal']);

        $query = "UPDATE tribunal set nome = '{$nome}' WHERE id = '{$id}'";
        $result = mysqli_query($conn, $query);
        
        if($result){
            $_SESSION['mensagem'] = "Alterado com sucesso!";
            header('Location: ../../view/tribunal.php');
        }
        else{
            $_SESSION['mensagem'] = "Erro ao alterar!";
            header('Location: ../../view/tribunal.php');
        }
        
}
?>