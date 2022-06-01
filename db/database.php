<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'facturacion';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  //echo 'Conexion correcta';
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>