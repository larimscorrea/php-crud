<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores enviados pelo formulário de cadastro em cadastro.php
    $nome = $_POST['nome'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Faça a conexão com o banco de dados
    $host = 'localhost';
    $usuario_bd = '';
    $senha_bd = '';
    $bancodedados_bd = 'usuarios';

    $conn = mysqli_connect($host, $usuario_bd, $senha_bd, $bancodedados_bd);

    // Verifique a conexão
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Verifique se o nome de usuário já está cadastrado na tabela usuarios
    $sql_verificar_usuario = "SELECT * FROM usuarios WHERE usuario = '$nome'";
    $resultado_verificar_usuario = mysqli_query($conn, $sql_verificar_usuario);

    if (mysqli_num_rows($resultado_verificar_usuario) > 0) {
        echo "Usuário já cadastrado. Por favor, escolha outro nome de usuário.";
        exit();
    }

    // Criptografe a senha antes de inseri-la na tabela
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Insira os dados na tabela usuarios
    $sql_inserir_usuario = "INSERT INTO usuarios (usuario, senha) VALUES ('$nome', '$senha_hash')";

    if (mysqli_query($conn, $sql_inserir_usuario)) {
        echo "Cadastro realizado com sucesso. Agora você pode fazer o login.";
    } else {
        echo "Erro ao cadastrar usuário: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Requisição inválida.";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome']) && isset($_POST['senha'])) {
        $host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $data = 'teste-project';

        $conn = mysqli_connect($host, $usuario, $senha, $data);

        if ($conn) {
            echo "Conexão estabelecida com sucesso.";

            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            
            $sql = "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha')";

            if (mysqli_query($conn, $sql)) {
                echo "Registro inserido com sucesso.";
            } else {
                echo "Erro ao inserir registro: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
            echo "Falha na conexão: " . mysqli_connect_error();
        }
    } else {
        echo "Campos do formulário não estão definidos.";
    }  

} else {
    echo "Requisição inválida.";
}

?>