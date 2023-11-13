<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $usuarios = file("usuarios.txt");
    $valido = false;

    foreach ($usuarios as $linha) {
        list($u, $s) = explode(":", trim($linha));
        if ($usuario == $u && $senha == $s) {
            $valido = true;
            break;
        }
    }

    if ($valido) {
        header("Location: grafico.html");
        exit;
    } else {
        header("Location: login.html?erro=1");
        exit;
    }
}
?>
