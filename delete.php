<?php
session_start();

echo $_GET['id_delete']; 

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$base = 'agenda';

$conexao = new mysqli($servidor, $usuario, $senha, $base);

if($conexao->connect_error)
{
    die('Falha de Conexão: ' . $conexao->connect_error);
}

$sql = 'DELETE FROM tbl_agenda WHERE id = ' . $_GET['id_delete'] . ';';
$resultado = $conexao->query($sql);

$conexao->close();

header('Location: index.php');


?>