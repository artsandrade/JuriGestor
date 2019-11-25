
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
$sql ="SELECT * FROM cliente WHERE nome LIKE '%".$valor."%'";
$consulta = mysqli_query($conn,$sql); 
// Exibe todos os valores encontrados
echo "
<table class='table table-hover  mt-5 rounded'>
    <thead>
    <th scope='col' class='bg-dark text-light'>Nome</th>
    <th scope='col' class='bg-dark text-light'>Documento</th>
    <th width='30' scope='col' class='bg-dark text-light'></th>
</tr>
</thead>
<tbody>
";
while ($dados = mysqli_fetch_assoc($consulta)) {
    
    $id = $dados['id'];
    $nome = $dados['nome'];
    $documento = $dados['documento'];;

        echo  "       
        <tbody>
        <tr>
            <td>$nome</td>
            <td>$documento</td>
            <td><button type='button' class='btn btn-primary' name='idCliente' value='{$id}' data-dismiss='modal' title='Selecionar cliente'><i class='fas fa-check'></i></td>
        </tr>
        ";
}    
echo "
</tbody>
</table>
";

?>