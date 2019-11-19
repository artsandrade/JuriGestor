
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
while ($dados = mysqli_fetch_assoc($consulta)) {
    
    $altera = "altera.php";

	$id = $dados['id'];
    $nome = $dados['nome'];

    $query1 = "SELECT * FROM atendimento WHERE atendimento.tipoacao_id = '$id'";
    $result1 = mysqli_query($conn, $query1);

    $query2 = "SELECT * FROM processo WHERE processo.tipo_acao_id = '$id'";
    $result2 = mysqli_query($conn, $query2);
    if(mysqli_num_rows($result1) > 0 or mysqli_num_rows($result2) > 0){
        echo  "       
        <tbody>
        <tr>
            <td>$nome</td>
            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalAcaoAlterar{$dados['id']}' data-whatever='{$dados['nome']}'><i class='fas fa-pencil-alt'></i></td>
            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalAcaoNao{$dados['id']}'><i class='fas fa-trash-alt'></i></td>
            
            <div class='modal fade' id='modalAcaoAlterar{$dados['id']}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Alterar</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <form action='\"../model/tipo_acao/altera.php\"' method='POST'>
                            <div class='modal-body'>
                                <p>Faça as devidas alterações abaixo</p>
                                <input type='text' class='form-control' name='nomeAcao' required>
                            </div>
                            <div class='modal-footer'>
                                <input type='hidden' name='idAcao' value='{$dados['id']}'>
                                <button type='submit' name='btn-altera' class='btn btn-primary'>Alterar</button>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class='modal fade' id='modalAcaoNao{$dados['id']}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Impossível excluir</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                    <div class='modal-body'>
                        <p>Desculpe, mas o tipo da ação '{$dados['nome']}' está sendo utilizado em um atendimento ou processo.
                        Para que você possa excluir '{$dados['nome']}', é necessário primeiramente remover os cadastros que estão
                        vinculados!</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                    </div>
                    </div>
                </div>
            </div>
        </tr>
    
        ";
    }
	else{
        echo  "       
        <tbody>
        <tr>
            <td>$nome</td>
            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalAcaoAlterar{$dados['id']}' data-whatever='{$dados['nome']}'><i class='fas fa-pencil-alt'></i></td>
            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalAcao{$dados['id']}'><i class='fas fa-trash-alt'></i></td>
            
            <div class='modal fade' id='modalAcaoAlterar{$dados['id']}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Alterar</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <form action='\"../model/tipo_acao/altera.php\"' method='POST'>
                            <div class='modal-body'>
                                <p>Faça as devidas alterações abaixo</p>
                                <input type='text' class='form-control' name='nomeAcao' required>
                            </div>
                            <div class='modal-footer'>
                                <input type='hidden' name='idAcao' value='{$dados['id']}'>
                                <button type='submit' name='btn-altera' class='btn btn-primary'>Alterar</button>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </tr>
        ";

        echo "
                
        <div class='modal fade' id='modalAcao{$dados['id']}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Excluir</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p>Você tem certeza que deseja excluir '{$dados['nome']}'</p>
                    </div>
                    <div class='modal-footer'>
                        <form action='\"../model/tipo_acao/remove.php\"' method='POST'>
                            <input type='hidden' name='idAcao' value='{$dados['id']}'>
                            <button type='submit' name='btn-remove' class='btn btn-primary'>Excluir</button>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        ";
    }
}
    
echo "
</tbody>
</table>
";
// Acentuação

//header("Content-Type: text/html; charset=ISO-8859-1",true);
?>