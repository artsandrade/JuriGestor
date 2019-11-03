<?php

include_once("conexao.php");

if(isset($_POST['btn-cadastrar'])){
    session_start();
    session_unset($_SESSION);
    session_destroy();
    header('Location: ../view/index.html');
?>