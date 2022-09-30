<?php
include 'mainPage.php';
$obj1=new validation();
    if($obj1->userLoggedinValidate()==true)
    {
        unset($_SESSION['userLogged']);
    }
if(isset($_GET['UID']))
{
    $sql=null;
    header('location:index.php');
}
?>