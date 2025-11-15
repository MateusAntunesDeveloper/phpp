<?php
class Table_for_loggin {
    public $user;
    public $gmail;
    public $password;

    public function __construct($user, $gmail, $password) {
        $this->user = $user;
        $this->gmail = $gmail;
        $this->password = $password;
    }

    public function loggin() {
        echo "<p><strong>User:</strong> {$this->user}<br>";
        echo "<strong>Gmail:</strong> {$this->gmail}<br>";
        echo "<strong>Password:</strong> {$this->password}</p>";
    }
}

$dados = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['user'] ?? '';
    $gmail = $_POST['gmail'] ?? '';
    $password = $_POST['password'] ?? '';

    $dados[] = new Table_for_loggin($user, $gmail, $password);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login Simulation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 40px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: auto;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }
        button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
        }
        .result {
            background: #e7ffe7;
            border: 1px solid #b3ffb3;
            padding: 10px;
            margin-top: 20px;
            max-width: 400px;
            margin: 20px auto;
        }
    </style>
</head>
<body>

<h2>Formulário de Login</h2>

<form method="POST" action="">
    <label>Usuário:</label>
    <input type="text" name="user" required>

    <label>Gmail:</label>
    <input type="email" name="gmail" required>

    <label>Senha:</label>
    <input type="password" name="password" required>

    <button type="submit">Enviar</button>
</form>

<?php if (!empty($dados)): ?>
    <div class="result">
        <h3>Dados Inseridos:</h3>
        <?php
            foreach ($dados as $item) {
                $item->loggin();
            }
        ?>
    </div>
<?php endif; ?>

</body>
</html>
