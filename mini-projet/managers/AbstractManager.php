<?php 

abstract class AbstractManager{
    
    protected PDO $db;
    protected string $dbName;
    protected string $port;
    protected string $host;
    protected string $username;
    protected string $password;
    
    
    
    protected function initDb() : PDO
    {
        
        $this->db = new PDO(
                        "mysql:host=$host;port=$port;dbname=$dbname",
                        $user,
                        $password
                    );
        
        
    }
}

?>