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
    0 => 'nome',
    1 => 'telefone',
    2 => 'celular',
    3 => 'email',
    4 => 'botao'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_pg = "SELECT COUNT(id) AS num_result FROM cliente";
$resultado_pg = mysqli_query($conn, $result_pg);
$qnt_linhas = mysqli_fetch_assoc($resultado_pg);

$result_clientes = "SELECT nome, telefone, celular, email, id    FROM cliente WHERE escritorio_id = '$id'";

if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
    $result_clientes .= " AND (id LIKE '%" . $requestData['search']['value'] . "%' ";
    $result_clientes .= " OR nome LIKE '%" . $requestData['search']['value'] . "%' ";
    $result_clientes .= " OR email LIKE '%" . $requestData['search']['value'] . "%' ";
    $result_clientes .= " OR celular LIKE '%" . $requestData['search']['value'] . "%' ";
    $result_clientes .= " OR telefone LIKE '%" . $requestData['search']['value'] . "%' )";
}

$resultado_clientes = mysqli_query($conn, $result_clientes);
$totalFiltered = mysqli_num_rows($resultado_clientes);
//Ordenar o resultado
$result_clientes .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
$resultado_clientes = mysqli_query($conn, $result_clientes);

$btn_alterar = "<button type='button' class='btn btn-primary ml-3' data-toggle='modal' data-target='#modalAtendimentoNao'><i class='fas fa-pencil-alt'></i>";
$btn_excluir = "<button type='button' class='btn btn-danger ml-3' data-toggle='modal' data-target='#modalAtendimentoNao'><i class='fas fa-trash-alt'></i>";
$btn_visualizar="<button type='button' class='btn btn-secondary ml-3' data-toggle='modal' data-target='#modalAtendimentoNao'><i class='fas fa-search'></i>";
// Ler e criar o array de dados
$dados = array();
while ($row_clientes = mysqli_fetch_array($resultado_clientes)) {
    $dado = array();
    $dado[] = $row_clientes["nome"];
    $dado[] = $row_clientes["telefone"];
    $dado[] = $row_clientes["celular"];
    $dado[] = $row_clientes["email"];
    $btn_excluir = "<button type='button' class='btn btn-danger ml-3' data-toggle='modal' data-target='#modalExcluirCliente".$row_clientes["id"]."'><i class='fas fa-trash-alt'></i>";
    $dado[] = $btn_excluir;
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
