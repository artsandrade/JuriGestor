<?php
include_once("conexao.php");

if(empty($_POST['user']) || empty($_POST['pass'])){
    header('Location: ../view/index.html');
    exit();
}

$user = mysqli_real_escape_string($conn, $_POST['user']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

$query = "SELECT * FROM usuario WHERE login = '{$user}' and senha= md5('{$pass}')";
$result = mysqli_query($conn, $query);
$dados = mysqli_fetch_array($result);
$row = mysqli_num_rows($result);

if($row==1){
    session_start();
    $_SESSION['id_user'] = $dados['id'];
    $_SESSION['user'] = $user;
    $_SESSION['advogado'] = $dados['advogado'];
    $_SESSION['ativo'] = $dados['ativo'];
    $_SESSION['escritorio_id'] = $dados['escritorio_id'];
    $_SESSION['nivel_id'] = $dados['nivel_id'];

    if($_SESSION['ativo']==1){
        header('Location: ../view/painel.html');
        exit;
    }
    else{
        header('Location: ../view/index.html');
    }
    
}
else{
    header('Location: ../view/index.html');
}
?>