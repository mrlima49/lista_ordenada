<?php
require_once "./dbconfig.php";
if(isset($_POST['ordem'])){
    $ordem = $_POST['ordem'];
    if($ordem == 'nome'){
        $sql = "SELECT * FROM usuarios ORDER BY nome";
    }else{
        $sql = "SELECT * FROM usuarios ORDER BY idade";
    }
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $ordem);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $dados = $stmt->fetchAll();
    }else{
        echo "falhou";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de usuários</title>
    <style>
        table{
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Ordenar por:</h2>
    <form action="" method="post">
       <p><input type="radio" name="ordem"  value="nome">Nome</p>
       <p><input type="radio" name="ordem" value="idade">Idade</p>
       <p><button name="btn">Enviar</button></p>
    </form>
    <hr>
    <h2>usuários</h2>
    <table border="1" width="500">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($dados)):
                    foreach($dados as $dado):
            ?>
            <tr>
                <td><?= $dado['nome']?></td>
                <td><?= $dado['idade']?></td>
            </tr>
            <?php
                endforeach;
            endif;
            ?>  
        </tbody>
    </table>
</body>
</html>