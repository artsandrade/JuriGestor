<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "jurigestor";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$inputFiltro = $_POST['inputFiltro'];
$inputCampoDigitado = $_POST['inputCampoDigitado'];


$sql = "SELECT * from processo WHERE num_processo LIKE '%" .$inputFiltro."%' ";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

while ($dados = mysqli_fetch_assoc($query)) {

	echo  $dados['num_processo'];
}
 



?>