<h1>Formulário de consulta</h1>
<form action="consulta.php" method="POST">
    <input type="text" name="search">
    Selecione a ficha
    <select name="ficha" onchange="exibirFicha(this)">
        <option value="" data-info="" data-info-primaria=""></option>
        <option value="ficha">ficha</option>
        <option value="semana 1">Semana 1</option>
        <option value="semana 2">Semana 2</option>
    </select>
    <input type="submit" value="Pesquisar" />
</form>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o campo de pesquisa foi preenchido
    if (isset($_POST["search"]) && !empty($_POST["search"])) {
        // Obter o valor do campo de pesquisa
        $searchValue = $_POST["search"];

        // Obter o valor selecionado do campo ficha
        $fichaValue = $_POST["ficha"];

        // Criar a consulta SQL com base nos critérios de pesquisa
        $sql = "SELECT * FROM cadastro WHERE nome LIKE '%$searchValue%'";

        // // Se uma ficha específica foi selecionada, adicionar filtro à consulta
        if (!empty($fichaValue)) {
            $sql .= " AND ficha = '$fichaValue'";
        }
      
        // Conectar-se ao banco de dados
        $host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $data = 'teste-project';
        $conn = mysqli_connect($host, $usuario, $senha, $data);

        // Verificar se a conexão foi bem-sucedida
        if ($conn) {
            // Executar a consulta
            $result = mysqli_query($conn, $sql);

            // Verificar se a consulta retornou resultados
            if (mysqli_num_rows($result) > 0) {
                // Exibir os resultados da consulta
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>{$row['nome']} | {$row['cpf']} | {$row['ficha']}</p>";
                }
            } else {
                echo "<p>Nenhum resultado encontrado.</p>";
            }

            // Fechar a conexão
            mysqli_close($conn);
        } else {
            echo "Falha na conexão: " . mysqli_connect_error();
        }
    } else {
        echo "Por favor, insira um valor para pesquisar.";
    }
}
?>
