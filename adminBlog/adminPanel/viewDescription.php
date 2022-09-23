<link rel="stylesheet" href="../css/style.css">
<div class="view">
    <h2>
        <u>Data Description</u>
    </h2>
<?php
include 'mainAdmin.php';
$obj=new admin();
admin::$sql=db::$dbConn->query("SELECT * FROM BLOG");
admin::$sql=admin::$sql->fetchAll();
foreach(admin::$sql as $value1){
    if($value1['ID']==$_GET['ID'])
    {
        echo $value1['DESCRIPTION'];
    }
}
echo "<div class=\"blogButtons\">";
echo " <a href='viewBlog.php'><button>BACK</button></a>";
echo " <a href='adminLogout.php?ID=".$value1['ID']."'><button>LOGOUT</button></a>";
echo"</div>";
?>