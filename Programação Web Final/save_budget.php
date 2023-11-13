<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $observations = $_POST["observations"];

    $file = fopen("budgets.txt", "a");
    fwrite($file, "Nome: $firstName\n");
    fwrite($file, "Sobrenome: $lastName\n");
    fwrite($file, "Email: $email\n");
    fwrite($file, "Observações: $observations\n");
    fwrite($file, "------------------------\n");
    fclose($file);

    $success = true; // Supondo que o envio foi bem-sucedido e a variável $success é definida como true.

    if ($success) {
        echo "<script>
        window.location.href = 'index.html';
        alert('Orçamento enviado com sucesso!');
        </script>";
    }
}
?>