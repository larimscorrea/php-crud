<h1>Formulário de cadastro</h1>
<form action="cadastrar.php" method="POST">
    Nome:
    <input type="text" name="nome_bd">
    Senha:
    <input type="password" name="senha_bd">
    <input type="submit" value="Enviar" />

</form> 

<?php

if (isset($_POST['nome_bd'])) {
    echo $_POST['nome_bd'] . '</br>';
}

if (isset($_POST['senha_bd'])) {
    echo $_POST['senha_bd'];
}
?>
