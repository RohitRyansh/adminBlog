<?php
include '../user/mainPage.php';
global $error;
$error=array();
class admin extends db
{
    public static $sql;
    public $adminData=array();
    function __construct($data=null)
    {  
        parent::__construct();
        $this->adminData=$data; 
        admin::$sql=db::$dbConn->query("SELECT * FROM USERCREATE");
        admin::$sql=admin::$sql->fetchAll();
    }
    function createUser()
    {
        if(!empty($this->adminData['createUser']))
        {
            global $error;
            $error=$this->Validate($this->adminData,admin::$sql);
            if(empty($error))
            {
                $name=$this->adminData['NAME'];
                $email=$this->adminData['EMAIL'];
                $pass=$this->adminData['PASSWORD'];
                admin::$sql=db::$dbConn->exec("INSERT INTO USERCREATE (NAME,EMAIL,PASSWORD) VALUES ('$name','$email','$pass')");
                echo "<h3 class=\"message\">Account Created Successfully!</h3>";   
            }
        }
        if(!empty($this->adminData['createSubAdmin']))
        {
            global $error;
            $error=$this->Validate($this->adminData,admin::$sql);
            if(empty($error))
            {
                $name=$this->adminData['NAME'];
                $email=$this->adminData['EMAIL'];
                $pass=$this->adminData['PASSWORD'];
                admin::$sql=db::$dbConn->exec("INSERT INTO ADMIN (NAME,EMAIL,PASSWORD) VALUES ('$name','$email','$pass')");
                echo "<h3 class=\"message\">Account Created Successfully!</h3>";   
            }
        }
    }
    function viewUser($table)
    {
        admin::$sql=db::$dbConn->query("SELECT * FROM $table");
        admin::$sql=admin::$sql->fetchAll();
        foreach(admin::$sql as $val)
        {   
            if($table=='BLOG')
            {
                echo" <div class=\"table\">";
                echo "<tr>";
                echo "<td>{$val['ID']}</td><td>{$val['TITLE']}</td>";
                echo " <td><a href=\"viewDescription.php?ID=".$val['ID']."\"><button>View</button></a></td>
                <td><a href=\"editBlog.php?ID=".$val['ID']."\"><button>Edit</button></a></td>
                <td><a href=\"deleteBlog.php?ID=".$val['ID']."\"><button>Delete</button></a></td>";
                if($val['STATUS']==1)
                {
                    echo "<td><a href='blogStatus.php?ID=".$val['ID']."'><button>Active</button></a></td>";
                }
                else
                {
                    echo "<td><a href='blogStatus.php?ID=".$val['ID']."'><button>Deactive</button></a></td>";
                }  
                echo "</tr></div>";
                echo "<div class=\"blogButtons\">";
                echo " <a href='view.php'><button>BACK</button></a>";
                echo " <a href='adminLogout.php?ID=".$val['ID']."'><button>LOGOUT</button></a>";
                echo"</div>";
            }
            else 
            {
                echo" <div class=\"table\">";
                echo "<tr>";
                echo "<td>{$val['ID']}</td> <td>{$val['NAME']}</td> <td>{$val['EMAIL']}</td>";
               
                echo "<td><a href=\"deleteUser.php?ID=".$val['ID']."\"><button>Delete</button></a></td>";
                if(isset($val['STATUS']))
                {
                    if($val['STATUS']==1)
                    {
                        echo "<td><a href='status.php?ID=".$val['ID']."'><button>Active</button></a></td>";
                    }
                    else
                    {
                        echo "<td><a href='status.php?ID=".$val['ID']."'><button>Deactive</button></a></td>";
                    }
                }
                echo "</tr></div>";
                echo "<div class=\"blogButtons1\">";
                echo " <a href='view.php'><button>BACK</button></a>";
                echo " <a href='adminLogout.php?ID=".$val['ID']."'><button>LOGOUT</button></a>";
                echo"</div>";
            }     
        }
    }
    function delete($table,$id)
    {
        admin::$sql=db::$dbConn->exec("DELETE FROM $table WHERE ID='$id'");

    }
    function update($id)
    {
        $title=$this->adminData['title'];
        $description=$this->adminData['description'];
        admin::$sql=db::$dbConn->exec("UPDATE BLOG SET TITLE='$title', DESCRIPTION='$description' WHERE ID='$id'");   
    }
    function status($table,$id)
    {
        admin::$sql=db::$dbConn->query("SELECT * FROM $table");
        admin::$sql=admin::$sql->fetchAll();
        foreach(admin::$sql as $key=>$val)
        {
            if($val['ID']==$id)
            {
                if($val['STATUS']==0)
                {
                    admin::$sql=db::$dbConn->exec("UPDATE $table SET STATUS=1 WHERE ID='$id'");
                    if($table=='USERCREATE')
                    {
                        header('location:viewUser.php');
                    }
                    else
                    {
                        header('location:viewBlog.php');
                    }
                }
                else
                {
                    admin::$sql=db::$dbConn->exec("UPDATE $table SET STATUS=0 WHERE ID='$id'");
                    if($table=='USERCREATE')
                    {
                        header('location:viewUser.php');
                    }
                    else
                    {
                        header('location:viewBlog.php');
                    }
                }
            }
        }  
    }
    function createBlog()
    {
        if(!empty($this->adminData['createBlog']))
        {
            global $error;
            $error=$this->Validate($this->adminData,admin::$sql);
            if(empty($error))
            { 
                $title=$this->adminData['title'];
                $description=$this->adminData['description'];
                admin::$sql=db::$dbConn->exec("INSERT INTO BLOG (TITLE,DESCRIPTION) VALUES ('$title','$description')");
                echo "<h2 class=\"message\">Blog Created Successfully!</h2>";   
            }
        }  
    }
}

?>