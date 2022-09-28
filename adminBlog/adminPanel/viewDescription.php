<link rel="stylesheet" href="../css/style.css">
<div class="view">
    <h2>
        <u>Data Description</u>
    </h2>
<?php
include 'mainAdmin.php';
$obj=new admin();
$id=$_GET['ID'];
$sql=db::$dbConn->query("SELECT DESCRIPTION FROM BLOG WHERE ID='$id'");
$sql=$sql->fetchAll(PDO::FETCH_ASSOC);
if($sql)
{
    echo $sql[0]['DESCRIPTION'];
}
echo "<div class=\"blogButtons\">";
echo " <a href='viewBlog.php?UID=".$_GET['UID']."'><button>BACK</button></a>";
echo " <a href='adminLogout.php?UID=".$_GET['UID']."'><button>LOGOUT</button></a>";
echo"</div>";
?>