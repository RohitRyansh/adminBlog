<?php
include 'mainAdmin.php';
$obj=new admin();
$obj->delete("ADMIN",$_GET['ID']);

?>