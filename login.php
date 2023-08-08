<h1>Login</h1>
<form action="autenticar.php" method="POST">
    Usuário:
    <input type="text" name="nome_bd">
    Senha:
    <input type="password" name="senha_bd">
    <input type="submit" value="Entrar" />
</form>


<?php

if (isset($_POST['nome_bd'])) {
    echo $_POST['nome_bd'] . '</br>';
}

if (isset($_POST['senha_bd'])) {
    echo $_POST['senha_bd'] . '</br>';
}


?>