
<?php
include 'mainAdmin.php';
$byDefault=array();
$idCount=0;
$obj=new admin($_POST);
admin::$sql=db::$dbConn->query("SELECT * FROM BLOG");
admin::$sql=admin::$sql->fetchAll();
foreach(admin::$sql as $key=>$value)
{
    if($value['ID']==$_GET['ID'])
    {
        $byDefault=$value;
        $idCount=0;   
        break;
    }
    else
    {
        $idCount++;
    } 
}
if(isset($_POST['editBlog']))
{
    $error=$obj->Validate($_POST,admin::$sql);
    if(!empty($error))
    {            
        header('location:editBlog.php?ID='.$_GET['ID']);
    }
    else
    {
    foreach(admin::$sql as $key=>$value)
        {
            if($value['ID']==$_GET['ID'])
            {     
                admin::$sql[$key]=$_POST;
                admin::$sql[$key]['ID']=$_POST['editBlog'];  
                $obj->update($_GET['ID']);
                header('location:viewBlog.php');
            }
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
                    <input type="text" name="title" value=<?php echo isset($byDefault['TITLE'])?$byDefault['TITLE']:null?>>
                    <?php
                        if(!empty($error['title']))
                    {
                        echo $error['title'];
                    }
                    ?>
                    <label>DESCRIPTION</label>
                    <textarea name="description"  cols="50" rows="15" ><?php echo isset($byDefault['DESCRIPTION'])?$byDefault['DESCRIPTION']:null?></textarea>
                    <?php
                    if(!empty($error['description']))
                    {
                        echo $error['description'];
                    }
                    ?>
                    <input type="submit"  name="editBlog" value="Save" class="add">
                    <a href="viewBlog.php"><input type="button" value="BACK" class="backButton"></a>

                </div>
            </form>
    </section> 
</main>     
</body>
</html>

