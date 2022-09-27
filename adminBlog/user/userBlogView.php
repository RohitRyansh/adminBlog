<link rel="stylesheet" href="../css/style.css">
<div class="view">
    <h2>
        <u>TITLES</u>
    </h2>
<?php
    include 'mainPage.php';
    $obj=new signupLogin();
    $sql1=db::$dbConn->query("SELECT * FROM BLOG WHERE STATUS=1");
    $sql1=$sql1->fetchAll(PDO::FETCH_ASSOC);
    if($sql1)
    {
    echo " <a href='blogDescription.php?ID=".$sql1[0]['ID']."&UID=".$_GET['ID']."'>{$sql1[0]['TITLE']}<BR><BR>"; 
    }
?>
    <div class="ViewButtons">
        <?php
        echo " <td><a href='logout.php?ID=".$sql1[0]['ID']."'><button>LOGOUT</button></a></td>";
        ?>
    </div>
</div>