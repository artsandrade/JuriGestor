<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $id = mysqli_real_escape_string($conn, $_SESSION['escritorio_id']);
    $iduser = mysqli_real_escape_string($conn, $_SESSION['id_user']);

    $query = "SELECT * FROM atendimento WHERE escritorio_id = '$id' AND usuario_id = '$iduser' ORDER BY dt";
    $result = mysqli_query($conn, $query);

?>