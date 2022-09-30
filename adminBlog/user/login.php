<?php
include 'mainPage.php';
$obj1=new validation();
if($obj1->userLoggedinValidate()==true)
{
    header('location:userBlogView.php?UID='.$_SESSION['UID']);
}
$obj=new signupLogin($_POST);
$obj->login("USERCREATE");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER LOGIN</title>
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
                            WELCOME
                        </h2>     
                    <!-- Login page -->
                        <form action="login.php" method="post">      
                        <h3>
                            Log in to Uworld
                        </h3>  
                            <input type="email" name="EMAIL" placeholder="Email address or Phone Number">
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
                            ?>
                            <input type="submit" value="login" name="submit">
                            <a href="index.php">Sign up</a>  
                        </form>
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>
