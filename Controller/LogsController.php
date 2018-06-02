<?php
 
class LogsController{
    
  
  
    public function listar(){
        require ('../Model/LOG_Crud.php');
        listar();
        
    }
    
  
}

