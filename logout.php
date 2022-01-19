<?php
session_start();

require_once 'class/login.php';
$login = new login();
$login->logout();


?>