<?php 

if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        if(isset($_POST['nt']) && isset($_POST['np']) && isset($_POST['new']))
        {
            $np = $_POST['np'];
            $nt = $_POST['nt'];
            $new = $_POST['new'];


        }
    



        $result = ($np / 100) * $nt;

        $new = $result * ($nt + ($np / 100));


        echo "$result ----- $new";

    }else{
       echo "<br><h1>Erro 403, nao validado o metodo post para envio</h1><br>";
    }





?>