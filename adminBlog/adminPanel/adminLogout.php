<?php
include 'mainAdmin.php';
if(isset($_GET['ID']))
{
    admin::$sql=null;
    header('location:adminLogin.php');
}
?>