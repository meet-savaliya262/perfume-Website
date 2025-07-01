<?php session_start();
    if(!empty($_POST))
    {
        extract($_POST);
        $error=array();
        if(empty($login_email))
        {
            $error[]="please enter email";
        }
        if(empty($login_password))
        {
            $error[]="please enter password";
        }
        if(!empty($error))
        {
            foreach($error as $er)
            {
                echo $er.'<br />';
            }
        }
        else
        {
            include("include_files/config.php");
            $q="select *from users where u_email='".mysqli_real_escape_string($link,$login_email)."' and u_pwd='".mysqli_real_escape_string($link,$login_password)."'";
            $res=mysqli_query($link,$q);
            $row=mysqli_fetch_assoc($res);
            if(empty($row))
            {
                echo "wrong email or pass";
            }
            else
            {
                $_SESSION['client']['email']=$row['u_email'];
                $_SESSION['client']['id']=$row['u_id'];
                $_SESSION['client']['status']=true;
                 header("location:index.php");
            }
        }
    }
    else
    {
        header("location:login.php");
    }
?>