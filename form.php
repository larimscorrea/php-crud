<?php 
// Verifique se o usuário está autenticado
session_start();
if (!isset($_SESSION['autenticado'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Formulário de cadastro</h1>
<form action="receber.php" method="POST">
    Nome:
    <input type="text" name="nomeusuario">
    Senha:
    <input type="password" name="senha">


    Selecione o bairro
    <select name="bairro" onchange="exibirBairro(this)">
      <option value="" data-info="" data-info-primaria=""></option>
      <option value="aldeota|Regional 1|Território 31">Aldeota</option>
      <option value="boavista|Regional 2|Território 30">Boa-vista</option>
      <option value="carlito|Regional 3|Território 29">Carlito</option>
    </select>

    <p id="regional"></p>
    <p id="territorio"></p>

    <!-- <div id="regional"></div>
    <div id="territorio"></div> -->

      <label>
        <input type="radio" name="genero" value="feminino" onclick="exibirCampoOutro()"> Feminino
      </label>
      <label>
        <input type="radio" name="genero" value="masculino" onclick="exibirCampoOutro()"> Masculino
      </label>
      <label>
        <input type="radio" name="genero" value="outro" onclick="exibirCampoOutro()"> Outro
      </label>

      <div id="outro" style="display: none;">
        Qual gênero?
        <input type="text" name="outro-genero" id="outro-genero"> 
      </div>

    <input type="submit" value="Enviar" />
</form>

<script>
    function exibirBairro(selectElement) {
    var regionalDiv = document.getElementById('regional');
    var territorioDiv = document.getElementById('territorio');
    var selectedOption = selectElement.options[selectElement.selectedIndex];


    // var bairroValue = selectedOption.value;
    // var regionalValue = selectedOption.getAttribute('data-info');
    // var territorioValue = selectedOption.getAttribute('data-info-primaria');

    // regionalDiv.textContent = `Regional: ${regionalValue}`;
    // territorioDiv.textContent = `Território: ${territorioValue}`;

    // Atualizar o valor do option para enviar apenas o valor do bairro
    // selectedOption.value = bairroValue;

    var bairroValue = selectedOption.value;
    var bairroInfo = bairroValue.split('|');
    var regionalValue = bairroInfo[1];
    var territorioValue = bairroInfo[2];

    if (regionalValue && territorioValue) {
        regionalDiv.textContent = `Regional: ${regionalValue}`;
        territorioDiv.textContent = `Território: ${territorioValue}`;
    } else {
        regionalDiv.textContent = "";
        territorioDiv.textContent = "";
    }
  }


  function exibirCampoOutro() {
  var outroRadio = document.querySelector('input[name="genero"][value="outro"]');
  var outroDiv = document.getElementById('outro');
  
  if (outroRadio.checked) {
    outroDiv.style.display = 'block';
  } else {
    outroDiv.style.display = 'none';
  }
}

  // Monitorar mudanças nos inputs radio
  var radioInputs = document.querySelectorAll('input[type="radio"][name="genero"]');
  for (var i = 0; i < radioInputs.length; i++) {
    radioInputs[i].addEventListener('change', exibirCampoOutro);
  }

  exibirBairro();
  

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

if (isset($_POST['genero'])) {
  echo $_POST['genero'] . '</br>';
}

if (isset($_POST['senha'])) {
    echo $_POST['senha'];
}
?>
