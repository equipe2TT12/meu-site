<?php
// login.php

// Conectar ao banco de dados
include('db_connect.php');

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['password'];

    // Preparar e executar a consulta SQL para verificar as credenciais
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // S para string
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o usuário existe
    if ($result->num_rows > 0) {
        // Usuário encontrado, agora verificar a senha
        $user = $result->fetch_assoc();
        if (password_verify($senha, $user['password'])) {
            // Senha correta, redireciona para a página desejada
            header("Location: index.html"); // Altere o caminho para o destino da sua página de dashboard
            exit;
        } else {
            // Senha incorreta
            echo "Senha incorreta.";
        }
    } else {
        // Usuário não encontrado
        echo "Usuário não encontrado.";
    }
}

$conn->close();
?>
