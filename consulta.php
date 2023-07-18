<?php 
$host = 'localhost';
$usuario = 'root';
$senha = '';
$data = 'teste-project';

$conn = mysqli_connect($host,$usuario,$senha,$data);

$sql = "SELECT * from cadastro";

mysqli_query($conn,$sql);


?>