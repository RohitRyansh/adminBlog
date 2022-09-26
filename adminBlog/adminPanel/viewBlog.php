<link rel="stylesheet" href="../css/style.css">
<div class="view">
    <h2>
        <u>Data Description</u>
    </h2>
<?php
include 'mainAdmin.php';
echo "<table cellspacing=5 border=1px > <tr>  <th>ID</th> <th>TITLE</th> <th>View</th> <th>Edit</th> <th>Delete</th> <th>Status</th></tr>"; 
$obj=new admin();
$obj->viewUser("BLOG",$_GET['ID']);
?>