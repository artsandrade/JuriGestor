<?php
include_once('../conexao.php');
$requestData = $_REQUEST;
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);
    $iduser = mysqli_real_escape_string($conn, $_SESSION['id_user']);
    $columns = array(
    0 => 'nome_acao',
    1 => 'num_processo',
    2 => 'situacao',
    3 => 'polo',
    4 => 'botao'
);
//Obtendo registros de número total sem qualquer pesquisa
$result_pg = "SELECT COUNT(id) AS num_result FROM processo";
$resultado_pg = mysqli_query($conn, $result_pg);
$qnt_linhas = mysqli_fetch_assoc($resultado_pg);

$result_processos = "SELECT * FROM processo WHERE escritorio_id = '$id'";
if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
    $result_processos .= " AND (id LIKE '%" . $requestData['search']['value'] . "%' ";
    $result_processos .= " OR nome_acao LIKE '%" . $requestData['search']['value'] . "%' ";
    $result_processos .= " OR num_processo LIKE '%" . $requestData['search']['value'] . "%' ";
    $result_processos .= " OR situacao LIKE '%" . $requestData['search']['value'] . "%' ";
    $result_processos .= " OR polo LIKE '%" . $requestData['search']['value'] . "%' )";
}
$resultado_processos = mysqli_query($conn, $result_processos);
$totalFiltered = mysqli_num_rows($resultado_processos);
//Ordenar o resultado
$result_processos .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
$resultado_processos = mysqli_query($conn, $result_processos);

// Ler e criar o array de dados
$dados = array();
while ($row_processos = mysqli_fetch_array($resultado_processos)) {
    $dado = array();
    $dado[] = $row_processos["nome_acao"];
    $dado[] = $row_processos["num_processo"];
    $dado[] = $row_processos["situacao"];
    $dado[] = $row_processos["polo"];
   
    $dado[] = 'botao';
    $dados[] = $dado;
}
//Cria o array de informações a serem retornadas para o Javascript
$json_data1 = array(
    "draw" => intval($requestData['draw']), //para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($qnt_linhas), //Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($totalFiltered), //Total de registros quando houver pesquisa
    "data" => $dados   //Array de dados completo dos dados retornados da tabela 
);
echo json_encode($json_data1);  //enviar dados como formato json