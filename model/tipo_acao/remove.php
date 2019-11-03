<?php

include_once("conexao.php");

if(isset($_POST['btn-remove'])){
    session_start();
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "DELETE FROM tipo_acao WHERE id = '{$id}'";
    $result = mysqli_query($conn, $query);
    
    if($result){
        header('Location: ../view/tipo_acao.html?sucesso');
    }
    else{
        header('Location: ../view/tipo_acao.html?erro');
    }
}
?>