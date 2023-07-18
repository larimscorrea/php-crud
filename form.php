<h1>Formulário de cadastro</h1>
<form action="receber.php" method="POST">
    Nome:
    <input type="text" name="nomeusuario">
    Senha:
    <input type="password" name="senha">

    <select name="cores" onchange="exibirCorSecundaria(this.value)" id="">
        <option value=""></option>
        <option value="amarelo">amarelo</option>
        <option value="vermelho">vermelho</option>
        <option value="azul">Azul</option>
    </select>

    <div id="corSecundaria"></div>

<script>
  function exibirCorSecundaria(cor) {
    var corSecundariaDiv = document.getElementById('corSecundaria');
    
    if (cor === 'amarelo') {
      corSecundariaDiv.innerHTML = 'Cor secundária: Laranja';
    } else if (cor === 'vermelho') {
      corSecundariaDiv.innerHTML = 'Cor secundária: Roxo';
    } else if (cor === 'azul') {
      corSecundariaDiv.innerHTML = 'Cor secundária: Verde';
    } else {
      corSecundariaDiv.innerHTML = '';
    }
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

if (isset($_POST['senha'])) {
    echo $_POST['senha'];
}
?>
