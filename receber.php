<?php
if (isset($_POST['nomeusuario']) && isset($_POST['senha']) && isset($_POST['bairro'])) {
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

        // Separar os valores enviados usando explode
        list($bairroValue, $regionalValue, $bairroValueAgain, $territorioValue) = explode('|', $bairro);

        $sql = "INSERT INTO cadastro (nome, regional, regional_info, territorio, territorio_info, senha) VALUES ('$nome', '$regionalValue', '$bairroValue', '$territorioValue', '$bairroValueAgain', '$senha')";

        if (mysqli_query($conn, $sql)) {
            echo " Registro inserido com sucesso.";
        } else {
            echo " Erro ao inserir registro: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo " Falha na conexão: " . mysqli_connect_error();
    }
} else {
    echo " Campos de formulário não estão definidos.";
}
?>





