<?php
include 'mainPage.php';
$obj=new signupLogin();    
$obj->dislikeCount($_GET['ID'],$_GET['UID']);
?>