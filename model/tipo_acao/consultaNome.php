<?php
session_start();
include_once("conexao.php");

if(isset($_POST['btn-consulta'])){
    
    $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);
    $nome = mysqli_real_escape_string($conn, $_POST['nomeAcao']);

    $query = "SELECT * FROM tipo_acao WHERE nome LIKE '%{$nome}%' AND escritorio_id = '{$id}'";
    $result = mysqli_query($conn, $query);
    
    if($result){
        header('Location: ../view/tipo_acao.html?sucesso');
    }
    else{
        header('Location: ../view/tipo_acao.html?erro');
    }
}
?>