<?php
// $servername = "10.3.76.89";
// $username = "ads";
// $password = "12345678";
// $database = "db_desapegados";
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "db_desapegados";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
  echo('Erro na conexão com o banco. ' . mysqli_connect_error());
}

?>