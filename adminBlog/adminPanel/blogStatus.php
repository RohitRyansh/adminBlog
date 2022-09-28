<?php
include 'mainAdmin.php';
$obj=new admin();    
$obj->status("BLOG",$_GET['ID']);
header('location:viewBlog.php?UID='.$_GET['UID']);
?>