<?php

include_once("conexao.php");

if(isset($_POST['efetuaLogout'])){
    session_start();
    session_unset($_SESSION);
    session_destroy();
    header('Location: ../view/index.html');
}
?>