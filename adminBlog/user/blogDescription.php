<link rel="stylesheet" href="../css/style.css">
<div class="view">
<?php
 include 'mainPage.php';
 $obj=new signupLogin();
 db::$sql=db::$dbConn->query("SELECT * FROM BLOG");
 db::$sql=db::$sql->fetchAll();
 foreach(db::$sql as $val)
 {
    if($val['ID']==$_GET['ID'])
    {
        echo "<h2>TITLE</h2>";
        echo "<pre>{$val['TITLE']} </pre>";
        echo "<h2>Description</h2>";
        echo "<pre>{$val['DESCRIPTION']}</pre>";
    }    
 }

 ?>
 <div class="ViewButtons2">
     <?php
     echo "
 <td><a href='likeCount.php?ID=".$val['ID']."'><button>LIKE</button></a></td>
 <td><a href='../../adminPanel/subAdminView.php'><button>DISLIKE</button></a></td>
<td><a href='userBlogView.php'><button>BACK</button></a></td>
<td><a href='logout.php?ID=".$val['ID']."'><button>LOGOUT</button></a></td>";
    ?>
</div>
</div>
