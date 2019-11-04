<?php
    //Fara a verificacao se tem um usuario autenticado e entao permitir o acesso ao painel administrativo

    session_start();
    if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])){
        header('Location: ../index.php');
    }
    else{
        header('Location: ../view/painel.php');
    }
?>