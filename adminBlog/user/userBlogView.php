<link rel="stylesheet" href="../css/style.css">
<div class="view">
    <h2>
        <u>TITLES</u>
</h2>
<?php
include 'mainPage.php';
$obj=new signupLogin();
$sql1=db::$dbConn->query("SELECT * FROM BLOG");
$sql1=$sql1->fetchAll(PDO::FETCH_ASSOC);
foreach($sql1 as $val)
{
    if($val['STATUS']==1)
    {
    echo " <a href='blogDescription.php?ID=".$val['ID']."&UID=".$_GET['ID']."'>{$val['TITLE']}<BR><BR>"; 
    }
}
?>
<div class="ViewButtons">
    <?php
    echo " <td><a href='logout.php?ID=".$val['ID']."'><button>LOGOUT</button></a></td>";
        ?>
    </div>
</div>