<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "transportadora";

try {
$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

date_default_timezone_set('America/Sao_Paulo');

//echo"Conexão com sucesso !!";

} catch (PDOException $e){
echo "Erro ao conectar: " . $e->getMessage();
}
