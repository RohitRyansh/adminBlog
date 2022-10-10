
<?php
include 'mainAdmin.php';
$obj1=new validation();
if($obj1->adminLoggedinValidate()==false)
{
    header('location:adminLogin.php');
}
$byDefault=array();
$obj=new admin();
$id=$_GET['ID'];
if(isset($_POST['editUser']))
{
$obj=new admin($_POST);
$obj->update($id,$_GET['UID']);
}
$sql=db::$dbConn->query("SELECT * FROM USERCREATE WHERE ID='$id'");
$sql=$sql->fetchAll(PDO::FETCH_ASSOC);
if($sql)
{
    $byDefault=$sql;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <!-- heading -->
    <header>
        <nav>
            <h1>
                WELCOME
            </h1>
        </nav>
    </header>
    <main>
        <article>
            <section>
                <div class="signup">
                    <div class="text2"> 
                        <form action="" method="post">
                            <h2>
                                EDIT User
                            </h2>      
                            <section class="name">
                                <section>
                                <input type="text" name="NAME" value=<?php echo isset($byDefault[0]['NAME'])?$byDefault[0]['NAME']:null?>>
                                <?php
                                    if(!empty($error['NAME']))
                                {
                                    echo $error['NAME'];
                                }
                                ?>
                                </section>
                            </section>
                                <input type="EMAIL" name="EMAIL" value=<?php echo isset($byDefault[0]['EMAIL'])?$byDefault[0]['EMAIL']:null?>>
                                <?php
                                if(!empty($error['EMAIL']))
                                {
                                    echo $error['EMAIL'];
                                }
                                ?>
                                <input type="PASSWORD" name="PASSWORD" value=<?php echo isset($byDefault[0]['PASSWORD'])?$byDefault[0]['PASSWORD']:null?>> 
                                <?php
                                if(!empty($error['PASSWORD']))
                                {
                                    echo $error['PASSWORD'];
                                }
                                    $error=null;
                                    ?>
                            <input type="submit" value="save" name="editUser" class="submit">
                        </form> 
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>

