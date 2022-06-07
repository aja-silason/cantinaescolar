<?php

include_once("./conexao.php");


session_start();

/* Para manter o inicio de sessão organizado*/
if(isset($_SESSION['logado'])):
    header('Location: ./admin/index.php');
endif;

if(isset($_POST['acessarconta'])):
    $erros = array();
    $username = mysqli_escape_string($connect, $_POST['username']);
    $pass = mysqli_escape_string($connect, $_POST['pass']);

    if(empty($username) or empty($pass)):
        $erros[] = "<p class='erro3'>Preencha todos os campos para poderes iniciar sessão.</p>";
    
    else:
        $sql = "SELECT username FROM user WHERE username='$username'";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0 ):
            $sql = "SELECT * FROM user WHERE username = '$username' AND pass = '$pass'";
            $resultado = mysqli_query($connect, $sql);
            
            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);   

                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];

                header('Location: ./admin/index.php');

            else:
                $erros[] = "<p class='erro'>Usuário não existe, crie uma conta se não tiveres uma.</p>";
            
            endif;

        else:
            $erros[] = "<p class='erro2'>Usuário não existe, crie uma conta se não tiveres uma.</p>";
        endif;

    endif;
endif;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/login.css">
    <title>Login</title>
</head>
<body>
    <div class="conteudo">
        <h2>Apenas usuários autorizados</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <?php
                if(!empty($erros)):
                    foreach($erros as $erro):
                        echo $erro;
                    endforeach;
                endif;
            ?>
            <div class="input">
                <input type="text" placeholder="Insira o username" name="username">
            </div>
            <div class="input">
                <input type="password" placeholder="Insira a password" name="pass">
            </div>
            <div class="input">
                <input type="submit" value="Entrar" name="acessarconta">
            </div>
        </form>
    </div>
</body>
</html>