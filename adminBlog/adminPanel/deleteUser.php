<?php
include 'mainAdmin.php';
$obj=new admin();
$obj->delete("USERCREATE",$_GET['ID']);
header('location:viewUser.php');
?>