<?php

include_once("../conexao.php");

session_start();

if(!isset($_SESSION['logado'])):
    header('Location: ../index.php');
endif;

$id = $_SESSION['id_usuario'];

$sql = "SELECT * FROM user WHERE id = '$id'";

$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);


?>


<?php

if(isset($_FILES['imagem'])){

    if($_FILES['imagem']['type'] == 'image/jpeg'){
    
        $nome_imagem = md5($_FILES['imagem']['name'].rand(1,999)).'.jpg';//define o nome do arquivo

            $diretorio = "../assets/";//define o directorio para onde é enviado o arquivo

            move_uploaded_file($_FILES['imagem']['tmp_name'], "../assets/".$nome_imagem); //efetua o upload do arquivo

            /*fim do Upload da imagem */

            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $preco_antigo = $_POST['precoantigo'];
            $preco_actual = $_POST['precoactual'];

            $sqlprod = "insert into produto (nome, descricao, preco_antigo, preco_actual, imagem) values ('$nome', '$descricao', '$preco_antigo', '$preco_actual', '$nome_imagem')";

            $postar = mysqli_query($connect,$sqlprod);

            if(mysqli_affected_rows($connect) != 0){
                echo "
                    <script type=\"text/javascript\">
                        alert(\"Postagem do produto feita com sucesso.\");
                    </script>";
            }
            else{
                echo "
                    <script type=\"text/javascript\">
                        alert(\"Erro, tente novamente.\");
                    </script>
                ";	
            }
    } elseif($_FILES['imagem']['type'] == 'image/png'){

            $nome_imagem = md5($_FILES['imagem']['name'].rand(1,999)).'.png';//define o nome do arquivo
    
                $diretorio = "../assets/";//define o directorio para onde é enviado o arquivo
    
                move_uploaded_file($_FILES['imagem']['tmp_name'], "../assets/".$nome_imagem); //efetua o upload do arquivo
    
                /*fim do Upload da imagem */
    
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $preco_antigo = $_POST['precoantigo'];
                $preco_actual = $_POST['precoactual'];
    
                $sqlprod = "insert into produto (nome, descricao, preco_antigo, preco_actual, imagem) values ('$nome', '$descricao', '$preco_antigo', '$preco_actual', '$nome_imagem')";
    
                $postar = mysqli_query($connect,$sqlprod);
    
                if(mysqli_affected_rows($connect) != 0){
                    echo "
                        <script type=\"text/javascript\">
                            alert(\"Postagem do produto feita com sucesso.\");
                        </script>";
                }
                else{
                    echo "
                        <script type=\"text/javascript\">
                            alert(\"Erro, tente novamente.\");
                        </script>
                    ";	
                }
    }
        elseif($_FILES['imagem']['type'] == 'image/webp'){

            $nome_imagem = md5($_FILES['imagem']['name'].rand(1,999)).'.webp';//define o nome do arquivo
    
                $diretorio = "../assets/";//define o directorio para onde é enviado o arquivo
    
                move_uploaded_file($_FILES['imagem']['tmp_name'], "../assets/".$nome_imagem); //efetua o upload do arquivo
    
                /*fim do Upload da imagem */
    
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $preco_antigo = $_POST['precoantigo'];
                $preco_actual = $_POST['precoactual'];
    
                $sqlprod = "insert into produto (nome, descricao, preco_antigo, preco_actual, imagem) values ('$nome', '$descricao', '$preco_antigo', '$preco_actual', '$nome_imagem')";
    
                $postar = mysqli_query($connect,$sqlprod);
    
                if(mysqli_affected_rows($connect) != 0){
                    echo "
                        <script type=\"text/javascript\">
                            alert(\"Postagem do produto feita com sucesso.\");
                        </script>";
                }
                else{
                    echo "
                        <script type=\"text/javascript\">
                            alert(\"Erro, tente novamente.\");
                        </script>
                    ";	
                }
    } else{
        echo "
            <script type=\"text/javascript\">
                alert(\"Ops!, Erro na inserção do produto. Por favor insira uma imagem válida.E tente novamente\");
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilo.css">
    <title>Loja Virtual</title>
</head>
<body>
    <div class="admin">
        <span><?php echo $dados['username']?></span>
        <span><a href="../logout.php">Terminar Sessão</a></span>
    </div>

    <div class="conteiner">
        <h3>Inserir produto na Loja</h3>

        <form action="./index.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="file" name="imagem" id="imagem">
            </div>
            <div>
                <input type="text" name="nome" id="nome" placeholder="Inserir nome do produto">
            </div>
    
            <div>
                <input type="text" name="precoantigo" id="preco" placeholder="Insera o preço antigo do produto">
            </div>
            
            <div>
                <input type="text" name="precoactual" id="preco" placeholder="Insera o preço actual do produto">
            </div>
    
            <div>
                <textarea name="descricao" id="descricao" cols="55" rows="10" placeholder="A descrição do produto"></textarea>
            </div>
            <div>
                <input type="submit" name="enviar" id="enviar" value="Registrar produto">
            </div>
        </form>

        <div class="verprodutos">
            <a href="../cards.php">Ver produtos</a>
        </div>

    </div>
</body>
</html>