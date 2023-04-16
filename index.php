<?php
    include_once('conexao.php');
    include_once('consultaAnot.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anotações</title>
</head>
<body>
    <header>
        <div>
            <h1>Início</h1>
            <h2>Lista de Anotações</h2>
        </div>
    </header>
    <main>
        <a href="anotacao.php"><button>Nova anotação</button></a>
        <br>
        <br>
        <br>
        <table border="2">
            <!--criação de tabela através de consulta ao BD-->
            <?php
                while($consAnotacoes = mysqli_fetch_assoc($resTA)){
                    //Extrai todas as informações da tabela do BD
                    //extract($consAnotacoes);
            ?>
            <!--linha de tabela-->
            <form action="editar.php?id=<?php echo $consAnotacoes['idAnotacoes']?>" method="POST">
                    <tr>
                        <th id="id"><?php echo $consAnotacoes['idAnotacoes'];?></th>  
                        <!--titulo de tabela em uma coluna-->
                        <th><?php echo $consAnotacoes['titulo'];?></th> 
                        <!--campo de tabela na mesma linha-->
                        <td><?php echo $consAnotacoes['descricao'];?></td>
                        <!--Botão para editar anotação-->
                        <td><?php echo "<input type='submit' value='Editar' name='editAnot'>"?></td>
                    </tr>
            </form>
                <?php
                }
                ?>
        </table>
    </main>
</body>
</html>