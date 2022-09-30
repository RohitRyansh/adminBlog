<?php
include 'mainAdmin.php';
$obj1=new validation();
if($obj1->adminLoggedinValidate()==false)
{
    header('location:adminLogin.php');
}
?>

<link rel="stylesheet" href="../css/style.css">
<div class="viewDesc">
    <h2>
        <u>Data Description</u>
    </h2>
<?php
$obj=new admin();
$id=$_GET['ID'];
$sql=db::$dbConn->query("SELECT DESCRIPTION FROM BLOG WHERE ID='$id'");
$sql=$sql->fetchAll(PDO::FETCH_ASSOC);
if($sql)
{
    echo "<i>{$sql[0]['DESCRIPTION']}</i>";
}
echo "<div class=\"blogButtonDesc\">";
echo " <a href='viewBlog.php?UID=".$_GET['UID']."'><button>BACK</button></a>";
echo " <a href='adminLogout.php?UID=".$_GET['UID']."'><button>LOGOUT</button></a>";
echo"</div>";
?>