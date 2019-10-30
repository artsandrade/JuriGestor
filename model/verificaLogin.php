<?php
include_once("conexao.php");

if(empty($_POST['user']) || empty($_POST['pass'])){
    header('Location: ../view/index.html');
    exit();
}

$user = mysqli_real_escape_string($conn, $_POST['user']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

$query = "select login, senha from usuario where login= '{$user}' and senha= md5('{$pass}')";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);

if($row==1){
    $_SESSION['user'] = $user;
    header('Location: ../view/painel.html');
    exit;
}
else{
    header('Location: ../view/index.html');
}

?>
