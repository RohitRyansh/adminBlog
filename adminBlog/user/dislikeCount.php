<?php
include 'mainPage.php';
$obj1=new validation();
    if($obj1->userLoggedinValidate()==false)
    {
        header('location:Login.php');
    }
$obj=new signupLogin();  
$obj->dislikeCount($_GET['ID'],$_GET['UID']);
?>