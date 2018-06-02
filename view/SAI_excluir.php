<?php
           
        //CONECTAR          
        require_once '../Model/connect.php';            
        require_once '../Controller/UsuarioController.php';
        $objControl = new UsuarioController();

        $objControl->verificarlogin();

    if (isset( $_GET['id'])) {
        require_once '../Controller/SaidaController.php';

         $id=(int)$_GET['id'];
         $objControl = new SaidaController();
        $objControl->excluir($id);
    }else{
        
        header("Location:SAI_listar.php");
        
    }

?>