<h1>Formulário de cadastro</h1>
<form action="receber.php" method="POST">
    Nome:
    <input type="text" name="nomeusuario">
    Senha:
    <input type="password" name="senha">

    <select name="cor" onchange="exibirCores(this)">
      <option value="" data-info="" data-primaria="" data-info-primaria=""></option>
      <option value="amarelo" data-info="Cor secundária: Laranja" data-primaria="verde" data-info-primaria="Cor primária: verde">amarelo</option>
      <option value="vermelho" data-info="Cor secundária: Roxo" data-primaria="rosa" data-info-primaria="Cor primária: rosa">vermelho</option>
      <option value="azul" data-info="Cor secundária: Verde" data-primaria="roxo" data-info-primaria="Cor primária: roxo">Azul</option>
    </select>

    <div id="corPrimaria"></div>
    <div id="corSecundaria"></div>


  <script>
      function exibirCores(selectElement) {
        var corSecundariaDiv = document.getElementById('corSecundaria');
        var corPrimariaDiv = document.getElementById('corPrimaria');
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        var corSecundariaValue = selectedOption.value;
        var corSecundariaInfo = selectedOption.getAttribute('data-info');
        corSecundariaDiv.innerHTML = corSecundariaInfo;

        var corPrimariaValue = selectedOption.getAttribute('data-primaria');
        var corPrimariaInfo = selectedOption.getAttribute('data-info-primaria');
        corPrimariaDiv.innerHTML = corPrimariaInfo;

        // Atualizar o valor do option para enviar ambas as informações
        selectedOption.value = corSecundariaValue + '|' + corSecundariaInfo + '|' + corPrimariaValue + '|' + corPrimariaInfo;
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
      var corSecundaria = document.querySelector('select[name="corSecundaria"]').value;
      
      // Criar um objeto FormData com todos os dados do formulário
      var formData = new FormData(document.querySelector("form"));
      formData.append("corSecundaria", corSecundaria); // Adicionar a cor secundária selecionada ao FormData
      
      xhttp.send(formData);
    }

  </script>


    
    <input type="submit" value="Enviar" onclick="enviarCores()" /> 
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
