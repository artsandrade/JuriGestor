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
    if(isset($_POST['btn-consulta'])){
    
        $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);
        $nome = mysqli_real_escape_string($conn, $_POST['nomeAcao']);
    
        $query = "SELECT * FROM tipo_acao WHERE nome LIKE '%{$nome}%' AND escritorio_id = '{$id}'";
        $result = mysqli_query($conn, $query);
        
        if($result){
            header('Location: ../../view/tipoAcao.php?sucesso');
        }
        else{
            header('Location: ../../view/tipoAcao.php?erro');
        }
    }
    else{
        if(isset($_POST['btn-altera'])){
    
            $id = mysqli_real_escape_string($conn, $_POST['idAcao']);
        $nome = mysqli_real_escape_string($conn, $_POST['nomeAcao']);

        $query = "UPDATE tipo_acao set nome = '{$nome}' WHERE id = '{$id}'";
        $result = mysqli_query($conn, $query);
        
            header('Location: ../../view/tipoAcao.php?sucesso');
        }
        else{
            if(isset($_POST['btn-remove'])){
                if(!isset($_SESSION)) 
                { 
                session_start(); 
                }
                $id = mysqli_real_escape_string($conn, $_POST['idAcao']);
        
                $query = "DELETE FROM tipo_acao WHERE id = '$id'";
                $result = mysqli_query($conn, $query);
        
                header('Location: ../../view/tipoAcao.php?sucesso');
                
        }
        }
    }
}
?>