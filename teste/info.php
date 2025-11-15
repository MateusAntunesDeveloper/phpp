<?php
session_start();
    class Table_for_loggin{
        public $user;
        public $gmail;
        public $password;
 
        public function __construct($user, $gmail, $password)
        {
            $this->user = $user;
            $this->gmail = $gmail;
            $this->password = $password;
        }
 
        public function loggin(){
            echo ": {$this->user}\n {$this->gmail}\n {$this->password}\n";
        }
    }
    $dados = []; 
        $dados[] = new Table_for_loggin('jaja', 'jaja@gmail.com', 'XDwsfWwdd232swe24asDfSfw1z');
    
        
        


    foreach ($dados as $key) {
        echo "------<br>-----------<br>";
        echo "User: {$key->user}\n";
        echo "Gmail: {$key->gmail}\n";
        echo "Password: {$key->password}\n";
        echo "------<br>-----------<br>";
    }

?>