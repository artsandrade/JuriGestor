<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "jurigestor";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$nome = $_POST['inputNome'];
$inputTelefone = $_POST['inputTelefone'];
$inputEmail = $_POST['inputEmail'];
$inputOAB = $_POST['inputOAB'];



$sql = "INSERT INTO advogado_contraria (nome, oab, telefone, email) VALUES ('$nome', '$inputOAB','$inputTelefone','$inputEmail')";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

if($query){
    header('Location: ../../view/processosCadastrar.php?sucesso');
}
else{
    header('Location: ../view/processosCadastrar.php?erro');
}



?>