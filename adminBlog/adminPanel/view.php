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
$id=$_GET['ID'];
echo "
    <a href='subAdminCreate.php?ID=".$id."'><button>CREATE SUB ADMIN</button>
    <a href='subAdminView.php?ID=".$id."'><button>VIEW SUB ADMIN</button></a>
    <a href='createUser.php?ID=".$id."'><button>CREATE USER</button></a>
    <a href='viewUser.php?ID=".$id."'><button>VIEW</button></a>
    <a href='createBlog.php?ID=".$id."'><button>CREATE BLOG</button></a>
    <a href='viewBlog.php?ID=".$id."'><button>VIEW BLOG</button></a>
    <a href='adminLogin.php?ID=".$id."'><button>LOGOUT</button></a>";
?>
</div>
</div>
