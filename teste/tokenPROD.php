<?php

session_start();

function handlePost() {
    $valor1 = filter_input(INPUT_POST, 'valor1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $valor2 = filter_input(INPUT_POST, 'valor2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $valor3 = filter_input(INPUT_POST, 'valor3', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if ($valor1 == 0) {
        echo "Erro: Valor 1 não pode ser zero.";
        return;
    }

    if ($valor1 === null || $valor2 === null || $valor3 === null) {
        echo "Erro: Todos os valores devem ser preenchidos.";
        return;
    }

    $resultado = ($valor2 * $valor3) / $valor1;
    $_SESSION['ultimo_resultado'] = $resultado;
    setcookie("ultimo_calculo", $resultado, time() + 3600, "/");

    echo "<h3>Resultado: " . htmlspecialchars($resultado) . "</h3>";
    echo "<p><a href='form.html'>Voltar</a></p>";
    echo "<p>Resultado armazenado na sessão e cookie!</p>";
}

function handleGet() {
    $dados = filter_input(INPUT_GET, 'dados', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($dados) {
        echo "Método via GET: $dados";
    } else {
        echo "Nenhum dado enviado via GET.";
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    handlePost();
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    handleGet();
}
?>
