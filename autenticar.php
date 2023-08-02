<?php
// // Obtenha os valores enviados pelo formulário de login
// $usuario = $_POST['usuario'] ?? '';
// $senha = $_POST['senha'] ?? '';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $data = 'teste-project';

    $conn = mysqli_connect($host, $usuario, $senha, $data);

    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Obtenha os valores enviados pelo formulário de login
    $usuario = $_POST['nome_bd'] ?? '';
    $senha = $_POST['senha_bd'] ?? '';

    // Consulta preparada para verificar as credenciais do usuário
    $sql = "SELECT * FROM usuarios WHERE nome_bd = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Vincular parâmetros à consulta preparada
        mysqli_stmt_bind_param($stmt, "s", $usuario);

        // Executar a consulta
        mysqli_stmt_execute($stmt);

        // Obter o resultado da consulta
        $resultado = mysqli_stmt_get_result($stmt);

        // Verificar se o usuário foi encontrado
        if (mysqli_num_rows($resultado) === 1) {
            $row = mysqli_fetch_assoc($resultado);

            // Verificar a senha usando password_verify
            if (password_verify($senha, $row['senha_bd'])) {
                // Senha correta, o usuário é autenticado com sucesso
                $_SESSION['autenticado'] = true;
                $_SESSION['usuario'] = $row['nome_bd'];
                echo "<script>alert('Autenticação bem-sucedida. Redirecionando para a página de formulário.');</script>";
                echo "<script>setTimeout(function() { window.location.href = 'form.php'; }, 1000);</script>";
                exit();
            }
        }
    }

    // Se as credenciais estiverem incorretas ou o usuário não for encontrado, exiba o alerta e redirecione para a página de login novamente após 3 segundos
    echo "<script>alert('Credenciais incorretas ou usuário não encontrado. Tente novamente.');</script>";
    echo "<script>setTimeout(function() { window.location.href = 'login.php'; }, 3000);</script>";
    exit();
}







// $host = 'localhost';
// $usuario = 'root';
// $senha = '';
// $data = 'teste-project';

// $conn = mysqli_connect($host, $usuario, $senha, $data);

// // Verifique a conexão
// if (!$conn) {
//     die("Falha na conexão: " . mysqli_connect_error());
// }

// // Faça a consulta para verificar as credenciais do usuário
// $sql = "SELECT * FROM usuarios WHERE usuarios = '$usuario' AND senha = '$senha'";
// $resultado = mysqli_query($conn, $sql);

// // Verifique se a consulta retornou algum resultado
// if (mysqli_num_rows($resultado) === 1) {
//     $row = mysqli_fetch_assoc($resultado);

//     // Verifique se a senha está correta
//     if (password_verify($senha, $row['senha'])) {
//         // Senha correta, redirecione para o form.php após a autenticação bem-sucedida
//         session_start();
//         $_SESSION['autenticado'] = true;
//         header("Location: form.php");
//         exit();
//     }
// }

// // Caso as credenciais estejam incorretas, redirecione novamente para o login.php
// header("Location: login.php");
// exit();
?>
