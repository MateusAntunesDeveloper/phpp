<?php
include 'info.php'; // inclui a classe, se estiver em outro arquivo

$dados = []; // array para guardar objetos

// Checa se os dados vieram do POST
if (isset($_POST['user']) && isset($_POST['gmail']) && isset($_POST['password'])) {

    // Loop pelo array enviado
    for ($i = 0; $i < count($_POST['user']); $i++) {
        $user = $_POST['user'][$i];
        $gmail = $_POST['gmail'][$i];
        $password = $_POST['password'][$i];

        // Cria objeto e adiciona ao array
        $dados[] = new Table_for_loggin($user, $gmail, $password);
    }
}

// Mostra os dados
foreach ($dados as $obj) {
    $obj->loggin();
}
?>
