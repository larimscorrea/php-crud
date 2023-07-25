<h1>Formulário de cadastro</h1>
<form action="receber.php" method="POST">
    
    <input type="text" name="search">



    Selecione o bairro
    <select name="ficha" onchange="exibirFicha(this)">
      <option value="" data-info="" data-info-primaria=""></option>
      <option value="ficha">ficha</option>
      <option value="semana 1">Semana 1</option>
      <option value="semana 2">Semana 2</option>
    </select>

    <p> <a href="#"> nome </a> | <a href="#"> cpf </a>  | <a href="#"> nº da ficha </a>  </p>

    <input type="submit" value="Pesquisar" />
</form>

<?php 
$host = 'localhost';
$usuario = 'root';
$senha = '';
$data = 'teste-project';

$conn = mysqli_connect($host,$usuario,$senha,$data);

$sql = "SELECT * from cadastro";

mysqli_query($conn,$sql);


?>