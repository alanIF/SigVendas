<?php
 
class EstoqueController{
    
  
  
    public function listar(){
        require ('../Model/EST_Crud.php');
        listar();
        
    }
    
    public function gerarEstoque(){
        require ('../Model/EST_Crud.php');
        return listarEstoque();
        
    }
}

