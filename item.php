<?php

include_once("./conexao.php");

$filtro = isset($_GET['veritem'])?$_GET['veritem']:"";

    $sqln = "SELECT * FROM produto where nome like '%$filtro%'";
    
    $resultado = mysqli_query($connect, $sqln);
    
    $registros = mysqli_num_rows($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/item.css">
    <title>Item</title>
</head>
<body>
    <div class="conteudo">
    
    <?php

    $produtos = "SELECT * FROM produto where id like '%$filtro%' order by id desc";

    $resultado = mysqli_query($connect, $produtos);

    while($exibirprodutos = mysqli_fetch_array($resultado)){
    ?>
        <div class="cardimg">
            <div class="img">
                <img src="./assets/<?php echo $exibirprodutos['imagem'] ?>" alt="Item da loja">
            </div>
            <div class="dados">
                <h3>Preço antigo <span class="anterior"><?php echo $exibirprodutos['preco_antigo'] ?></span></h3>
                <h3>Preço actual <span class="atual"><?php echo $exibirprodutos['preco_actual'] ?></span></h3>
            </div>
            <div class="voltar">
                <a href="./cards.php">Voltar</a>
            </div>
        </div>
        <div class="carddesc">
            <h2><?php echo $exibirprodutos['nome'] ?></h2>
            <div class="descricao">
                <p><?php echo $exibirprodutos['descricao'] ?></p>
            </div>
        </div>

        <?php
        } mysqli_close($connect);
    ?>

    </div>

    
</body>
</html>


<!--
<p>Para um hambúrguer saboroso os cortes mais indicados são a fraldinha, patinho, alcatra, acém ou coxão duro, mas outros tipos de carne também caíram no gosto do povo, como o contra-filé e a costela.</p>

<p>Os ingredientes mais populares no hambúrguer da galera são:</p>

<p>Alface, tomate, maionese, ketchup, bacon, cebola,e queijo.</p>

<p class="dica">Dica: <i>Amar é bom, mas um hambúrguer não vai me dar dor de cabeça.</i></p>

-->