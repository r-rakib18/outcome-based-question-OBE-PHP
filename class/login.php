<?php
require_once 'Database.php';
class login extends Database {

    protected $connection;
    public function __construct() {
        $this->connection=$this->Database();
    }

    public function login_check($data) {
        
        $sql = "SELECT* FROM tbl_teacher WHERE teacher_email='$data[email]' AND password='$data[pass]' AND teacher_status='$data[status]'";

        $query_result = mysqli_query($this->connection,$sql);
        $admin_info = mysqli_fetch_assoc($query_result);

        if ($admin_info) {
            session_start();
            $_SESSION['teacher_id'] = $admin_info['teacher_id'];
            header("Location:layout.php?page=dashboard");
        }else{
                header('Location:index.php?error=1');
            }
            
       
        }
        
      
    public function logout() {
//        unset($_SESSION['teacher_id']);
            session_destroy();
        header("Location:login.php");
    }
    
    
    public function admin_login_check($data)
    {
        
        $sql = "SELECT* FROM admin WHERE admin_email='$data[email]' AND admin_password='$data[pass]'";

        $query_result = mysqli_query($this->connection, $sql);
        $admin_info = mysqli_fetch_assoc($query_result);

        if ($admin_info) {

            session_start();
            $_SESSION['admin_id'] = $admin_info['admin_id'];
            header("Location:admin_dashboard.php");
        }else{
                header('Location:../admin/index.php?error=1');
            }
        
    }
    
    public function admin_logout() {


        unset($_SESSION['admin_id']);
        header('Location:../admin/index.php');
    }
    

}
