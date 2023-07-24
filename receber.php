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
        $genero = $_POST['genero'];

       
        // Separar os valores enviados usando explode
        list($bairroValue, $regionalValue, $territorioValue) = explode('|', $bairro);


        $sql = "INSERT INTO cadastro (nome, bairro, regional, territorio, genero, senha) VALUES ('$nome', '$bairroValue', '$regionalValue', '$territorioValue', '$genero', '$senha')";

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









