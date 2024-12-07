<?php
$servername = "localhost";
$username = "root";  // Seu nome de usuário do MySQL (geralmente "root")
$password = "";  // Sua senha do MySQL (geralmente em branco no localhost)
$dbname = "monitoramento_lagos";  // Nome do banco de dados que você criou

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
