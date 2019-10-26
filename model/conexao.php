<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "jurigestor";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha);

if(!$conn){
	die("Falha na conexao" . mysqli_connect_error());
}else{
	echo "Conexao realizada com sucesso";
}