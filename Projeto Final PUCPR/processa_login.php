<?php
// Informações do banco de dados
$localhost = "localhost";
$username = "root";
$password = "123456";
$database = "pucpr";

// Inicia a sessão
session_start();

// Conectar ao banco de dados
$conn = new mysqli($localhost, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obter dados do formulário
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Consulta SQL para verificar as credenciais na tabela 'user'
$sql = "SELECT * FROM user WHERE usuario='$usuario' AND senha='$senha'";
$result = $conn->query($sql);

// Verificar se há correspondências
if ($result->num_rows > 0) {
    // Autenticação bem-sucedida
    $_SESSION['usuario'] = $usuario; // Armazena o nome do usuário na sessão
    header("Location: grafico.html");
} else {
    // Credenciais inválidas
    $_SESSION['erro'] = "Usuário ou senha incorretos";
    header("Location: login.php");
}

// Fechar a conexão
$conn->close();
?>
