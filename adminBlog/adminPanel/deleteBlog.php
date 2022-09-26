<?php
include 'mainAdmin.php';
$obj=new admin();
$obj->delete("BLOG",$_GET['ID']);
header('location:viewBlog.php?ID='.$_GET['ID']);
?>