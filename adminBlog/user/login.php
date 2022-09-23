<?php
include 'mainPage.php';
$obj=new signupLogin($_POST);
$obj->login();
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
                            WELCOME
                        </h2>     
                    <!-- Login page -->
                        <form action="login.php" method="post">      
                        <h3>
                            Log in to Uworld
                        </h3>  
                            <input type="email" name="EMAILLOGIN" placeholder="Email address or Phone Number">
                            <?php
                                if(!empty($error['EMAILLOGIN']))
                                {
                                    echo $error['EMAILLOGIN'];
                                }
                            ?>
                            <input type="password" name="PASSWORDLOGIN" placeholder="Password">
                            <?php
                                if(!empty($error['PASSWORDLOGIN']))
                                {
                                    echo $error['PASSWORDLOGIN'];
                                }
                            ?>
                            <input type="submit" value="login" name="submit1">
                            <a href="../adminPanel/adminLogin.php">Admin Login?</a>
                            <a href="index.php">Sign up</a>  
                        </form>
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>
