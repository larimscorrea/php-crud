<?php
// Obtenha os valores enviados pelo formulário de login
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

// Faça a conexão com o banco de dados
$host = 'localhost';
$usuario_bd = 'seu_usuario';
$senha_bd = 'sua_senha';
$nome_bd = 'seu_banco_de_dados';

$conn = mysqli_connect($host, $usuario_bd, $senha_bd, $nome_bd);

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Faça a consulta para verificar as credenciais do usuário
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$resultado = mysqli_query($conn, $sql);

// Verifique se a consulta retornou algum resultado
if (mysqli_num_rows($resultado) === 1) {
    $row = mysqli_fetch_assoc($resultado);

    // Verifique se a senha está correta
    if (password_verify($senha, $row['senha'])) {
        // Senha correta, redirecione para o form.php após a autenticação bem-sucedida
        session_start();
        $_SESSION['autenticado'] = true;
        header("Location: form.php");
        exit();
    }
}

// Caso as credenciais estejam incorretas, redirecione novamente para o login.php
header("Location: login.php");
exit();
?>
