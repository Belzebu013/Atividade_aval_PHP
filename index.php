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
        <Input type="text" placeholder="Preço de Custo: " name="precoCusto">
        <Input type="text" placeholder="Preço de Venda: " name="precoVenda">
        <Input type="number" placeholder="Estoque: " name="estoque">
        
        <?php
            include 'conn.php';
            $exibir = $conn -> prepare('SELECT * FROM `setores`');
            $exibir -> execute();  
            echo "<select  onchange='location = this.value'>";
            while($row=$exibir->fetch()){
                //echo "<option><a href='index.php?puxarSetor&id= ".$row['id_setor']."'>".$row['nome_set']."</a></option>";
                echo "<option value='index.php?setor&id= ".$row['id_setor']."'>".$row['nome_set']."</option>";
            }
            echo "</select>";
        ?>
        <Input type="submit" value="Enviar" name="gravar">

    </form>
    <?php
        if(isset($_POST['gravar'])){
            $nome_prod=$_POST['nomeProduto'];
            $set = $_GET['id'];
            $preco_custo=$_POST['precoCusto'];
            $preco_venda=$_POST['precoVenda'];
            $estoque=intval($_POST['estoque']);
            $grava = $conn -> prepare('INSERT INTO `produtos` (`id_prod`, `nome_prod`, `id_setor`, `custo_prod`, `venda_prod`, `estoque_prod`, `situacao_prod`) VALUES (NULL, :pnome, :pset, :pcusto, :pvenda, :pestoque, 1);');
            $grava -> bindValue(':pnome', $nome_prod);
            $grava -> bindValue(':pset', $set);
            $grava -> bindValue(':pcusto', $preco_custo);
            $grava -> bindValue(':pvenda', $preco_venda);
            $grava -> bindValue(':pestoque', $estoque);
            $grava -> execute();
                    
        ?>


</body>
</html>