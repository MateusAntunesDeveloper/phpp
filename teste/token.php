<?php
session_start();

function Method_Post(){
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
        $valor1 = isset($_POST['valor1']) ? trim($_POST['valor1']) : '';
        $valor3 = isset($_POST['valor3']) ? trim($_POST['valor3']) : '';
        $valor2 = isset($_POST['valor2']) ? trim($_POST['valor2']) : '';


        if ($valor1 != 0) {
            $resultado2 = ($valor2 * $valor3) / $valor1;

            $_SESSION['ultimo_resultado'] = $resultado2;
            setcookie("ultimo_calculo", $resultado2, time() + 3600, "/");

            echo "<h3>Resultado: $resultado2</h3>";
            echo "<p><a href='form.html'>Voltar</a></p>";
            echo "<p>Resultado armazenado na sessão e cookie!</p>";
            echo "<hr>";
            echo "<strong>Valor salvo na sessão:</strong> " . $_SESSION['ultimo_resultado'] . "<br>";
            echo "<strong>Valor salvo no cookie (disponível na próxima requisição):</strong> " . ($_COOKIE['ultimo_calculo'] ?? 'ainda não disponível') . "<br>";
       

        } else {
            echo "Erro: Valor 1 não pode ser zero.";
        }
    } else {
        echo "Envie o formulário primeiro.";
    }
}

function Method_Get(){
    if(isset($_GET['dados'])){
        echo "methodo via get" . trim(htmlspecialchars($_GET['dados']));
    }else{
        echo XML_ERROR_BAD_CHAR_REF;
    }

}
Method_Post();
Method_Get();
?>