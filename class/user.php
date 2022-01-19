<?php

require_once 'Database.php';
class user extends Database {
    
    protected $connection;

    public function __construct() {
        $this->connection=$this->Database();
    }
    
    public function user_login($data)
    {
        $sql = "SELECT* FROM user_registration WHERE user_email='$data[email]' AND user_password='$data[pass]'";
        
        $query_result = mysqli_query($this->connection,$sql);
        $user_info = mysqli_fetch_assoc($query_result);
        
        if($user_info)
        {
            session_start();
            $_SESSION['user_id']=$user_info['user_id'];
            $_SESSION['user_name']=$user_info['user_name'];
            header('Location:dashboard.php');
            
        } else {
        
            header('Location:index.php?error=1');
            
        }
        
    }
    
    
    
    
}
