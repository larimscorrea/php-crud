<h1>Formulário de cadastro</h1>
<form action="cadastrar.php" method="POST">
    Nome:
    <input type="text" name="nome">
    Senha:
    <input type="password" name="senha">
    <input type="submit" value="Enviar" />

</form> 

<?php

if (isset($_POST['nome'])) {
    echo $_POST['nome'] . '</br>';
}

if (isset($_POST['senha'])) {
    echo $_POST['senha'];
}
?>
