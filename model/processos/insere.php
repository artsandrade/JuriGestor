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

$sql = "INSERT INTO processo (num_processo, nome_acao, valor, polo, tipo_processo, situacao, tipo_acao, org_judiciario , comarca, link, email, escritorio_id,observacao, parte_contraria) VALUES ('$inputNomeProcesso', '$inputNomeAcao', '$inputValorCausa', '$inputPolo', '$inputTipoProcesso', '$inputSituacao',
 '$inputTipoAcao', '$inputOrgaoJudiciario', '$inputComarca', '$inputLink','$email','1','$inputObservacao', '$inputParteContraria')";
//$query = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// if($query){
//     header('Location: ../../view/processosCadastrar.php?sucesso');
    
// }
// else{
//     header('Location: ../view/processosCadastrar.php?erro');
// }



?>