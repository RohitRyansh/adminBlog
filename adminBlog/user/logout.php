<?php
include 'mainPage.php';
if(isset($_GET['ID']))
{
    db::$sql=null;
    header('location:index.php');
}
?>