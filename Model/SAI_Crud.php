<?php

function cadastrarSaida($produto, $qtd, $data_saida,$obs){
    $conn = F_conect();
    $sql = "INSERT INTO saida(id_produto, id_usuario,qtd,data_saida,observacao)
                VALUES('". $produto . "','" . $_SESSION['idUSU'] . "','" . $qtd . "','".$data_saida."','".$obs."')";

    if ($conn->query($sql) == TRUE) {
        //LOG__________
        include '../Model/LOGS.php';
          $result = mysqli_query($conn, "Select * from produto where id=".$produto);

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
           $nome= $row['descricao'] ;
         
    }
    }
       if (NovoLog("Saida do produto:" . $nome . ", quantidade:".$qtd." e data entrada:".$data_saida." cadastrada", $_SESSION['idUSU'])) {

            Alert("Oba!", "Saída  cadastrada com sucesso", "success");
            echo "<a href='../view/SAI_listar.php'> Listar Saída</a>";
        }else{
            Alert("ERROR!", "Comportamento Inesperado", "danger");
        }
    } else {
          Alert("Oba!", "Saída cadastrada com sucesso", "success");
           echo "<a href='../view/SAI_listar.php'> Listar Saída</a>";
    }

    $conn->close();
}

function listarSaida() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select s.id id,p.descricao produto,s.data_saida data_saida,u.nome usuario,s.qtd qtd,s.observacao obs from saida s,produto p,usuario u where s.id_produto=p.id and s.id_usuario=u.id");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['produto'] . "</td><td>" . $row['qtd'] . "</td>";
            echo"<td>" . $row['data_saida'] . "</td>";
            echo"<td>" . $row['usuario'] . "</td>";
            echo"<td>" . $row['obs'] . "</td>";

            echo"<td><a href=SAI_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=SAI_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}
function listarSaidaUSU($id_usuario) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select s.id id,p.descricao produto,s.data_saida data_saida,u.nome usuario,s.qtd qtd,s.observacao obs from saida s,produto p,usuario u where s.id_produto=p.id and s.id_usuario=u.id and u.id=".$id_usuario);

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['produto'] . "</td><td>" . $row['qtd'] . "</td>";
            echo"<td>" . $row['data_saida'] . "</td>";
            echo"<td>" . $row['usuario'] . "</td>";
            echo"<td>" . $row['obs'] . "</td>";

            echo"<td><a href=SAI_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=SAI_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}
function atualizarSaida($produto, $qtd, $data_saida,$obs,$id) {
    $conn = F_conect();
    $sql = " UPDATE saida SET    id_produto='" . $produto . "' , data_saida='" .
            $data_saida."',qtd='".$qtd."',observacao='".$obs."' WHERE id=' " . $id."'";

    if ($conn->query($sql) === TRUE) {
        include '../Model/LOGS.php';
             $result = mysqli_query($conn, "Select * from produto where id=".$produto);

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
           $nome= $row['descricao'] ;
         
    }
    }
       if (NovoLog("Saída do produto:" . $nome . ", quantidade:".$qtd." e data entrada:".$data_saida." atualizada", $_SESSION['idUSU'])) {

            Alert("Oba!", "Saida atualizada!", "success");
            echo "<a href='../view/SAI_listar.php'> Listar Saida</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirSaida($id) {

    $conn = F_conect();
    $sql = "DELETE FROM saida WHERE id=" . $id ;

    if ($conn->query($sql)) {
        include '../Model/LOGS.php';
        if (NovoLog("Saida com ID " . $id . " excluido", $_SESSION['idUSU'])) {
            
        }
    }

    $conn->close();
    	echo "<script language='javascript' type='text/javascript'>"
        . "alert('Saída excluída com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'javascript:window.history.go(-1);';
</script>";
}
