<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Atividade</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <form action="index.php" method="POST">
        <Input type="text" placeholder="Nome do produto: " name="nomeProduto">
        <?php
            include 'conn.php';
            $exibir = $conn -> prepare('SELECT * FROM `setores`');
            $exibir -> execute();  
            echo "<select name='id'";
            while($row=$exibir->fetch()){
                //echo "<a href='index.php?puxarSetor&id= ".$row['id_setor']."'><option>".$row['nome_set']."</option></a>";
                echo "<option value='".$row['id_setor']."'>".$row['nome_set']."</option>";
            }
            echo "</select>";
        ?>
        <Input type="text" placeholder="Preço de Custo: " name="precoCusto">
        <Input type="text" placeholder="Preço de Venda: " name="precoVenda">
        <Input type="number" placeholder="Estoque: " name="estoque">
        <Input type="submit" value="Enviar" name="gravar">

    </form>
    <?php  
        if(isset($_POST['id'])){
            $set =  $_POST['id'];
            
        }


    ?>


</body>
</html>