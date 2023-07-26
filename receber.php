<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nomeusuario']) && isset($_POST['senha']) && isset($_POST['bairro']) && isset($_POST['genero'])) {
        $host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $data = 'teste-project';

        $conn = mysqli_connect($host, $usuario, $senha, $data);

        if ($conn) {
            echo "Conexão estabelecida com sucesso.";

            $nome = $_POST['nomeusuario'];
            $senha = $_POST['senha'];
            $bairro = $_POST['bairro'];
            $genero = $_POST['genero'];

            // Separar os valores enviados usando explode
            list($bairroValue, $regionalValue, $territorioValue) = explode('|', $bairro);

            $sql = "INSERT INTO cadastro (nome, bairro, regional, territorio, genero, senha) VALUES ('$nome', '$bairroValue', '$regionalValue', '$territorioValue', '$genero', '$senha')";

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