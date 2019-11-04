<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);

    $query = "SELECT * FROM tipo_acao WHERE escritorio_id = '$id' order by nome";
    $result = mysqli_query($conn, $query);

?>