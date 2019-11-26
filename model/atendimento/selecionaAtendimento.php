<?php
include_once("../conexao.php");

if(isset($_POST['btn-editar'])){
    
    if(!isset($_SESSION)) 
    { 
        session_start();
    }
    $_SESSION['atendimentoId'] = mysqli_real_escape_string($conn, $_POST['btn-editar']);
    $query = "SELECT * FROM atendimento WHERE id = {$_SESSION['atendimentoId']}";
    $result = mysqli_query($conn, $query);
    $dados = mysqli_fetch_array($result);
    $_SESSION['atendimentoRelato'] = $dados['relato'];
    $_SESSION['atendimentoIdTipoAcao'] = $dados['tipoacao_id'];
    $query2 = "SELECT * FROM cliente WHERE id = {$dados['cliente_id']}";
    $result2 = mysqli_query($conn, $query2);
    $dados2 = mysqli_fetch_array($result2);
    $_SESSION['atendimentoCliente'] = $dados2['nome'];
    header('Location: ../../view/atendimentoEditar.php');
}
?>