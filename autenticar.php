<?php
// // Obtenha os valores enviados pelo formulário de login
// $usuario = $_POST['usuario'] ?? '';
// $senha = $_POST['senha'] ?? '';

// Faça a conexão com o banco de dados
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $data = 'teste-project';

    $conn = mysqli_connect($host, $usuario, $senha, $data);

    if(!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Obtenha os valores enviados pelo formulário de login
    $usuario = $_POST['nome_bd'] ?? '';
    $senha = $_POST['senha_bd'] ?? '';

    $sql = "SELECT * FROM usuarios WHERE nome_de_usuario = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)) {
        //Vincular parâmetros à consulta preparada. 
        mysqli_stmt_bind_param($stmt, "s", $usuario);

        // Executar a consulta
        mysqli_stmt_execute($stmt);


        // Obter o resultado da consulta
        $resultado = mysqli_stmt_get_result($stmt);

        // Verificar se o usuário foi encontrado
        if(mysqli_num_rows($resultado) === 1) {
            $row + mysqli_fetch_assoc($resultado);

            // Verificar a senha usando passwword_verify

            if(password_verify($senha, $row['senha'])) {
                $_SESSION['autenticado'] = true;
                $_SESSION['$usuario'] = $row['nome_de_usuario'];
                header("Location: form.php");
                exit();
            }
        }
            
    }

    // Se as credenciais estiverem incorretas ou o usuário não for encontrado, redirecione para a página de login novamente.
    header("Location: login.php");
    exit();
}

$host = 'localhost';
$usuario = 'root';
$senha = '';
$data = 'teste-project';

$conn = mysqli_connect($host, $usuario, $senha, $data);

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Faça a consulta para verificar as credenciais do usuário
$sql = "SELECT * FROM usuarios WHERE usuarios = '$usuario' AND senha = '$senha'";
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
