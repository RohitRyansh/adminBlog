<?php
include 'mainAdmin.php';
$obj1=new validation();
if($obj1->adminLoggedinValidate()==false)
{
    header('location:adminLogin.php');
}
?>
<link rel="stylesheet" href="../css/style.css">
<div class="viewAdmin">
    <h1>
        <u>WELCOME</u>
    </h1>
    <H2>
        ADMIN PANEL
    </H2>
    <div class="table">
<?php
echo "<table cellspacing=5 border=1px > <tr>  <th>ID</th> <th>NAME</th> <th>EMAIL</th> <th>DELETE</th> <th>STATUS</th></tr>"; 
$obj=new admin($_POST);
$obj->view("USERCREATE",$_GET['UID']);
?>
