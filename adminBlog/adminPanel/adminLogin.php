<?php
include '../user/mainPage.php';
if(isset($_POST['submit2'])){
    $obj=new signupLogin($_POST);
    $obj->login();
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
                            <input type="email" name="EMAILLOGIN" placeholder="Email">
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
                                $error=NULL;
                            ?>
                            <input type="submit" value="login" name="submit2">
                            <a href="../user/index.php">not Admin?</a>
                        </form>
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>
