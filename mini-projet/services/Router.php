<?php

require 'controllers/UserController.php';

class Router{
    
    private UserController $uc;
    
    public function __construct()
    {
        $this->uc = UserController();
    }
    
    
    public function checkRoute(string $route) : void
    {
        if($route === "users"){
            
            $this->uc->index();
            
        }else if($route === "create"){
            
            $this->uc->create();
            
        }else if($route === "edit"){
            
            $this->uc->edit();
            
        }else{
            
            $this->uc->index();
            
        }
        
    }
}



?>