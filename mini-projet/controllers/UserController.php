<?php

require 'AbstractController.php';

class UserController extends AbstractController{
    
    private UserManager $manager;
    
    public function __construct(){
        
        $this->manager = UserManager();
        
    }
    
    public function index() : void
    {
        
        render('index', $this->manager->getAllUsers());
        
    }
    
    public function create(array $post) : array
    {
        
        foreach($post as $value){
            
            $hash_password = password_hash($value['password'], PASSWORD_DEFAULT);
            $newUser = new User($value['firstName'], $value['lastName'], $value['email'], $hash_password);
            $this->manager->insertUser($newUser);
        }
        
        render('create', []);

    }
    
    public function edit(array $post) : array
    {
     
        foreach($post as $value)
        {
            
            $hash_password = password_hash($value['password'], PASSWORD_DEFAULT);
            $newUser = new User($value['firstName'], $value['lastName'], $value['email'], $hash_password);
            $this->manager->edittUser($newUser); 
            
            
        }
        
        render('edit', []);
     
        
    }
}


?>