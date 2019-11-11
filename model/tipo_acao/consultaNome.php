
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


// Recebe o valor enviado
$valor = $_GET['valor'];


// Procura titulos no banco relacionados ao valor
$sql ="SELECT * FROM tipo_acao WHERE nome LIKE '%".$valor."%'";
$consulta = mysqli_query($conn,$sql); 
// Exibe todos os valores encontrados
echo "
<table class='table table-hover  mt-5 rounded'>
    <thead>
    <th scope='col' class='bg-dark text-light'>Nome</th>
    <th width='30' scope='col' class='bg-dark text-light'></th>
    <th width='30' scope='col' class='bg-dark text-light'></th>
</tr>
</thead>
<tbody>
";
while ($noticias = mysqli_fetch_assoc($consulta)) {
	
	$id = $noticias['id'];
	$nome = $noticias['nome'];
    
	echo  "       
    <tbody>
    <tr>
     <td>$nome</td>   
    </tr>

    ";
}
    
echo "
</tbody>
</table>
";
// Acentuação
header("Content-Type: text/html; charset=ISO-8859-1",true);

?>