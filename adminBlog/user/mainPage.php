<?php
include '../validation/validation.php';
global $error;
$error=array();
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
        if(isset($this->data['admin']))
        {
            header('location:../adminPanel/adminLogin.php');
        }
        else
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
                    $check=db::$dbConn->exec("INSERT INTO USERCREATE (NAME,EMAIL,PASSWORD) VALUES ('$name','$email','$pass')");
                    echo "<h3 class=\"message\">Account Created Successfully!</h3>";
                }
            }
        }
    }
    function login()
    {
        if(!empty($this->data['submit1']))
        {   
            global $error;
            $error=$this->Validate($this->data,null);  
            $email=$this->data['EMAILLOGIN'];
            $password=$this->data['PASSWORDLOGIN'];
            $check=db::$dbConn->query("SELECT ID,EMAIL,PASSWORD,STATUS FROM USERCREATE WHERE EMAIL ='$email' AND PASSWORD = '$password' ");
            $check=$check->fetchAll(PDO::FETCH_ASSOC);
            if($check)
            {
                if(! $check[0]['STATUS'])
                {
                    echo "<h3 class=\"message\">your status is unactive please contact to admin!</h3>";
                }
                else
                {
                    $id=$check[0]['ID'];
                    $check=db::$dbConn->query("SELECT ID FROM USERCREATE WHERE EMAIL ='$email' AND PASSWORD = '$password' ");
                    $check=db::$dbConn->exec("INSERT INTO LIKETABLE (ID,BLOGId,LIKES) VALUES ('$id',0,0)");
                    header('location:userBlogView.php?ID='.$id);
                }
            }
            else
            {
                echo "<h3 class=\"message1\">Wrong ID and Password!</h3>";
            }
                   
        }
        elseif(!empty($this->data['submit2']))
        {
            global $error;
            $error=$this->Validate($this->data,null);
            $email=$this->data['EMAILLOGIN'];
            $password=$this->data['PASSWORDLOGIN'];
            $check=db::$dbConn->query("SELECT ID,EMAIL,PASSWORD FROM ADMIN WHERE EMAIL ='$email' AND PASSWORD = '$password' ");
            $check=$check->fetchAll(PDO::FETCH_ASSOC);
            if(empty($error))
            {
                if($check)
                {
                    header('location:../adminPanel/view.php?ID='.$check[0]['ID']);

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
        $likeCount=db::$dbConn->query("SELECT ID FROM BLOG WHERE ID= '$id'");
        $likeCount=$likeCount->fetchAll(PDO::FETCH_ASSOC); 
        foreach($likeCount as $val)
        {
            $sql1=db::$dbConn->query("SELECT * FROM LIKETABLE");
            $sql1=$sql1->fetchAll(PDO::FETCH_ASSOC);
            $count=$sql1['LIKES'];
            if($val['ID']==$id)
            {
            $count++;
            $sql1=db::$dbConn->exec("UPDATE LIKETABLE SET BLOGID='$id', LIKES='$count' WHERE ID='$uid'");
            header("location:blogDescription.php?ID=".$val['ID']."&UID=".$uid);
            }
        
        }
    }
    function dislikeCount($id,$uid)
    {
        $sql1=db::$dbConn->query("SELECT * FROM BLOG");
        $sql1=$sql1->fetchAll(PDO::FETCH_ASSOC); 
        foreach(db::$sql as $val)
        {
            $sql1=db::$dbConn->query("SELECT * FROM LIKETABLE");
            $sql1=$sql1->fetchAll(PDO::FETCH_ASSOC);
            $count=$sql1['LIKES'];
            if($val['ID']==$id)
            {
            $count--;
            $sql1=db::$dbConn->exec("UPDATE LIKETABLE SET LIKES='$count' WHERE BLOGID='$id'");
            header("location:blogDescription.php?ID=".$val['ID']."&UID=".$uid);
            }
        }
    }
}
?>