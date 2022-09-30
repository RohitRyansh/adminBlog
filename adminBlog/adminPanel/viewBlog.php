<?php
include 'mainAdmin.php';
$obj1=new validation();
if($obj1->adminLoggedinValidate()==false)
{
    header('location:adminLogin.php');
}

?><link rel="stylesheet" href="../css/style.css">
<div class="view">
    <h2>
        <u>Data Description</u>
    </h2>
    <div class="table">
<?php
echo "<table cellspacing=5 border=1px > <tr>  <th>ID</th> <th>TITLE</th> <th>View</th> <th>Edit</th> <th>Delete</th> <th>Status</th></tr>"; 
$obj=new admin();
$obj->view("BLOG",$_GET['UID']);
?>