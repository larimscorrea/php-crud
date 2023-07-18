<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$data = 'teste-project';

$conn = mysqli_connect($host, $usuario, $senha, $data);

if($conn) {
    echo "Conexão estabelecida com sucesso.";

    if(isset($_POST['nomeusuario']) && isset($_POST['senha'])) {
        $nome = $_POST['nomeusuario'];
        $senha = $_POST['senha'];
        $cor = $_POST['cor'];
        $corSecundaria = $_POST['corSecundaria'];


        $sql = "INSERT INTO cadastro (nome, cor, corSecundaria senha) VALUES ('$nome', '$cor', '$corSecundaria', '$senha')";

        if(mysqli_query($conn, $sql)) {
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
