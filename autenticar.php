<?php
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
            if ($senha == $row['senha_bd']) {
                // Senha correta, o usuário é autenticado com sucesso
                $_SESSION['autenticado'] = true;
                $_SESSION['usuario'] = $row['nome_bd'];

                echo "<script>alert('Credencial correta!'); </script>";
                header("Refresh: 0; url=form.php");
                exit();
            } else {
                // Senha incorreta, exibir alerta e redirecionar para a página de login novamente
                echo "<script>alert('Credenciais incorretas. Tente novamente.');</script>";
                header("Refresh: 0; url=login.php");
                exit();
            }
        } else {
            // Usuário não encontrado, exibir alerta e redirecionar para a página de login novamente
            echo "<script>alert('Usuário não encontrado. Tente novamente.');</script>";
            header("Refresh: 0; url=login.php");
            exit();
        }
    } else {
        // Erro na consulta, exibir alerta e redirecionar para a página de login novamente
        echo "<script>alert('Erro ao processar a consulta. Tente novamente.');</script>";
        header("Refresh: 0; url=login.php");
        exit();
    }
}
?>

