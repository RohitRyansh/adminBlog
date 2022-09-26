
<?php
include 'mainAdmin.php';
$byDefault=array();
$idCount=0;
$obj=new admin($_POST);
$id=$_GET['ID'];
$sql=db::$dbConn->query("SELECT * FROM BLOG WHERE ID='$id'");
$sql=$sql->fetchAll(PDO::FETCH_ASSOC);
    if($sql)
    {
        $byDefault=$sql;
        $idCount=0;
    }
    else
    {
        $idCount++;
    } 
if(isset($_POST['editBlog']))
{
    if(!empty($error))
    {            
        header('location:editBlog.php?ID='.$_GET['ID']);
    }
    else
    {
        if($id)
        {
        $sql=$_POST;
        $sql['ID']=$_POST['editBlog'];  
        $obj->update($_GET['ID']);
        header('location:viewBlog.php?ID='.$_GET['ID']);
        }  
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Blog</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<main>
    <section class="frontpage">
            <form action="editBlog.php?ID=<?php echo $_GET['ID'];?>" method="post">
                <div class="todo">
                    <h2>
                        Edit blog
                    </h2>
                    <label>TITLE</label>
                    <input type="text" name="title" value=<?php echo isset($byDefault[0]['TITLE'])?$byDefault[0]['TITLE']:null?>>
                    <?php
                        if(!empty($error['title']))
                    {
                        echo $error['title'];
                    }
                    ?>
                    <label>DESCRIPTION</label>
                    <textarea name="description"  cols="50" rows="15" ><?php echo isset($byDefault[0]['DESCRIPTION'])?$byDefault[0]['DESCRIPTION']:null?></textarea>
                    <?php
                    if(!empty($error['description']))
                    {
                        echo $error['description'];
                    }
                    ?>
                    <input type="submit"  name="editBlog" value="Save" class="add">
                </div>
            </form>
    </section> 
</main>     
</body>
</html>

