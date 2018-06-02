<?php
           
        //CONECTAR          
        require_once '../Model/connect.php';            
        require_once '../Controller/UsuarioController.php';
        $objControl = new UsuarioController();

        $objControl->verificarlogin();

    if (isset( $_GET['id'])) {
        require_once '../Controller/EntradaController.php';

         $id=(int)$_GET['id'];
         $objControl = new EntradaController();
        $objControl->excluir($id);
    }else{
        
        header("Location:INQ_listar.php");
        
    }

?>