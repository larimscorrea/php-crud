<h1>Formulário de cadastro</h1>
<form action="receber.php" method="POST">
    Nome:
    <input type="text" name="nomeusuario">
    Senha:
    <input type="password" name="senha">

    <select name="cor" onchange="exibirBairro(this)">
      <option value="" data-info="" data-primaria="" data-info-primaria=""></option>
      <option value="aldeota" data-info="Regional 1" data-primaria="verde" data-info-primaria="Território 31">Aldeota</option>
      <option value="boavista" data-info="Regional 2" data-primaria="rosa" data-info-primaria="Território 30">Boa-vista</option>
      <option value="carlito" data-info="Regional 3" data-primaria="roxo" data-info-primaria="Território 29">Carlito</option>
    </select>

    <div id="regional"></div>
    <div id="territorio"></div>


  <script>
      function exibirBairro(selectElement) {
        var regionalDiv = document.getElementById('regional');
        var territorioDiv = document.getElementById('territorio');
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        var regionalValue = selectedOption.value;
        var regionalInfo = selectedOption.getAttribute('data-info');
        regionalDiv.innerHTML = regionalInfo;

        var territorioValue = selectedOption.getAttribute('data-primaria');
        var territorioInfo = selectedOption.getAttribute('data-info-primaria');
        territorioDiv.innerHTML = territorioInfo;

        // Atualizar o valor do option para enviar ambas as informações
        selectedOption.value = regionalValue + '|' + regionalInfo + '|' + territorioValue + '|' + territorioInfo;
      }

      function enviarCores() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          console.log('Formulário enviado para o servidor.');
        }
      };
      xhttp.open("POST", "receber.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      
      // Obter o valor da opção selecionada
      var regional = document.querySelector('select[name="corSecundaria"]').value;
      
      // Criar um objeto FormData com todos os dados do formulário
      var formData = new FormData(document.querySelector("form"));
      formData.append("regional", regional); // Adicionar a cor secundária selecionada ao FormData
      
      xhttp.send(formData);
    }

  </script>


    
    <input type="submit" value="Enviar" onclick="enviarBairros()" /> 
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

if (isset($_POST['corPrimaria'])) {
  echo $_POST['corPrimaria'] . '</br>';
}


if (isset($_POST['senha'])) {
    echo $_POST['senha'];
}
?>
