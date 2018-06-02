<?php
 
class EntradaController{
    
  
    public function Cadastrar($produto, $qtd, $data_entrada,$data_fabricacao,$data_validade,$obs){
        require ('../Model/ENT_Crud.php');
        cadastrarEntrada($produto, $qtd, $data_entrada,$data_fabricacao,$data_validade,$obs);
    }
    public function listar(){
        require ('../Model/ENT_Crud.php');
        listarEntrada();
        
    }
    public function excluir($id){
        require ('../Model/ENT_Crud.php');
        excluirEntrada($id);
        
        
    }
    public function atualizar($produto, $qtd, $data_entrada,$data_fabricacao,$data_validade,$obs,$id){
        require ('../Model/ENT_Crud.php');
        atualizarEntrada($produto, $qtd, $data_entrada,$data_fabricacao,$data_validade,$obs,$id);
    }
  
}

