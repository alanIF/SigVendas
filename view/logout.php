<?php
session_start();

        require_once '../Model/connect.php';      
        require_once '../Controller/UsuarioController.php';
        $objControl = new UsuarioController();
        $objControl->logOut();