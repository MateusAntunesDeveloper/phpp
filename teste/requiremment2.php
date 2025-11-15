<?php 


if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        if(isset($_POST['numTotal']) && isset($_POST['numPortagem']))
            {
                $numTotal = $_POST['numTotal'];
                $numPortagem = $_POST['numPortagem'];

            }
    

        $resultado = ($numPortagem / 100) * $numTotal;

        echo "$resultado";

    }else{
        echo "<br><h1>Erro 403, nao validado o metodo post para envio</h1><br>";
    }

?>