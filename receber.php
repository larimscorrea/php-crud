<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$data = 'teste-project';

$conn = mysqli_connect($host, $usuario, $senha, $data);

if ($conn) {
    echo "Conexão estabelecida com sucesso.";

    if (isset($_POST['nomeusuario']) && isset($_POST['senha']) && isset($_POST['corSecundaria'])) {
        $nome = $_POST['nomeusuario'];
        $senha = $_POST['senha'];
        $cores = $_POST['corSecundaria'];

        // Separar os valores enviados usando explode
        list($corSecundariaValue, $corSecundariaInfo, $corPrimariaValue, $corPrimariaInfo) = explode('|', $cores);

        $sql = "INSERT INTO cadastro (nome, cor_secundaria, cor_secundaria_info, cor_primaria, cor_primaria_info, senha) VALUES ('$nome', '$corSecundariaValue', '$corSecundariaInfo', '$corPrimariaValue', '$corPrimariaInfo', '$senha')";

        if (mysqli_query($conn, $sql)) {
            echo "Registro inserido com sucesso.";
        } else {
            echo "Erro ao inserir registro: " . mysqli_error($conn);
        }
    } else {
        echo "Campos de formulário não estão definidos.";
    }

    mysqli_close($conn);
} else {
    echo "Falha na conexão: " . mysqli_connect_error();
}
?>



