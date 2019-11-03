<?php

include_once("conexao.php");

if(isset($_POST['btn-insere'])){
    session_start();
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $escritorio_id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);

    $query = "INSERT INTO tipo_acao(nome, escritorio_id) VALUES ('{$nome}', '{$escritorio_id}')";
    $result = mysqli_query($conn, $query);
    if($result){
        header('Location: ../view/tipo_acao.html?sucesso');
    }
    else{
        header('Location: ../view/tipo_acao.html?erro');
    }
}
?>