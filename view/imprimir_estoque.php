<?php
/* Carrega a classe DOMPdf */
require_once("../plugins/dompdf1/dompdf_config.inc.php");
require_once '../Model/connect.php';            
require_once '../Controller/UsuarioController.php';
        $objControl = new UsuarioController();

        $objControl->verificarlogin();

require_once '../Controller/EstoqueController.php';
$objControl = new EstoqueController();

 

 //function LogOut(isset()){}

 
/* Cria a instância */
$dompdf = new DOMPDF();
$lista = $objControl->gerarEstoque();

 

/* Carrega seu HTML */
$dompdf->load_html($lista);

/* Renderiza */
$dompdf->render();
/* Exibe */
$dompdf->stream(
    "saida.pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
    )
);
?>


