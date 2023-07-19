<h1>Formulário de cadastro</h1>
<form action="receber.php" method="POST">
    Nome:
    <input type="text" name="nomeusuario">
    Senha:
    <input type="password" name="senha">

    <select name="corSecundaria" onchange="exibirCorSecundaria(this)">
        <option value="" data-info=""></option>
        <option value="amarelo" data-info="Cor secundária: Laranja">amarelo</option>
        <option value="vermelho" data-info="Cor secundária: Roxo">vermelho</option>
        <option value="azul" data-info="Cor secundária: Verde">Azul</option>
    </select>

    <div id="corSecundaria"></div>

<script>
  function exibirCorSecundaria(selectElement) {
    var corSecundariaDiv = document.getElementById('corSecundaria');
    var selectedOption = selectElement.options[selectElement.selectedIndex];

    var corSecundariaValue = selectedOption.value;
    var corSecundariaInfo = selectedOption.getAttribute('data-info');

    corSecundariaDiv.innerHTML = corSecundariaInfo;

    // Atualizar o valor do option para enviar ambas as informações
    selectedOption.value = corSecundariaValue + '|' + corSecundariaInfo;
  }

  function enviarCorSecundaria(corSecundaria) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        console.log('Cor secundária enviada para o servidor.');
      }
    };
    xhttp.open("POST", "salvar_cor_secundaria.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("corSecundaria=" + corSecundaria);
  }
</script>

    
    <input type="submit" value="Enviar" /> 
</form>




<?php
if (isset($_POST['nomeusuario'])) {
    echo $_POST['nomeusuario'] . '</br>';
}

if (isset($_POST['cor'])) {
    echo $_POST['cor'] . '</br>';
}

if (isset($_POST['corSecundaria'])) {
  echo $_POST['corSecundaria'] . '</br>';
}

if (isset($_POST['senha'])) {
    echo $_POST['senha'];
}
?>
