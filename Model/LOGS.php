<?php
function NovoLog($acao, $id_usuario) {
    $conn = F_conect();
    date_default_timezone_set("America/Recife");
    $data = date('d/m/y h:i:s a');
        $sql = "INSERT INTO logs(id_usuario, data_i, acao)
                    VALUES('" . $id_usuario . "','" . $data . "','" . $acao . "' )";
       if($conn->query($sql)){
           return TRUE;
       }
    return FALSE;
}

