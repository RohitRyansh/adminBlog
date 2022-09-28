<?php
include '../validation/validation.php';
global $error;
$error=array();
session_start();
class signupLogin extends validation
{
    public $data=array();
    function __construct($data=null)
    {  
        parent::__construct();
        $this->data=$data;  
    }
    function signUp()
    {
        if(!empty($this->data['submit']))
        {
            global $error;
            $email=$this->data['EMAIL'];
            $check=db::$dbConn->query("SELECT EMAIL FROM USERCREATE WHERE EMAIL ='$email'");
            $check=$check->fetchAll(PDO::FETCH_ASSOC);
            $error=$this->Validate($this->data,$check);
            if(empty($error))
            {
                $name=$this->data['NAME'];
                $pass=$this->data['PASSWORD'];
                $check=db::$dbConn->query("SELECT EMAIL FROM ADMIN WHERE EMAIL='$email'");
                $check=$check->fetchAll(PDO::FETCH_ASSOC);
                if($check)
                {
                    echo "<h3 class=\"message\">This email is alredy used by admin!</h3>";
                }
                else
                {
                $check=db::$dbConn->exec("INSERT INTO USERCREATE (NAME,EMAIL,PASSWORD) VALUES ('$name','$email','$pass')");
                echo "<h3 class=\"message\">Account Created Successfully!</h3>";
                }
            }
        }
        if(isset($_SESSION['loggedin']))
        {
            $_SESSION['loggedin']=false;
        }
    }
    function login($table)
    {
        if(!empty($this->data['submit']))
        {   
            global $error;
            $error=$this->Validate($this->data,null);  
            $email=$this->data['EMAIL'];
            $password=$this->data['PASSWORD'];
            if(empty($error))
            {
                $check=db::$dbConn->query("SELECT * FROM $table WHERE EMAIL ='$email' AND PASSWORD = '$password' ");
                $check=$check->fetchAll(PDO::FETCH_ASSOC);
                if($check)
                {
                    $_SESSION['loggedin']=true;
                    $id=$check[0]['ID'];
                    if($table=='USERCREATE')
                    {
                        if(! $check[0]['STATUS'])
                        {
                            echo "<h3 class=\"message\">your status is unactive please contact to admin!</h3>";
                        }
                        else
                        {
                            $_SESSION['userLogged']=true;
                            header('location:userBlogView.php?UID='.$id);
                        }
                    }
                    else
                    {
                        if($check)
                        {
                            $_SESSION['adminLogged']=true;
                            header('location:../adminPanel/view.php?UID='.$id);
                        }
                    }
                }
                else
                {
                    echo "<h3 class=\"message1\">Wrong ID and Password!</h3>";
                }         
            }
        }     
    }
    function likeCount($id,$uid)
    { 
        $sql1=db::$dbConn->query("SELECT LIKES FROM LIKETABLE WHERE ID='$uid' AND BLOGID='$id'");
        $sql1=$sql1->fetchAll(PDO::FETCH_ASSOC);
        $count=0;
        if(! $sql1)
        {
            $count=$sql1[0]['LIKES'];
            $count++;
            $check=db::$dbConn->query("INSERT INTO LIKETABLE (ID,BLOGID,LIKES) VALUES('$uid','$id','$count')");
        }
        else
        {
            $count=$sql1[0]['LIKES'];
            $count++;
            $check=db::$dbConn->exec("UPDATE LIKETABLE SET LIKES='$count' WHERE ID='$uid' AND BLOGID='$id'");
        }
        header("location:blogDescription.php?ID=".$id."&UID=".$uid);
    }
    
    function dislikeCount($id,$uid)
    {
        $sql1=db::$dbConn->query("SELECT LIKES FROM LIKETABLE WHERE ID='$uid' AND BLOGID='$id'");
        $sql1=$sql1->fetchAll(PDO::FETCH_ASSOC);
        if($sql1)
        {
            $count=$sql1[0]['LIKES'];
            $count--;
            if($count<0)
            {
                $check=db::$dbConn->exec("UPDATE LIKETABLE SET LIKES=0 WHERE ID='$uid' AND BLOGID='$id'");
            }
            else
            {
                $check=db::$dbConn->exec("UPDATE LIKETABLE SET LIKES='$count' WHERE ID='$uid' AND BLOGID='$id'");
            }
        }
        header("location:blogDescription.php?ID=".$id."&UID=".$uid);  
    }
}
?>