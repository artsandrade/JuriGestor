<?php
session_start();
include_once("../conexao.php");

if(isset($_POST['btn-altera'])){
    
    $id = $_POST['idAtendimento'];
    $tipoacao =  $_POST['idtipoacao'];
    $relato =  $_POST['relato'];

    $query = "UPDATE atendimento set tipoacao_id='$tipoacao', relato='$relato' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        $_SESSION['mensagem'] = "Alterado com sucesso!";
        header('Location: ../../view/atendimentoConsultar.php');
    }
    else{
        $_SESSION['mensagem'] = "Erro ao alterar!";
        header('Location: ../../view/atendimentoConsultar.php');
    }
}
?>