<?php
include 'mainPage.php';
$obj=new signupLogin();    
$obj->likeCount($_GET['ID']);
header('location:blogDescription.php');
?>