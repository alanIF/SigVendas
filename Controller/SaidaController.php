<?php
 
class SaidaController{
    
  
    public function Cadastrar($produto, $qtd, $data_saida,$obs){
        require ('../Model/SAI_Crud.php');
        cadastrarSaida($produto, $qtd, $data_saida,$obs);
    }
    public function listar(){
        require ('../Model/SAI_Crud.php');
        listarSaida();
        
    }
       public function listarUSU($id_usuario){
        require ('../Model/SAI_Crud.php');
        listarSaidaUSU($id_usuario);
        
    }
    public function excluir($id){
        require ('../Model/SAI_Crud.php');
        excluirSaida($id);
        
        
    }
    public function atualizar($produto, $qtd, $data_saida,$obs,$id){
        require ('../Model/SAI_Crud.php');
        atualizarSaida($produto, $qtd, $data_saida,$obs,$id);
    }
  
}

