<?php
include '../user/mainPage.php';
global $error;
$error=array();
class admin extends validation
{
    public $adminData=array();
    function __construct($data=null)
    {  
        parent::__construct();
        $this->adminData=$data; 
    }
    function create($table)
    {
        if($table=='BLOG')
        {
            if(isset($this->adminData['createBlog']))
            {
                global $error;
                $error=$this->Validate($this->adminData,null);
                if(empty($error))
                { 
                    $title=$this->adminData['title'];
                    $description=$this->adminData['description'];
                    $check=db::$dbConn->exec("INSERT INTO $table (TITLE,DESCRIPTION) VALUES ('$title','$description')");
                    echo "<h2 class=\"message\">Blog Created Successfully!</h2>";   
                }
            }
        } 
        else 
        {
            if(isset($this->adminData['create']))
            {
                global $error;
                $email=$this->adminData['EMAIL'];
                $check=db::$dbConn->query("SELECT EMAIL FROM $table WHERE EMAIL ='$email'");
                $check=$check->fetchAll(PDO::FETCH_ASSOC);
                $error=$this->Validate($this->adminData,$check);
                if(empty($error))
                {
                    $name=$this->adminData['NAME'];
                    $pass=$this->adminData['PASSWORD'];
                    $check=db::$dbConn->query("SELECT EMAIL FROM ADMIN WHERE EMAIL='$email'");
                    $check=$check->fetchAll(PDO::FETCH_ASSOC);
                    if($check)
                    {
                        echo "<h3 class=\"message\">This email is already used!</h3>";
                    }
                    else
                    {
                    $check=db::$dbConn->exec("INSERT INTO $table (NAME,EMAIL,PASSWORD) VALUES ('$name','$email','$pass')");
                    echo "<h3 class=\"message\">Account Created Successfully!</h3>";  
                    } 
                }
            }
        }
    }
    function view($table,$id)
    {
        $check=db::$dbConn->query("SELECT * FROM $table");
        $check=$check->fetchAll(PDO::FETCH_ASSOC);
        foreach($check as $val)
        {
            if($table=='BLOG')
            {
                echo" <div class=\"table\">";
                echo "<tr>";
                echo "<td>{$val['ID']}</td><td>{$val['TITLE']}</td>";
                echo " <td><a href=\"viewDescription.php?ID=".$val['ID']."&UID=".$id."\"><button>View</button></a></td>
                <td><a href=\"editBlog.php?ID=".$val['ID']."&UID=".$id."\"><button>Edit</button></a></td>
                <td><a href=\"deleteBlog.php?ID=".$val['ID']."&UID=".$id."\"><button>Delete</button></a></td>";
                if($val['STATUS'])
                {
                    echo "<td><a href=\"blogStatus.php?ID=".$val['ID']."&UID=".$id."\"><button>Active</button></a></td>";
                }
                else
                {
                    echo "<td><a href=\"blogStatus.php?ID=".$val['ID']."&UID=".$id."\"><button>Deactive</button></a></td>";
                }  
            }
            else
            {
                echo" <div class=\"table\">";
                echo "<tr>";
                echo "<td>{$val['ID']}</td> <td>{$val['NAME']}</td> <td>{$val['EMAIL']}</td>";
                if($table=='ADMIN')
                {
                    if($id==1)
                    {
                        if($val['ID']!=1)
                        {
                            echo "<td><a href=\"deleteSubAdmin.php?ID=".$val['ID']."&UID=".$id."\"><button>Delete</button></a></td>";
                        }
                    }
                }
                else
                {
                    echo "<td><a href=\"deleteUser.php?ID=".$val['ID']."&UID=".$id."\"><button>Delete</button></a></td>";
                }
                if(isset($val['STATUS']))
                {
                    if($val['STATUS'])
                    {
                        echo "<td><a href=\"status.php?ID=".$val['ID']."&UID=".$id."\"><button>Active</button></a></td>";
                    }
                    else
                    {
                        echo "<td><a href=\"status.php?ID=".$val['ID']."&UID=".$id."\"><button>Deactive</button></a></td>";
                    }
                }
            }
        }       
        echo "<div class=\"blogButtons1\">";
        echo " <a href='view.php?UID=".$id."'><button>BACK</button></a>";
        echo " <a href='adminLogout.php?UID=".$id."'><button>LOGOUT</button></a>";
        echo"</div>";
  
    }
    function delete($table,$id)
    {
        if(isset($id))
        {
        $check=db::$dbConn->exec("DELETE FROM $table WHERE ID='$id'");
        }
    }
    function update($id,$uid)
    {
        global $error;
        $error=$this->Validate($this->adminData,null);
        if(empty($error))
        {
            if($id)
            {
            $sql=$this->adminData;
            $sql['ID']=$this->adminData['editBlog'];
            $title=$this->adminData['title'];
            $description=$this->adminData['description'];
            $check=db::$dbConn->exec("UPDATE BLOG SET TITLE='$title', DESCRIPTION='$description' WHERE ID='$id'");   
            header('location:viewBlog.php?UID='.$uid);
            }  
        }
    }
    function status($table,$id)
    {
        $status=db::$dbConn->query("SELECT * FROM $table WHERE ID='$id'");
        $status=$status->fetchAll(PDO::FETCH_ASSOC);
        foreach($status as $val)
        {
            if($val['ID']==$id)
            {
                if(! $val['STATUS'])
                {
                    $status=db::$dbConn->exec("UPDATE $table SET STATUS=1 WHERE ID='$id'");
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
                    $status=db::$dbConn->exec("UPDATE $table SET STATUS=0 WHERE ID='$id'");
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
}
?>