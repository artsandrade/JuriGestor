<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "jurigestor";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$nome = $_POST['inputNome'];
$senha = $_POST['inputSenha'];
$estadoCivil =  $_POST['inputEstadoCivil'];
$cpf = $_POST['inputCpf'];
$rg = $_POST['inputRg'];
$emissor = $_POST['inputEmissor'];
$emissao = $_POST['inputEmissao'];
$profissao = $_POST['inputProfissao'];
$ctps = $_POST['inputCtps'];
$pai = $_POST['inputNomePai'];
$mae = $_POST['inputNomeMae'];
$cep = $_POST['inputCep'];
$end = $_POST['inputEndereco'];
$num = $_POST['inputNumero'];
$complemento = $_POST['inputComplemento'];
$tel = $_POST['inputTelefone'];
$recado = $_POST['inputRecado'];
$email = $_POST['inputEmail'];
$advogado = $_POST['inputAdvogados'];
$obs = $_POST['inputObservacao'];



$sql = "INSERT INTO cliente (nome, senha, estado_civil, documento, rg, orgao_emissor, dt_emissao, profissao, ctps, filiacao1, filiacao2, cep, endereco, num,  complemento, telefone, recado, email, advogado1, advogado2, observarcao, escritorio_id) VALUES ('$nome', '$senha', '$estadoCivil', '$cpf', '$rg', '$emissor' , '$emissao', '$profissao', '$ctps', '$pai', '$mae', '$cep', '$end', '$num','$complemento', '$tel',  '$recado', '$email', '$advogado[0]', '$advogado[1]', '$obs', '1')";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

if($query){
    header('Location: ../../view/clientesCadastrar.php?sucesso');
}
else{
    header('Location: ../view/clientesCadastrar.php?erro');
}



?>