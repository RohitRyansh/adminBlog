<link rel="stylesheet" href="../css/style.css">
<div class="viewDesc">
<?php
    include 'mainPage.php';
    $obj1=new validation();
    if($obj1->userLoggedinValidate()==false)
    {
        header('location:Login.php');
    }
    $obj=new signupLogin();
    $id=$_GET['ID'];
    $sql1=db::$dbConn->query("SELECT ID,TITLE,DESCRIPTION FROM BLOG WHERE ID='$id'");
    $sql1=$sql1->fetchAll(PDO::FETCH_ASSOC);
    if($sql1)
    {
        echo "<h2>TITLE</h2>";
        echo "<h3>{$sql1[0]['TITLE']} </h3>";
        echo "<h2>Description</h2>";
        echo "<i>{$sql1[0]['DESCRIPTION']}</i>";
    }
?>
    <div class="ViewButtons2">
    <?php 
        echo "
        <td><a href='likeCount.php?ID=".$sql1[0]['ID']."&UID=".$_GET['UID']."'><button>LIKE</button></a></td>
        <td><a href='dislikeCount.php?ID=".$sql1[0]['ID']."&UID=".$_GET['UID']."'><button>DISLIKE</button></a></td>
        <td><a href='userBlogView.php?ID=".$sql1[0]['ID']."&UID=".$_GET['UID']."'><button>BACK</button></a></td>
        <td><a href='logout.php?UID=".$_GET['UID']."'><button>LOGOUT</button></a></td>";
    ?>
    </div>
</div>
