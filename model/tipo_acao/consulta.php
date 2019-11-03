<?php

include_once("conexao.php");

if(isset($_POST['btn-consulta'])){
    session_start();
    $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);

    $query = "SELECT * FROM tipo_acao WHERE escritorio_id = '{$id}'";
    $result = mysqli_query($conn, $query);
    
    if($result){
        header('Location: ../view/tipo_acao.html?sucesso');
    }
    else{
        header('Location: ../view/tipo_acao.html?erro');
    }
}
?>