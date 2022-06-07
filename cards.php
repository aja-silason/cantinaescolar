<?php

include_once("./conexao.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/cards.css">
    <title>Ver Produtos</title>

</head>
<body>

<style>
    form{
        display: flex;
        flex-direction: column;
    }
    form input[type=search]{
        display: none;
    }
    form button{
        background-color: transparent;
        border: none;
    }
</style>

    <div class="conteudos">
        <a href="./index.php" class="voltar">Voltar</a>
        <h2>Produtos da Loja</h2>
        <div class="produtos">

            <?php

                $produtos = "SELECT * FROM produto";
                $resultado = mysqli_query($connect, $produtos);

                while($exibirprodutos = mysqli_fetch_array($resultado)){
            ?>

            <form method="get" action="./item.php">
                <input type="search" value="<?php echo $exibirprodutos['id'];?>" name="veritem"/>
                <button type="submit" name="<?php echo $exibirprodutos['nome'];?>">
                    <!--<a href="">-->
                        <div class="card">
                            <div class="imagem">
                                <img src="./assets/<?php echo $exibirprodutos['imagem'];?>" alt="Imagem do produto">
                            </div>
                            <div class="dados">
                                <h4><?php echo $exibirprodutos['nome'];?></h4>
                                <h4><span>Kz: </span><?php echo $exibirprodutos['preco_actual'];?></h4>
                            </div>
                        </div>
                    <!--</a>-->
                </button>
            </form>

            <?php
            } mysqli_close($connect);
            ?>

        </div>
    </div>
</body>
</html>