<?php

function cadastrarPropiedade($descricao,$estoque_minimo,$tipo) {

    $conn = F_conect();


    $sql = "INSERT INTO produto (descricao,estoque_minimo,tipo)
                VALUES('" . $descricao . "','" . $estoque_minimo . "','" . $tipo ."' )";

    if ($conn->query($sql) == TRUE) {
        include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Produto " . $descricao . " com Estoque Minimo " . $estoque_minimo . " cadastrado.", $_SESSION['idUSU'])) {

            Alert("Oba!", "Produto cadastrado com sucesso", "success");
            echo "<a href='../view/PROP_listar.php'> Listar Produtos</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function editarPropieade($id, $descricao,$estoque_minimo,$tipo) {
    $conn = F_conect();
    $sql = " UPDATE produto SET  descricao='" . $descricao . "' , estoque_minimo='" .
            $estoque_minimo . "', tipo='" . $tipo . "' WHERE id= " . $id ;

    if ($conn->query($sql) === TRUE) {
        include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Produto  " . $descricao . " com Estoque Minimo " . $estoque_minimo . " atualizado", $_SESSION['idUSU'])) {
            Alert("Oba!", "Produto Atualizado", "success ");
            echo "<a href='../view/PROP_listar.php'> Listar Produtos</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirPropiedade($id) {

    $conn = F_conect();

    $sql = "DELETE FROM produto WHERE id=" . $id;

if($conn->query($sql)){
    include '../Model/LOGS.php';
    //LOG__________
    if (NovoLog("Produto com ID " . $id . " excluido", $_SESSION['idUSU'])){
        	echo "<script language='javascript' type='text/javascript'>"
        . "alert('Produto  excluído com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'javascript:window.history.go(-1);';
</script>";

    }
}
  $conn->close();
}

function listarPropiedade() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from produto");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['descricao'] . "</td>";
            echo"<td>" . $row['tipo'] . "</td>";
            echo"<td>" . $row['estoque_minimo'] . "</td>";
           

            echo"<td><a href=PROP_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=PROP_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}
