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

$result_clientes = "SELECT * FROM processo WHERE processo.escritorio_id = $id";

if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
    $result_clientes .= " AND id LIKE '%" . $requestData['search']['value'] . "%' ";
    $result_clientes .= " OR nome_acao LIKE '%" . $requestData['search']['value'] . "%' ";
    $result_clientes .= " OR num_processo LIKE '%" . $requestData['search']['value'] . "%' ";
}

$resultado_clientes = mysqli_query($conn, $result_clientes);
$totalFiltered = mysqli_num_rows($resultado_clientes);
//Ordenar o resultado
$result_clientes .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
$resultado_clientes = mysqli_query($conn, $result_clientes);

// Ler e criar o array de dados
$dados = array();
while ($row_clientes = mysqli_fetch_array($resultado_clientes)) {
    $dado = array();
    $dado[] = $row_clientes["nome_acao"];
    $dado[] = $row_clientes["num_processo"];
    $dado[] = $row_clientes["situacao"];
    $dado[] = $row_clientes["polo"];
    $btn_alterar = "<button type='button' class='btn btn-primary ml-3' data-toggle='modal' data-target='#modalVisualizar".$row_clientes["id"]."'><i class='fas fa-pencil-alt'></i>";
    $btn_excluir = "<button type='button' class='btn btn-danger ml-3' data-toggle='modal' data-target='#modalExcluir".$row_clientes["id"]."'><i class='fas fa-trash-alt'></i>";
    $dado[] = $btn_alterar . $btn_excluir;
    $dados[] = $dado;
}

//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
    "draw" => intval($requestData['draw']), //para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($qnt_linhas), //Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($totalFiltered), //Total de registros quando houver pesquisa
    "data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json