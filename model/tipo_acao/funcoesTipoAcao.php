<?php

include_once("../conexao.php");

if(isset($_POST['btn-insere'])){
    if(!isset($_SESSION)) 
        { 
        session_start(); 
        }
    $nome = mysqli_real_escape_string($conn, $_POST['nomeAcao']);
    $escritorio_id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);

    $query = "INSERT INTO tipo_acao(nome, escritorio_id) VALUES ('$nome', '$escritorio_id')";
    $result = mysqli_query($conn, $query);
    if($result){
        header('Location: ../../view/tipoAcao.php?sucesso');
    }
    else{
        header('Location: ../../view/tipoAcao.php?erro');
    }
}
else{
    if(isset($_POST['btn-remove'])){
        if(!isset($_SESSION)) 
        { 
        session_start(); 
        }

        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $query = "DELETE FROM tribunal WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if($result){
            header('Location: ../../view/tribunal.php?sucesso');
        }
    }
    else{
        header('Location: ../../view/tipoAcao.php');
    }
}
?>