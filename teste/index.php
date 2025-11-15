<?php
session_start();

$resultado_post = "";
$resultado_get = "";

// --- PROCESSA POST ---
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $valor1 = isset($_POST['valor1']) ? floatval(trim($_POST['valor1'])) : 0;
    $valor2 = isset($_POST['valor2']) ? floatval(trim($_POST['valor2'])) : 0;
    $valor3 = isset($_POST['valor3']) ? floatval(trim($_POST['valor3'])) : 0;

    if ($valor1 == 0) {
        $resultado_post = "❌ Erro: Valor 1 não pode ser zero.";
    } else {
        $resultado = ($valor2 * $valor3) / $valor1;
        $_SESSION['ultimo_resultado'] = $resultado;
        setcookie("ultimo_calculo", $resultado, time() + 3600, "/");
        $resultado_post = "✅ Resultado do cálculo: <strong>$resultado</strong><br>
                           Valor salvo na sessão: <strong>{$_SESSION['ultimo_resultado']}</strong><br>
                           Valor salvo no cookie (disponível na próxima requisição): <strong>" 
                           . ($_COOKIE['ultimo_calculo'] ?? 'ainda não disponível') . "</strong>";
    }
}

// --- PROCESSA GET ---
if (isset($_GET['dados'])) {
    $dados = htmlspecialchars(trim($_GET['dados']));
    $resultado_get = "📩 Dados recebidos via GET: <strong>$dados</strong>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Exemplo POST e GET</title>
<style>
body { font-family: Arial, sans-serif; margin: 40px; background: #f8f8f8; }
.container { background: #fff; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
input { margin: 5px 0; padding: 5px; width: 100%; }
h2 { color: #333; }
.resultado { margin-top: 20px; background: #eef; padding: 10px; border-radius: 5px; }
</style>
</head>
<body>

<div class="container">
    <h2>Formulário de cálculo (POST)</h2>
    <form method="POST" action="">
        <label>Valor 1:</label><br>
        <input type="number" name="valor1" step="any" required><br>
        <label>Valor 2:</label><br>
        <input type="number" name="valor2" step="any" required><br>
        <label>Valor 3:</label><br>
        <input type="number" name="valor3" step="any" required><br>
        <button type="submit">Calcular (POST)</button>
    </form>

    <hr>

    <h2>Enviar dados via GET</h2>
    <form method="GET" action="">
        <label>Informe algo:</label><br>
        <input type="text" name="dados" required><br>
        <button type="submit">Enviar (GET)</button>
    </form>

    <div class="resultado">
        <?php
        if ($resultado_post) echo "<p>$resultado_post</p>";
        if ($resultado_get) echo "<p>$resultado_get</p>";
        if (!$resultado_post && !$resultado_get) echo "<p>Nenhum resultado ainda. Envie um formulário acima.</p>";
        ?>
    </div>
</div>

</body>
</html>
