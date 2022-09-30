<?php
include 'mainAdmin.php';
$obj1=new validation();
if($obj1->adminLoggedinValidate()==false)
{
    header('location:adminLogin.php');
}
$obj=new admin($_POST);
$obj->create("BLOG");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE BLOG</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <article>
            <section class="frontpage">
                    <form action="" method="post">
                        <div class="todo">
                            <h1>
                                Welcome
                            </h1>
                            <label>Tilte</label>
                            <input type="text" name="title" id="fname"/>
                            <?php
                           if(!empty($error['title']))
                           {
                               echo $error['title'];
                           }
                            ?>
                            <label>Description</label>
                            <textarea name="description" id="" cols="50" rows="15"></textarea>
                            <?php
                            if(!empty($error['description']))
                            {
                                echo $error['description'];
                            }
                            ?>
                            <input type="submit" value="create" name="createBlog" class="add"/>
                            <?php echo "<a href='view.php?UID=".$_GET['UID']."'>";?>
                            <input type="button" value="BACK" class="backButton"></a>
                        </div>
                    </form>
            </section>
        </article>
    </main>  
</body>
</html>