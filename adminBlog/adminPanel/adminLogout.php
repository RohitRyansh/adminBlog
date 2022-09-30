<?php
include 'mainAdmin.php';
$obj1=new validation();
    if($obj1->adminLoggedinValidate()==true)
    {
        unset($_SESSION['adminLogged']);
    }
if(isset($_GET['UID']))
{
    $sql=null;
    header('location:adminLogin.php');
}
?>