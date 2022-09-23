<link rel="stylesheet" href="../css/style.css">
<div class="viewAdmin">
    <h1>
        <u>WELCOME</u>
    </h1>
    <H2>
        ADMIN PANEL
    </H2>
    <div class="viewAdmin1">
<?php
include '../user/mainpage.php';
$obj=new signupLogin();
echo "
    <a href='subAdminCreate.php'><button>CREATE SUB ADMIN</button>
    <a href='subAdminView.php'><button>VIEW SUB ADMIN</button></a>
    <a href='createUser.php'><button>CREATE USER</button></a>
    <a href='viewUser.php'><button>VIEW</button></a>
    <a href='createBlog.php'><button>CREATE BLOG</button></a>
    <a href='viewBlog.php'><button>VIEW BLOG</button></a>
    <a href='adminLogin.php'><button>LOGOUT</button></a>";
?>
</div>
</div>
