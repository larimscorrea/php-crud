<h1>Formulário de cadastro</h1>
<form action="receber.php" method="POST">
    Nome:
    <input type="text" name="nomeusuario">
    Senha:
    <input type="password" name="senha">

    <select name="bairro" onchange="exibirBairro(this)">
      <option value="" data-info="" data-primaria="" data-info-primaria=""></option>
      <option value="aldeota" data-info="Regional 1" data-primaria="verde" data-info-primaria="Território 31">Aldeota</option>
      <option value="boavista" data-info="Regional 2" data-primaria="rosa" data-info-primaria="Território 30">Boa-vista</option>
      <option value="carlito" data-info="Regional 3" data-primaria="roxo" data-info-primaria="Território 29">Carlito</option>
    </select>

    <div id="regional"></div>
    <div id="territorio"></div>

    <input type="submit" value="Enviar" />
</form>

<script>
    function exibirBairro(selectElement) {
        var regionalDiv = document.getElementById('regional');
        var territorioDiv = document.getElementById('territorio');
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        var regionalValue = selectedOption.getAttribute('data-info');
        regionalDiv.innerHTML = regionalValue;

        var territorioValue = selectedOption.getAttribute('data-info-primaria');
        territorioDiv.innerHTML = territorioValue;

        // Atualizar o valor do option para enviar ambas as informações separadas por |
        selectedOption.value = selectedOption.value + '|' + regionalValue + '|' + selectedOption.value + '|' + territorioValue;
    }
</script>

<!-- 
    
    <input type="submit" value="Enviar" onclick="enviarBairro()" /> 
</form> -->




<?php
if (isset($_POST['nomeusuario'])) {
    echo $_POST['nomeusuario'] . '</br>';
}

if (isset($_POST['bairro'])) {
    echo $_POST['cor'] . '</br>';
}

if (isset($_POST['regional'])) {
  echo $_POST['regional'] . '</br>';
}

if (isset($_POST['territorio'])) {
  echo $_POST['territorio'] . '</br>';
}


if (isset($_POST['senha'])) {
    echo $_POST['senha'];
}
?>
