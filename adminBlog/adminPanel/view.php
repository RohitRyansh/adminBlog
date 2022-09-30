<?php
include '../user/mainpage.php';
$obj1=new validation();
if($obj1->adminLoggedinValidate()==false)
{
    header('location:adminLogin.php');
}
?>
<link rel="stylesheet" href="../css/style.css">
<div class="viewAdmin">
<h1>
    <u>WELCOME</u>
</h1>
<H2>
    ADMIN PANEL
</H2>
<div class="view5">
    <div class="viewAdmin1">
        <?php
            $obj=new signupLogin();
            $id=$_GET['UID'];
            echo "
            <a href='subAdminCreate.php?UID=".$id."'><button>CREATE SUB ADMIN</button>
            <a href='subAdminView.php?UID=".$id."'><button>VIEW SUB ADMIN</button></a>
            <a href='createUser.php?UID=".$id."'><button>CREATE USER</button></a>
            <a href='viewUser.php?UID=".$id."'><button>VIEW</button></a>
            <a href='createBlog.php?UID=".$id."'><button>CREATE BLOG</button></a>
            <a href='viewBlog.php?UID=".$id."'><button>VIEW BLOG</button></a>";
        ?>
</div>
<div>
    <img src="../images/admin.png" alt="not found" width="600px">
</div>
</div>
<?php echo "<a href='adminLogout.php?UID=".$id."'><button>LOGOUT</button></a>";?>
</div>
