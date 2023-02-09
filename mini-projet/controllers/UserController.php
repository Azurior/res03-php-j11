<?php

require 'AbstractController.php';

class UserController extends AbstractController{
    
    private UserManager $manager;
    
    public function __construct(){
        
        $this->manager = UserManager();
        
    }
    
    public function index() : void
    {
        $userManager = new UserManager('tonygohin_phpj11', '3306', 'db.3wa.io', 'tonygohin', 'f80620de30f1b8d1caba3a7e4b950a9a');
        $userManager->initDb();
        $this->render('index', ['users' => $userManager->getAllUsers()]);
        
    }
    
    public function create(array $post) : array
    {
        
        $userManager = new UserManager('tonygohin_phpj11', '3306', 'db.3wa.io', 'tonygohin', 'f80620de30f1b8d1caba3a7e4b950a9a');
        $userManager->initDb();
        foreach($post as $value){
            
            $hash_password = password_hash($value['password'], PASSWORD_DEFAULT);
            $newUser = new User($value['firstName'], $value['lastName'], $value['email'], $hash_password);
            $userManager->insertUser($newUser);
        }
        
        $this->render('create', []);

    }
    
    public function edit(array $post) : array
    {
     
        $userManager = new UserManager('tonygohin_phpj11', '3306', 'db.3wa.io', 'tonygohin', 'f80620de30f1b8d1caba3a7e4b950a9a');
        $userManager->initDb();
        foreach($post as $value)
        {
            
            $hash_password = password_hash($value['password'], PASSWORD_DEFAULT);
            $newUser = new User($value['firstName'], $value['lastName'], $value['email'], $hash_password);
            $userManager->edittUser($newUser); 
            
            
        }
        
        $this->render('edit', []);
     
        
    }
}


?>