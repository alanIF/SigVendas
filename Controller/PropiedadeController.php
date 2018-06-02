<?php
  require ('../Model/PROP_Crud.php');
class PropiedadeController{
    
  
    public function Cadastrar($descricao,$estoque_minimo,$tipo){
        cadastrarPropiedade($descricao,$estoque_minimo,$tipo);
    }
public function listar(){
        listarPropiedade();
    }
    public function excluir($id){
        excluirPropiedade($id);
        
        
    }
    public function atualizar($id, $descricao,$estoque_minimo,$tipo){
        editarPropieade($id, $descricao,$estoque_minimo,$tipo);
    }
}

