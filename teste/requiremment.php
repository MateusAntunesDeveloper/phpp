<?php 

if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        if(isset($_POST['p_method']) && isset($_POST['i_method']) && isset($_POST['t_method']) && isset($_POST['m_method']))
            {
                $t_method = $_POST['t_method'];
                $p_method = $_POST['p_method'];
                $i_method = $_POST['i_method'];                
                $m_method = $_POST['m_method'];
            }
    
        $juros_simples = $p_method * $i_method * $t_method;

        $juros_compostos = $p_method * $m_method * (1 + $i_method ** $t_method);
    
        echo "$juros_simples ------ $juros_compostos";

    }else{
       echo "<br><h1>Erro 403, nao validado o metodo post para envio</h1><br>";
    }





?>