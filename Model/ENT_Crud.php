<?php

function cadastrarEntrada($produto, $qtd, $data_entrada,$data_fabricacao,$data_validade,$obs){
    $conn = F_conect();
    $sql = "INSERT INTO entrada(id_produto, id_usuario,qtd,data_entrada,data_validade,data_fabricacao,observacao)
                VALUES('". $produto . "','" . $_SESSION['idUSU'] . "','" . $qtd . "','".$data_entrada."','".$data_validade."','".$data_fabricacao."','".$obs."')";

    if ($conn->query($sql) == TRUE) {
        //LOG__________
       include '../Model/LOGS.php';
        $result = mysqli_query($conn, "Select * from produto where id=".$produto);

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
           $nome= $row['descricao'] ;
         
    }
    
        }
       if (NovoLog("Entrada do produto:" . $nome . ", quantidade:".$qtd." e data entrada:".$data_entrada." cadastrada", $_SESSION['idUSU'])) {
          
            Alert("Oba!", "Entrada  cadastrada com sucesso", "success");
            echo "<a href='../view/ENT_listar.php'> Listar Entrada</a>";
        }else{
            Alert("ERROR!", "Comportament Inesperado", "danger");
        }
    } else {
          Alert("Oba!", "Entrada  cadastrada com sucesso", "success");
           echo "<a href='../view/ENT_listar.php'> Listar Entrada</a>";
    }

    $conn->close();
}

function listarEntrada() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select e.id id,p.descricao produto,e.data_entrada data_entrada,e.data_fabricacao data_fabricacao,e.data_validade data_validade,e.qtd qtd ,e.observacao obs from entrada e,produto p where e.id_produto=p.id");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['produto'] . "</td><td>" . $row['data_entrada'] . "</td>";
            echo"<td>" . $row['data_fabricacao'] . "</td>";
            echo"<td>" . $row['data_validade'] . "</td>";
            echo"<td>" . $row['qtd'] . "</td>";
            echo "<td>".$row['obs']."</td>";
            echo"<td><a href=ENT_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=ENT_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}

function atualizarEntrada($produto, $qtd, $data_entrada,$data_fabricacao,$data_validade,$obs,$id) {
    $conn = F_conect();
    $sql = " UPDATE entrada SET    id_produto='" . $produto . "' , data_entrada='" .
            $data_entrada. "', data_fabricacao='" . $data_fabricacao . "',data_validade='".$data_validade."',qtd='".$qtd."',observacao='".$obs."' WHERE id=' " . $id."'";

    if ($conn->query($sql) === TRUE) {
             $result = mysqli_query($conn, "Select * from produto where id=".$produto);

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
           $nome= $row['descricao'] ;
         
    }
    
        }
        include '../Model/LOGS.php';
       if (NovoLog("Entrada do produto:" . $nome . ", quantidade:".$qtd." e data entrada:".$data_entrada." atualizada", $_SESSION['idUSU'])) {

            Alert("Oba!", "Entrada atualizada!", "success");
            echo "<a href='../view/ENT_listar.php'> Listar Entradas</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirEntrada($id) {

    $conn = F_conect();
    $sql = "DELETE FROM entrada WHERE id=" . $id ;

    if ($conn->query($sql)) {
        include '../Model/LOGS.php';
        
        if (NovoLog("Entrada com ID " . $id . " excluido", $_SESSION['idUSU'])) {
            
        }
    }

    $conn->close();
    	echo "<script language='javascript' type='text/javascript'>"
        . "alert('Entrada excluída com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'javascript:window.history.go(-1);';
</script>";
}
