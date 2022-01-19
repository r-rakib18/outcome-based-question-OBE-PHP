<?php

if (isset($_GET['id'])){
    require_once '../class/admin.php';
    $status_id=$_GET['id'];
    $status =new admin();

    $status->Status($status_id);

}


?>