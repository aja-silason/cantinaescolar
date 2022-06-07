<?php

$host = "127.0.0.1";
$username = "root";
$pass = "";
$bd = "cantina";

$connect = mysqli_connect($host, $username, $pass, $bd);

if(mysqli_connect_error()):
    echo "Falha na conexão com o servidor".mysqli_connect_error();
endif;

?>
