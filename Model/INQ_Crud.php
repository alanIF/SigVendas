<?php

function cadastrarInquilino( $nome, $senha, $email,$tipo) {
    $conn = F_conect();
    $sql = "INSERT INTO usuario( nome, email, senha,tipo)
                VALUES('". $nome . "','" . $email . "','" . $senha . "','".$tipo."')";

    if ($conn->query($sql) == TRUE) {
        //LOG__________
        include '../Model/LOGS.php';
        if (NovoLog("Usuário " . $nome . " cadastrado", $_SESSION['idUSU'])) {

            Alert("Oba!", "Usuário cadastrado com sucesso", "success");
            echo "<a href='../view/INQ_listar.php'> Listar Usuário</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function listarIquilino() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from usuario ");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['nome'] . "</td>";
            echo"<td>" . $row['email'] . "</td>";
            echo"<td>" . $row['senha'] . "</td>";
            if($row['tipo']==1){
                echo"<td> Administrador</td>";

            }else{
                echo"<td> Funcionário</td>";

            }
            echo"<td><a href=INQ_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=INQ_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}

function editarInquilino($id, $nome, $senha, $email,$tipo) {
    $conn = F_conect();
    $sql = " UPDATE usuario SET    nome='" . $nome . "' , senha='" .
            $senha. "', email='" . $email . "',tipo='".$tipo."' WHERE id=' " . $id."'";

    if ($conn->query($sql) === TRUE) {
        include '../Model/LOGS.php';
        if (NovoLog("Usuário " . $nome . " editado", $_SESSION['idUSU'])) {

            Alert("Oba!", "Usuário atualizado com sucesso", "success");
            echo "<a href='../view/INQ_listar.php'> Listar Usuários</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirInquilino($id) {

    $conn = F_conect();
    $sql = "DELETE FROM usuario WHERE id=" . $id ;

    if ($conn->query($sql)) {
        include '../Model/LOGS.php';
        if (NovoLog("Usuário com ID " . $id . " excluido", $_SESSION['idUSU'])) {
            
        }
    }

    $conn->close();
    	echo "<script language='javascript' type='text/javascript'>"
        . "alert('Usuario excluído com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'javascript:window.history.go(-1);';
</script>";
}
