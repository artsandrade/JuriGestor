<?php

include_once("conexao.php");

if(isset($_POST['btn-altera'])){
    session_start();
    $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);

    $query = "UPDATE tipo_acao set nome = '{$nome}' WHERE escritorio_id = '{$id}'";
    $result = mysqli_query($conn, $query);
    
    if($result){
        header('Location: ../view/tipo_acao.html?sucesso');
    }
    else{
        header('Location: ../view/tipo_acao.html?erro');
    }
}
?>