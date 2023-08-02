<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome_bd']) && isset($_POST['senha_bd'])) {
        $host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $data = 'teste-project';

        $conn = mysqli_connect($host, $usuario, $senha, $data);

        if ($conn) {
            echo "Conexão estabelecida com sucesso.";

            $nome_bd = $_POST['nome_bd'];
            $senha_bd = $_POST['senha_bd'];
            
            $sql = "INSERT INTO usuarios (nome_bd, senha_bd) VALUES ('$nome_bd', '$senha_bd')";

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