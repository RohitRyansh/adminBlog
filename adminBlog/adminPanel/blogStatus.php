<?php
include 'mainAdmin.php';
$obj1=new validation();
if($obj1->adminLoggedinValidate()==false)
{
    header('location:adminLogin.php');
}
$obj=new admin();    
$obj->status("BLOG",$_GET['ID']);
header('location:viewBlog.php?UID='.$_GET['UID']);
?>