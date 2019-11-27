<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "jurigestor";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
// PRIMEIRA ETAPA DO FORMULARIO 
$inputNomeProcesso = $_POST['inputNomeProcesso'];
//$comboTipoAcao =  $_POST['comboTipoAcao'];
$inputNomeAcao = $_POST['inputNomeAcao'];
$inputValorCausa = $_POST['inputValorCausa'];
$inputPolo = $_POST['inputPolo'];
$inputTipoProcesso = $_POST['inputTipoProcesso'];
$inputSituacao = $_POST['inputSituacao'];
$inputTipoAcao = $_POST['inputTipoAcao'];
$inputOrgaoJudiciario = $_POST['inputOrgaoJudiciario'];
$inputComarca = $_POST['inputComarca'];
$inputLink = $_POST['inputLink'];
$email = $_POST['inputEmail'];
$inputObservacao = $_POST['inputObservacao'];
$inputParteContraria = $_POST['inputParteContraria'];
$inputClientes = $_POST['inputClientes'];
$inputAdvogados =  $_POST['inputAdvogados'];
$inputAdvParteContraria =  $_POST['inputAdvParteContraria'];

$i = 0;

$sql = "INSERT INTO processo (num_processo, nome_acao, valor, polo, tipo_processo, situacao, tipo_acao, org_judiciario , comarca, link, email, escritorio_id,observacao, parte_contraria) VALUES ('$inputNomeProcesso', '$inputNomeAcao', '$inputValorCausa', '$inputPolo', '$inputTipoProcesso', '$inputSituacao',
 '$inputTipoAcao', '$inputOrgaoJudiciario', '$inputComarca', '$inputLink','$email','1','$inputObservacao', '$inputParteContraria')";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 


   

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    $sqlPesquisa= "SELECT id FROM cliente WHERE nome = '$inputClientes'";    
    $query = mysqli_query($conn, $sqlPesquisa) or die(mysqli_error($conn)); 
    $idCliente = mysqli_fetch_assoc($query);
    $id = $idCliente['id'];

    
    $sqlCliente = "INSERT INTO cliente_processo (cliente_id, processo_id) VALUES ('$id', '$last_id')";    
    $query2 = mysqli_query($conn, $sqlCliente) or die(mysqli_error($conn)); 

    foreach ($inputAdvogados as &$i) {
        $sqlPesquisaAdvogado= "SELECT id FROM advogado WHERE nome = '$i'";    
        $query3 = mysqli_query($conn, $sqlPesquisaAdvogado) or die(mysqli_error($conn)); 
        $idAdvogado = mysqli_fetch_assoc($query3);
        $idAdvogado = $idAdvogado['id'];

        $sqlAdvogado = "INSERT INTO advogado_processo (usuario_id, processo_id) VALUES ('$idAdvogado', '$last_id')";    
        $query2 = mysqli_query($conn, $sqlAdvogado) or die(mysqli_error($conn)); 
    }

    
    foreach ($inputAdvParteContraria as &$j) {
        $sqlContraria= "SELECT id FROM advogado_contraria WHERE nome = '$j'";    
        $query4 = mysqli_query($conn, $sqlContraria) or die(mysqli_error($conn)); 
        $idContraia = mysqli_fetch_assoc($query4);
        $idParteContraria = $idContraia['id'];

        $sqlAdvogado = "INSERT INTO contraria_processo (contraria_id, processo_id) VALUES ('$idParteContraria', '$last_id')";    
        $query2 = mysqli_query($conn, $sqlAdvogado) or die(mysqli_error($conn)); 
    }

    header('Location: ../../view/processosCadastrar.php?sucesso');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





?>