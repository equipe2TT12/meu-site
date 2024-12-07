<?php
// Conexão com o banco de dados
include('db_connect.php');

// Verifica a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];
  $birthdate = $_POST['birthdate'];
  $address = $_POST['address'];
  $state = $_POST['state'];
  $city = $_POST['city'];

  // Validação da senha
  if ($password !== $confirmPassword) {
    echo "As senhas não coincidem!";
    exit;
  }

  // Criptografar a senha
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

  // Inserir no banco de dados
  $sql = "INSERT INTO users (name, email, phone, password, birthdate, address, state, city) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssssss", $name, $email, $phone, $hashedPassword, $birthdate, $address, $state, $city);

  if ($stmt->execute()) {
    header("Location: index.html");
  } else {
    header("Location: cadastro.html");
  }

  $stmt->close();
  $conn->close();
}
?>
