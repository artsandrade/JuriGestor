<?php
include_once("../conexao.php");
    
        $id = $_GET{'id'};

        $sql = "DELETE FROM cliente WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);       
        
if($result){
    header('Location: ../../view/clientesConsultar.php?sucesso');
}
else{
    header('Location: ../../view/clientesConsultar.php?erro');
}
        

?>