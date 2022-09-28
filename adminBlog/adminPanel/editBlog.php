
<?php
include 'mainAdmin.php';
$byDefault=array();
$obj=new admin();
$id=$_GET['ID'];
if(isset($_POST['editBlog']))
{
$obj=new admin($_POST);
$obj->update($id,$_GET['UID']);
}
$sql=db::$dbConn->query("SELECT * FROM BLOG WHERE ID='$id'");
$sql=$sql->fetchAll(PDO::FETCH_ASSOC);
if($sql)
{
    $byDefault=$sql;
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
            <form action="" method="post">
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

