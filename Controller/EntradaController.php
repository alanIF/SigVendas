<?php
 
class EntradaController{
    

    public function Cadastrar($produto, $qtd, $data_entrada,$data_validade,$obs,$porcentagem,$preco){
        require ('../Model/ENT_Crud.php');
        cadastrarEntrada($produto, $qtd, $data_entrada,$data_validade,$obs,$porcentagem,$preco);
    }
    public function listar(){
        require ('../Model/ENT_Crud.php');
        listarEntrada();
        
    }
    public function excluir($id){
        require ('../Model/ENT_Crud.php');
        excluirEntrada($id);
        
        
    }
    public function atualizar($produto, $qtd, $data_entrada,$porcentagem,$data_validade,$obs,$preco,$id){
        require ('../Model/ENT_Crud.php');
        atualizarEntrada($produto, $qtd, $data_entrada,$porcentagem,$data_validade,$obs,$preco,$id);
    }
  
}

