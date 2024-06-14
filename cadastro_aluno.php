<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "boletim";

  
  $conn = new mysqli($servername, $username, $password, $dbname);

  
  if ($conn->connect_error) {
      die("Erro na conexão com o banco de dados: " . $conn->connect_error);
  }

$nome_aluno = $_POST['nome_aluno'];
$data_nascimento = $_POST['data_nascimento'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$responsavel = $_POST['responsavel'];
$telefone_responsavel = $_POST['telefone_responsavel'];


$sql = "INSERT INTO alunos (nome_aluno, data_nascimento, endereco, numero, bairro, cidade, estado, cep, telefone, email, responsavel, telefone_responsavel )
 VALUES ('$nome_aluno', '$data_nascimento', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$email', '$responsavel', '$telefone_responsavel')";
if ($conn->query($sql) === TRUE) {
    header("Location: alunos.html");
} else {
    echo "Erro ao cadastrar aluno: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
// } else {
// // Se o método de requisição não for POST, redireciona para a página de cadastro
// header("Location: cadastro_aluno.php");
// exit();
// }