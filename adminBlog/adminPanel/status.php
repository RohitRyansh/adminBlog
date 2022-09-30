<?php
include 'mainAdmin.php';
$obj1=new validation();
if($obj1->adminLoggedinValidate()==false)
{
    header('location:adminLogin.php');
}
$obj=new admin();    
$obj->status("USERCREATE",$_GET['ID']);
header('location:viewUser.php?UID='.$_GET['UID']);
?>