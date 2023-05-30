<?php
$user = "root"; 
$password = ""; 
$database = "bdst"; 

# O hostname deve ser sempre localhost 
$hostname = "localhost"; 

$mysqli = new mysqli($hostname,$user,$password,$database);
// Checar conexão

if ($mysqli -> connect_errno) {
  echo "Falha ao conectar ao banco: " . $mysqli -> connect_error;
 exit();
}
?>