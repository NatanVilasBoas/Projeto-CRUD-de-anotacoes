<?php
    include_once('conexao.php');

    //Recupera valor ID passado pelo editar do index
    $id = $_GET['id'];

    //Seleciona no BD a informação de acordo com o ID passado
    $sql= "SELECT * FROM anotacoes WHERE idAnotacoes = $id";
    //Faz a consulta
    $res = mysqli_query($con, $sql);

    //Transforma o resultado da consulta em um array com as informações da anotação
    $row = mysqli_fetch_assoc($res);

    if(isset($_POST['salvar'])){
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];

    $sqlUpdate = "UPDATE anotacoes SET titulo = '$titulo' , descricao = '$descricao' WHERE idAnotacoes = $id";
    
    $resUpdate = mysqli_query($con, $sqlUpdate);

    if($resUpdate){
        header("location: index.php");
    }else{
        echo "algo deu errado";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<a href="index.php">Voltar</a>
    <form action="editar.php?id=<?php echo $id?>" method="POST">
        <label for="titulo">Título da anotação:</label> 
        <br>
        <input name="titulo" type="text" value="<?php echo $row['titulo'];?>">
        <br>
        <br>
        <textarea name="descricao" rows="10" cols="30"><?php echo $row['descricao'];?></textarea>
        <br>
        <div name="data">
            <?php $dat = date('Y/m/d');
                echo $dat;
            ?>
        </div>
        <br>
        <input type="submit" value="Salvar anotação" name="salvar">
    </form>
</body>
</html>