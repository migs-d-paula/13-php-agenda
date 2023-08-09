<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

  <title>Select com table</title>
</head>
<body>
  <?php

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $base = 'agenda';

    $conexao = new mysqli($servidor, $usuario, $senha, $base);

    if($conexao->connect_error)
{
    die('Falha de Conexão: ' . $conexao->connect_error);
}
else
{
    echo 'conexão OK';
}

$sql = 'SELECT * FROM tbl_agenda;';
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0)
{
  echo '<table class="table table-dark table-striped">';
  echo '  <thead>';
  echo '    <tr>';
  echo '     <th scope="col">ID</th>';
  echo '      <th scope="col">NOME</th>';
  echo '     <th scope="col">CELULAR</th>';
  echo '    </tr>';
  echo ' </thead>';
  echo '<tbody>';

  while($linhas = $resultado->fetch_assoc())
  {
    //echo 'ID: ' . $linhas['id'] . ' - NOME: ' . $linhas['nome'] . ' - SOBRENOME: ' . $linhas['sobrenome'] . ' - TELEFONE: ' . $linhas['telefone'] . ' - CELULAR: ' . $linhas['celular'] . ' - EMAIL: ' . $linhas['email'] . ' - LINKEDIN: ' . $linhas['linkedin'] . ' - BLOQUEADO? ' . $linhas['bloqueado'] . '<br>';
    
    echo '  <tr>';
    echo '  <th scope="row">' . $linhas['id'] . '</th>';
    echo '  <td>' . $linhas['nome'] . '</td>';
    echo '  <td>' . $linhas['celular'] . '</td>';
    echo '</tr>';
  }
  echo '</tbody>';
  echo '</table>';
}
  ?>
</body>
</html>