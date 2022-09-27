<link rel="stylesheet" href="../css/style.css">
<div class="view">
<?php
    include 'mainPage.php';
    $obj=new signupLogin();
    $id=$_GET['ID'];
    $sql1=db::$dbConn->query("SELECT ID,TITLE,DESCRIPTION FROM BLOG WHERE ID='$id'");
    $sql1=$sql1->fetchAll(PDO::FETCH_ASSOC);
    if($sql1)
    {
        echo "<h2>TITLE</h2>";
        echo "<pre>{$sql1[0]['TITLE']} </pre>";
        echo "<h2>Description</h2>";
        echo "<pre>{$sql1[0]['DESCRIPTION']}</pre>";
    }
?>
    <div class="ViewButtons2">
    <?php 
        echo "
        <td><a href='likeCount.php?ID=".$sql1[0]['ID']."&UID=".$_GET['UID']."'><button>LIKE</button></a></td>
        <td><a href='dislikeCount.php?ID=".$sql1[0]['ID']."&UID=".$_GET['UID']."'><button>DISLIKE</button></a></td>
        <td><a href='userBlogView.php?ID=".$sql1[0]['ID']."&UID=".$_GET['UID']."'><button>BACK</button></a></td>
        <td><a href='logout.php?ID=".$_GET['ID']."'><button>LOGOUT</button></a></td>";
    ?>
    </div>
</div>
