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
        <Input type="number" placeholder="Preço de Custo: " name="precoCusto">
        <Input type="number" placeholder="Preço de Venda: " name="precoVenda">
        <Input type="number" placeholder="Estoque: " name="estoque">
        <Input type="submit" value="Enviar" name="gravar">

    </form>
    <?php  
        include 'conn.php';
        if(isset($_POST['gravar'])){
            $nome = $_POST['nomeProduto'];
            $set = $_POST['id'];
            $custo = $_POST['precoCusto'];
            $venda = $_POST['precoVenda'];
            $estoque = $_POST['estoque'];
            $sit = 1;
            //echo $nome.'</br>'.$set.'</br>'.$custo.'</br>'.$venda.'</br>'.$estoque;
            $grava = $conn -> prepare('INSERT INTO `produtos` (`id_prod`, `nome_prod`, `setor_prod`, `custo_prod`, `venda_prod`, `estoque_prod`, `situacao_prod`) VALUES (NULL, :pnome, :pid, :pcusto, :pvenda, :pestoque, :psit);');
            $grava -> bindValue(':pnome',$nome);
            $grava -> bindValue(':pid',$set);
            $grava -> bindValue(':pcusto',$custo);
            $grava -> bindValue(':pvenda',$venda);
            $grava -> bindValue(':pestoque', $estoque);
            $grava -> bindValue(':psit', $sit);
            $grava -> execute();
        }

    ?>


</body>
</html>