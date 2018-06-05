<?php

function cadastrarEntrada($produto, $qtd, $data_entrada,$data_validade,$obs,$porcentagem,$preco){
    $conn = F_conect();
    
    $sql = "INSERT INTO entrada(id_produto, id_usuario,qtd,data_entrada,data_validade,observacao,porcentagem,preco_compra_unitario)
                VALUES('". $produto . "','" . $_SESSION['idUSU'] . "','" . $qtd . "','".$data_entrada."','".$data_validade."','".$obs."','".$porcentagem."','".$preco."')";

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
            $result_preco=mysqli_query($conn, "Select * from  preco_produto_entrada where id_produto=".$produto);
           // se nao tiver nenhuma entrada, cadastro
            //senao atualizo o preco do produto
            if (!mysqli_num_rows($result_preco)){
                $valor_venda=$preco*(1+($porcentagem/100));
                $sql= "insert into preco_produto_entrada(id_produto,valor_de_venda) values('".$produto."','".$valor_venda."')";
                if ($conn->query($sql) == TRUE){
                    Alert("Oba!", "Entrada  cadastrada com sucesso", "success");
                    echo "<a href='../view/ENT_listar.php'> Listar Entrada</a>";
                }
            }else{
                $valor_venda=$preco*(1+($porcentagem/100));
                 $sql = " UPDATE preco_produto_entrada SET    valor_de_venda='" . $valor_venda . "' WHERE id_produto=' " . $produto."'";

                    if ($conn->query($sql) === TRUE) {
                          Alert("Oba!", "Entrada  cadastrada com sucesso", "success");
                    echo "<a href='../view/ENT_listar.php'> Listar Entrada</a>";
                    }
            }
            }
            
        }else{
            Alert("ERROR!", "Comportament Inesperado", "danger");
        }
   

    $conn->close();
}

function listarEntrada() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select e.id id,p.descricao produto,e.data_entrada data_entrada,e.data_validade data_validade,e.qtd qtd ,e.observacao obs , e.preco_compra_unitario preco, e.porcentagem porcentagem from entrada e,produto p where e.id_produto=p.id");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['produto'] . "</td><td>" . $row['data_entrada'] . "</td>";
            echo"<td>" . $row['data_validade'] . "</td>";
                        echo"<td>" . $row['qtd'] . "</td>";

                        echo"<td>" . $row['preco'] . "</td>";
                        echo"<td>" . $row['porcentagem'] . "</td>";

            echo "<td>".$row['obs']."</td>";
            echo"<td><a href=ENT_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=ENT_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}

function atualizarEntrada($produto, $qtd, $data_entrada,$porcentagem,$data_validade,$obs,$preco,$id) {
    $conn = F_conect();
    $sql = " UPDATE entrada SET    id_produto='" . $produto . "' , data_entrada='" .
            $data_entrada. "',data_validade='".$data_validade."',qtd='".$qtd."',observacao='".$obs."' , porcentagem='".$porcentagem."', preco_compra_unitario='".$preco."' WHERE id=' " . $id."'";

    if ($conn->query($sql) === TRUE) {
             $result = mysqli_query($conn, "Select * from produto where id=".$produto);

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
           $nome= $row['descricao'] ;
         
    }
    
        }
        include '../Model/LOGS.php';
       if (NovoLog("Entrada do produto:" . $nome . ", quantidade:".$qtd." e data entrada:".$data_entrada." atualizada", $_SESSION['idUSU'])) {
            $valor_venda=$preco*(1+($porcentagem/100));
            $sql1 = " UPDATE preco_produto_entrada SET    valor_de_venda='" . $valor_venda . "' WHERE id_produto=' " . $produto."'";
                if ($conn->query($sql1) === TRUE) {
                              
            Alert("Oba!", "Entrada atualizada!", "success");
            echo "<a href='../view/ENT_listar.php'> Listar Entradas</a>";
                }
    

                    
          
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
