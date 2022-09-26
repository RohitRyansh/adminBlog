<?php
include 'mainPage.php';
$obj=new signupLogin();
$obj->likeCount($_GET['ID'],$_GET['UID']);
?>