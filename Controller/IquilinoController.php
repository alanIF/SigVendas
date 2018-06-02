<?php
 
class IquilinoController{
    
  
    public function Cadastrar($nome,$email,$senha,$tipo){
        require ('../Model/INQ_Crud.php');
        cadastrarInquilino($nome, $senha, $email,$tipo);
    }
    public function listar(){
        require ('../Model/INQ_Crud.php');
        listarIquilino();
        
    }
    public function excluir($id){
        require ('../Model/INQ_Crud.php');
        excluirInquilino($id);
        
        
    }
    public function atualizar($nome, $email, $senha,$tipo ,$id){
        require ('../Model/INQ_Crud.php');
        editarInquilino($id, $nome, $senha, $email,$tipo);
    }
}

