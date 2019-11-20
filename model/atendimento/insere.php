<?php
include_once("../conexao.php");

if(isset($_POST['btn-insere'])){
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    $data = date("Y/m/d");
    $relato = mysqli_real_escape_string($conn, $_POST['relato']);
    $cliente_id = mysqli_real_escape_string($conn, $_POST['idcliente']);
    $usuario_id = mysqli_real_escape_string($conn, $_SESSION['id_user']);
    $escritorio_id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);
    $tipoacao_id = mysqli_real_escape_string($conn, $_POST['idtipoacao']);

    $query = "INSERT INTO atendimento(dt, relato, cliente_id, usuario_id, escritorio_id, tipoacao_id) VALUES ('{$data}', '{$relato}', '{$cliente_id}', '{$usuario_id}', '{$escritorio_id}', '{$tipoacao_id}')";
    $result = mysqli_query($conn, $query);
    if($result){
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../../view/atendimentoCadastrar.php');
    }
    else{
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../../view/atendimentoCadastrar.php');
    }
}
?>