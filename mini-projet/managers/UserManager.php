<?php

require 'AbstractManager.php';

class UserManager extends AbstractManager{
    
    public function __construct(string $dbName, string $port, string $host, string $username, string $password)
    {
        $this->dbName = $dbName;//'';
        $this->port = $port;//'';
        $this->host = $host;//'';
        $this->username = $username;//'';
        $this->password = $password;//'';
        
    }
    
    public function getAllUsers() : array
    {
        
        $query = $db->prepare('SELECT * FROM users');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return($users);
    }
    
    public function getUserById(int $id) : User
    {
        
        $query = $db->prepare('SELECT * FROM users WHERE id = :id');
        $parameters = [
        'id' => $_GET['id']
        ];
        $query->execute($parameters);
        $movie = $query->fetch(PDO::FETCH_ASSOC);
        
    }
    
    public function insertUser(User $user) : User
    {
        
        $query = $db->prepare('INSERT INTO users (id, email, user, password) VALUES (null, :email, :user, :password) ');

        $parameters = [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'user' => $user->getUsername(),
            'password' => $user->getPassword()
            ];
            
        $query->execute($parameters);
        
        $id = $this->$db->lastInsertId('users');
        
        return getUserById($id);
        
    }
    
    public function editUser(User $user) : void
    {
        
        $query = $db->prepare('UPDATE users SET email = :email, user = :user, password = :password WHERE id = :id');

        $parameters = [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'user' => $user->getUsername(),
            'password' => $user->getPassword()
            ];
            
        $query->execute($parameters);
        
        
    }
}
?>