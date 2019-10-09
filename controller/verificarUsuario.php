<?php
if(isset($_POST['email'])){ 

    $emailPostado = $_POST['email'];    
    
    require_once '../class/control_user.php';
    
    $userConsulta = new control_user();
    $result = $userConsulta->buscarUser($emailPostado);
        
    if(!empty($result)){
        echo json_encode(array('email' => 'Já existe um usuário cadastrado com este email')); 
    }else{ 
        echo json_encode(array('email' => 'Usuário valido.' )); 
    }
}
?>