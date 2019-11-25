<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);
    $iduser = mysqli_real_escape_string($conn, $_SESSION['id_user']);

    $query = "SELECT * FROM cliente WHERE escritorio_id = '$id' ORDER BY nome";
    $result = mysqli_query($conn, $query);

?>