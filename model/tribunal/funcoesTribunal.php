<?php

include_once("../conexao.php");

if(isset($_POST['btn-insere'])){
    session_start();
    $nome = mysqli_real_escape_string($conn, $_POST['nomeTribunal']);
    $escritorio_id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);

    $query = "INSERT INTO tribunal(nome, escritorio_id) VALUES ('$nome', '$escritorio_id')";
    $result = mysqli_query($conn, $query);
    if($result){
        header('Location: ../../view/tribunal.php?sucesso');
    }
    else{
        header('Location: ../../view/tribunal.php?erro');
    }
}
else{
    if(isset($_POST['btn-consulta'])){
    
        $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);
        $nome = mysqli_real_escape_string($conn, $_POST['nomeTribunal']);
    
        $query = "SELECT * FROM tribunal WHERE nome LIKE '%{$nome}%' AND escritorio_id = '{$id}'";
        $result = mysqli_query($conn, $query);
        
        if($result){
            header('Location: ../../view/tribunal.php?sucesso');
        }
        else{
            header('Location: ../../view/tribunal.php?erro');
        }
    }
    else{
        if(isset($_POST['btn-altera'])){
    
            $id = mysqli_real_escape_string($conn, $_POST['idTribunal']);
        $nome = mysqli_real_escape_string($conn, $_POST['nomeTribunal']);

        $query = "UPDATE tribunal set nome = '{$nome}' WHERE id = '{$id}'";
        $result = mysqli_query($conn, $query);
        
            header('Location: ../../view/tribunal.php?sucesso');
        }
        else{
            if(isset($_POST['btn-remove'])){
    
                $id = mysqli_real_escape_string($conn, $_POST['idTribunal']);
        
                $query = "DELETE FROM tribunal WHERE id = '$id'";
                $result = mysqli_query($conn, $query);
                
                    header('Location: ../../view/tribunal.php?sucesso');
                
        } 
        }
    }
}
?>