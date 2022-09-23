<?php
include 'mainAdmin.php';
if(isset($_POST['createUser']))
{
$obj=new admin($_POST);
$obj->createUser();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <form action="createUser.php" method="post">
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
                            <input type="submit" value="sign up" name="createUser" class="submit">
                            <a href="view.php"><input type="button" value="BACK" class="backButton"></a>
                            <hr>
                        </form> 
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>
