<?php
include 'mainAdmin.php';
$obj1=new validation();
if($obj1->adminLoggedinValidate()==false)
{
    header('location:adminLogin.php');
}
if(isset($_POST['create']))
{
$obj=new admin($_POST);
$obj->create("USERCREATE");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE USER</title>
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
                   <!-- sign up page -->
                        <form action="" method="post">
                            <h2>
                                Create a new User
                            </h2>      
                            <section class="name">
                                <section>
                                    <input type="text" name="NAME" id="name" placeholder="Name">
                                    <?php
                                    if(!empty($error['NAME']))
                                    {
                                        echo $error['NAME'];
                                    }
                                    ?>
                                </section>
                            </section>
                                    <input type="EMAIL" name="EMAIL" id="EMAIL" placeholder="EMAIL">
                                    <?php
                                    if(!empty($error['EMAIL']))
                                    {
                                        echo $error['EMAIL'];
                                    }
                                    ?>
                                    <input type="PASSWORD" name="PASSWORD" id="PASSWORD" placeholder="PASSWORD"> 
                                    <?php
                                    if(!empty($error['PASSWORD']))
                                    {
                                        echo $error['PASSWORD'];
                                    }
                                    $error=null;
                                    ?>
                            <input type="submit" value="create" name="create" class="submit">
                            <?php echo "<a href='view.php?UID=".$_GET['UID']."'>";?>
                            <input type="button" value="BACK" class="backButton"></a>
                            <hr>
                        </form> 
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>
