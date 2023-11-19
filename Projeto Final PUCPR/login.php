<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Agrosafe</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-card">
        <div class="logo-container">
            <img src="images/Logo.png" alt="Logo Agrosafe" class="logo">
        </div>
        <div id="error-message" style="color: red;">
            <?php
            session_start();
            if (isset($_SESSION['erro'])) {
                echo $_SESSION['erro'];
                unset($_SESSION['erro']); // Limpar a mensagem de erro da sessão
            }
            ?>
        </div>
        <form class="form-login" method="post" action="processa_login.php">
            <input type="text" placeholder="Usuário" id="usuario" name="usuario" required />
            <input type="password" placeholder="Senha" id="senha" name="senha" required />
            <button type="submit">LOGIN</button>
        </form>

        <script>
            var form = document.querySelector(".form-login");
            var errorMessage = document.getElementById("error-message");

            form.addEventListener("submit", function(event) {
                // Limpa mensagens de erro existentes
                errorMessage.textContent = "";

                // Valida se o usuário e a senha foram preenchidos
                var usuarioInput = document.getElementById("usuario");
                var senhaInput = document.getElementById("senha");

                if (usuarioInput.value === "" || senhaInput.value === "") {
                    errorMessage.textContent = "Por favor, preencha todos os campos.";
                    event.preventDefault(); // Impede o envio do formulário se houver erro
                }
            });
        </script>
    </div>
</body>
</html>
