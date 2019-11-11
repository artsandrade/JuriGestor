<?php
 $servidor = "localhost";
 $usuario = "root";
 $senha = "";
 $dbname = "jurigestor";
 
 //Criar a conexao
 $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
 
 if(!$conn){
     die("Falha na conexao" . mysqli_connect_error());
 }
 
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 }


if(isset($_POST['btn-pesquisa-cliente'])){
    
    $id = mysqli_real_escape_string($conn, $_SESSION['id_user']);
    $nome = mysqli_real_escape_string($conn, $_POST['nomeCliente']);

    $query = "SELECT a.id, a.nome, a.documento FROM cliente a INNER JOIN advogado b ON a.id = b.cliente_id WHERE a.nome LIKE '%{$nome}%' AND b.usuario_id = '{$id}'";
    $result = mysqli_query($conn, $query);
}
?>