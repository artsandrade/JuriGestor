<?php
session_start();
include_once("../conexao.php");

if(isset($_POST['btn-altera'])){
    
    $id = mysqli_real_escape_string($conn, $_POST['idAcao']);
    $nome = mysqli_real_escape_string($conn, $_POST['nomeAcao']);

    $query = "UPDATE tipo_acao set nome = '{$nome}' WHERE id = '{$id}'";
    $result = mysqli_query($conn, $query);

    if($result){
        $_SESSION['mensagem'] = "Alterado com sucesso!";
        header('Location: ../../view/tipoAcao.php');
    }
    else{
        $_SESSION['mensagem'] = "Erro ao alterar!";
        header('Location: ../../view/tipoAcao.php');
    }
}
?>