<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "jurigestor";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$inputNomeFantasia = $_POST['inputNomeFantasia'];
$inputCnpj = $_POST['inputCnpj'];
$inputInscricaoEstadual = $_POST['inputInscricaoEstadual'];
$inputEndereco2 = $_POST['inputEndereco2'];
$inputNumero2 = $_POST['inputNumero2'];
$inputBairro = $_POST['inputBairro'];
$inputEstado = $_POST['inputEstado'];
$inputCidade = $_POST['inputCidade'];
$inputTelefone2 = $_POST['inputTelefone2'];
$inputCelular2 = $_POST['inputCelular2'];
$inputRecado2 = $_POST['inputRecado2'];
$inputEmail2 = $_POST['inputEmail2'];
$advogado = $_POST['inputAdvogados2'];


$sql = "INSERT INTO cliente (nome_fantasia, status, cnpj, ie, endereco, num, bairro,  estado, cidade, telefone, celular, recado, email, advogado1, advogado2, escritorio_id)

VALUES ('$inputNomeFantasia', '0', '$inputCnpj','$inputInscricaoEstadual', '$inputEndereco2', '$inputNumero2', '$inputBairro' , '$inputEstado', '$inputCidade',
 '$inputTelefone2', '$inputCelular2', '$inputRecado2', '$inputEmail2',  '$advogado[0]', '$advogado[1]', '1')";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

if($query){
    header('Location: ../../view/clientesCadastrar.php?sucesso');
}
else{
    header('Location: ../view/clientesCadastrar.php?erro');
}



// RESPONSAVEL(VERIFICAR COMO FUNCIONA RESPONSAVEL)
// $nome = $_POST['inputNome'];
// $estadoCivil =  $_POST['inputEstadoCivil'];
// $cpf = $_POST['inputCpf'];
// $rg = $_POST['inputRg'];
// $emissor = $_POST['inputEmissor'];
// $emissao = $_POST['inputEmissao'];
// $profissao = $_POST['inputProfissao'];
// $ctps = $_POST['inputCtps'];
// $pai = $_POST['inputNomePai'];
// $mae = $_POST['inputNomeMae'];
// $cep = $_POST['inputCep'];
// $end = $_POST['inputEndereco'];
// $num = $_POST['inputNumero'];
// $complemento = $_POST['inputComplemento'];
// $tel = $_POST['inputTelefone'];
// $recado = $_POST['inputRecado'];
// $email = $_POST['inputEmail'];
// $advogado = $_POST['inputAdvogados'];
// $obs = $_POST['inputObservacao'];
// $celular = $_POST['inputCelular'];

// $sql = "INSERT INTO cliente (nome, status, estado_civil, documento, rg, orgao_emissor, dt_emissao, profissao, ctps, filiacao1, filiacao2, cep, endereco, num,  complemento, telefone, recado, email, advogado1, advogado2, observarcao, escritorio_id, celular) VALUES ('$nome', '1', '$estadoCivil', '$cpf', '$rg', '$emissor' , '$emissao', '$profissao', '$ctps', '$pai', '$mae', '$cep', '$end', '$num','$complemento', '$tel',  '$recado', '$email', '$advogado[0]', '$advogado[1]', '$obs', '1', '$celular')";
// $query = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

// if($query){
//     header('Location: ../../view/clientesCadastrar.php?sucesso');
// }
// else{
//     header('Location: ../view/clientesCadastrar.php?erro');
// }

?>