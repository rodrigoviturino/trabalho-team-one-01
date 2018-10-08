<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/list-users-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Lista de usuario</title>
</head>
<body>



<!-- Filtrar Usuario -->
<form action="index.php" method="post">
    <div class="row py-2">
            <div class="col-4">
                <h4 class="pl-2">Usuários Cadastrados</h4>
            </div>

            <div class="col-4 input-group mb-3">
                <div class="input-group">
                    <input type="text" name="inserir-usuario" class="form-control" placeholder="Filtrar usuário" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                    <input type="submit" class="input-group-text" name="botao_filtrar" value="Filtrar usuário"  id="basic-addon2">
                    </div>
                </div>
            </div>

            <div class="col-4">
                <a href="#" class="btn btn-primary">Novo Item</a>
            </div>
    </div>
</form>

<?php
        $servidor = "teamone_db_1";
        $usuario = "root";
        $senha = "phprs";
        $table = "usuarios";

        $conn = new mysqli($servidor, $usuario, $senha, $table);

        if($conn->connect_error){
            die('Falaha na conexao: " . $conn->connect_error');
        }

        // Comandos SQL 

        $sql = "SELECT * FROM usuarios";
        $resultado = $conn->query($sql);
        
?>

<!-- Tabela de usuario cadastro -->

<?php 

    if($resultado->num_rows > 0){
?>

<table class="table">

    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Completo</th>
            <th scope="col">Login</th>
            <th scope="col">Senha</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
<?php
    while ($row = $resultado->fetch_assoc()){
        echo"<tr>";
            echo"<td>". $row["id"]."</td>";
            echo"<td>". $row["nome_completo"]."</td>";
            echo"<td>". $row["nome_acesso"]."</td>";
            echo"<td>". $row["senha"]."</td>";
            echo "<td>";
        if($row["status"]==0){
            echo "Inativo";
        } else{
            echo "Ativo";
        }
?>
        <td></td>
            <td style="width: 60px;">
                <a href="" class="btn btn-success">Atualizar</a>
            </td>
            <td style="width: 60px;">
                <a href="" class="btn btn-info">Editar</a>
            </td>
            <td style="width:60px;">
                <a class="btn btn-danger" href="index.php?id="<?php $row["id"]?>>Excluir</a>
            </td>
<?php
    echo "</td>";
}
?>

    </tbody>
    </table>

    
<!-- Scripts -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php
    }
    $conn->close();
?>

</body>
</html>