<?php
include 'mainAdmin.php';
$obj=new admin();    
$obj->status("USERCREATE",$_GET['ID']);
header('location:viewUser.php?ID='.$_GET['ID']);
?>