<?php
 
class UsuarioController{
    
    public function Login($email, $senha){
       require ('./Model/USU_Crud.php');
        //Alguns filtros  e tals.. 
       logar($email, $senha);
    }
    
    public function Cadastrar($nome,$email,$senha){
        require ('../Model/USU_Crud.php');
        cadastrar($nome, $email, $senha);
    }
    public function verificarLogin(){
        require ('../Model/USU_Crud.php');
        testLogado();
        
    }
    public function logOut() {
         require ('../Model/USU_Crud.php');
         sair();
    }
    public function atualizar($nome, $email, $senha) {
        editarUsu($nome, $email, $senha, $_SESSION['idUSU']);
    }
}

