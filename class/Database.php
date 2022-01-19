<?php
class Database
{
  public function Database(){
      $host_name = 'localhost';
      $user_name = 'root';
      $password = '';
      $database_name = 'blog';

      $conn = mysqli_connect($host_name, $user_name, $password, $database_name);
      if (!$conn) {
          die('connection failed' . mysqli_error($conn));
      }
      return $conn;

  }
}