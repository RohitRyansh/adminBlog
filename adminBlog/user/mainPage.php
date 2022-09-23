<?php
include '../validation/validation.php';
class db extends validation
{
    public static $dbConn,$dbHost,$dbPassword,$dbUser,$sql;
    function __construct()
    {
        db::$dbHost="mysql:host=localhost;dbname=project1";  
        db::$dbUser="root";
        db::$dbPassword=""; 
        db::$dbConn= new PDO(db::$dbHost,db::$dbUser,db::$dbPassword);
            db::$sql=db::$dbConn->query("SELECT * FROM USERCREATE");
        db::$sql=db::$sql->fetchAll(); 
    }

}
global $error;
$error=array();
class signupLogin extends db
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
                $error=$this->Validate($this->data,db::$sql);
                if(empty($error))
                {
                    $name=$this->data['NAME'];
                    $email=$this->data['EMAIL'];
                    $pass=$this->data['PASSWORD'];
                    db::$sql=db::$dbConn->exec("INSERT INTO USERCREATE (NAME,EMAIL,PASSWORD) VALUES ('$name','$email','$pass')");
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
            foreach(db::$sql as $val)
            {
                if($this->data['EMAILLOGIN']==$val['EMAIL'] && $this->data['PASSWORDLOGIN']==$val['PASSWORD'])
                {
                    if($val['STATUS']==0)
                    {
                        echo "<h3 class=\"message\">your status is unactive please contact to admin!</h3>";
                    }
                    else
                    {
                        header('location:userBlogView.php');
                    }
                }
                else
                {
                    echo "<h3 class=\"message1\">Wrong ID and Password!</h3>";
                }
                
            }     
        }
        elseif(!empty($this->data['submit2']))
        {
            global $error;
            $error=$this->Validate($this->data,null);
            $check;
            db::$sql=db::$dbConn->query("SELECT * FROM ADMIN");
            db::$sql=db::$sql->fetchAll();
            if(empty($error))
            {
                foreach(db::$sql as $value)
                {
                    if($this->data['EMAILLOGIN']==$value['EMAIL'] && $this->data['PASSWORDLOGIN']==$value['PASSWORD'])
                    {
                        header('location:../adminPanel/view.php');
                    }
                    else
                    {
                        echo "<h3 class=\"message1\">Wrong ID and Password!</h3>";
                    }
                }
            }
        }
    }
    function likeCount($id)
    { 
        $count=0;
        db::$sql=db::$dbConn->query("SELECT * FROM BLOG");
        db::$sql=db::$sql->fetchAll(); 
        foreach(db::$sql as $val)
        {
            if($val['ID']==$id)
            {
            db::$sql=db::$dbConn->exec("INSERT INTO like (blogId,likeCount) values ('$id','$count')");
            // db::$sql=db::$sql->fetchAll();
            foreach(db::$sql as $val1)
            {
                print_r($val1);
                die;
            }
            }
        }
        echo "hi";
        die;
    }
}

?>