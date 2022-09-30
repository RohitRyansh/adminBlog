<?php
include '../user/mainPage.php';
$obj1=new validation();
if($obj1->adminLoggedinValidate()==true)
{
    header('location:view.php?UID='.$_SESSION['UID']);
}
if(isset($_POST['submit'])){
    $obj=new signupLogin($_POST);
    $obj->login("ADMIN");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
    <!-- heading -->
    <header>
        <nav>
            <h1>Login Page</h1>
        </nav>
    </header>
    <main>
        <article>
            <section>
                <div class="front">
                    <div class="text">
                        <h2>
                            WELCOME ADMIN
                        </h2>     
                    <!-- Login page -->
                        <form action="adminLogin.php" method="post">      
                        <h3>
                            Log in to Uworld
                        </h3>  
                            <input type="email" name="EMAIL" placeholder="Email">
                            <?php
                                if(!empty($error['EMAIL']))
                                {
                                    echo $error['EMAIL'];
                                }
                            ?>
                            <input type="password" name="PASSWORD" placeholder="Password">
                            <?php
                                if(!empty($error['PASSWORD']))
                                {
                                    echo $error['PASSWORD'];
                                }
                                $error=NULL;
                            ?>
                            <input type="submit" value="login" name="submit">
                        </form>
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>
