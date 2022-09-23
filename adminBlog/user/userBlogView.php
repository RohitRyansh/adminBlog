<link rel="stylesheet" href="../css/style.css">
<div class="view">
    <h2>
        <u>TITLES</u>
</h2>
<?php
include 'mainPage.php';
$obj=new signupLogin();
db::$sql=db::$dbConn->query("SELECT * FROM BLOG");
db::$sql=db::$sql->fetchAll();
foreach(db::$sql as $val)
{
    if($val['STATUS']==1)
    {
    echo "<a href='blogDescription.php?ID=".$val['ID']."'>{$val['TITLE']}<BR><BR>"; 
    }
    else
    {
    echo "<h2>No Blog Available</h2>"; 
    }
}
?>
<div class="ViewButtons">
    <?php
    echo " <td><a href='logout.php?ID=".$val['ID']."'><button>LOGOUT</button></a></td>";
        ?>
    </div>
</div>