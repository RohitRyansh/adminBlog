<?php
include 'mainPage.php';
$obj1=new validation();
if($obj1->userLoggedinValidate()==false)
{
    header('location:Login.php');
}
?>
<link rel="stylesheet" href="../css/style.css">
<div class="viewDesc">
    <h2>
        <u>TITLES</u>
    </h2>
<?php
    $obj=new signupLogin();
    $sql1=db::$dbConn->query("SELECT ID,TITLE FROM BLOG WHERE STATUS=1");
    $sql1=$sql1->fetchAll(PDO::FETCH_ASSOC);
    foreach($sql1 as $val)
    {
        if($val)
        {
        echo "<H4><a href='blogDescription.php?ID=".$val['ID']."&UID=".$_GET['UID']."'>{$val['TITLE']}</H4><br><br>"; 
        }    
    }
    if(!$sql1)
    {
        echo "<H3><CENTER>NO BLOG AVAILABLE</CENTER></H3>";
    }
?>
    <div class="ViewButtonDesc">
        <?php
        echo " <td><a href='logout.php?UID=".$_GET['UID']."'><button>LOGOUT</button></a></td>";
        ?>
    </div>
</div>