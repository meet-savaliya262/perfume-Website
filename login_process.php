<?php session_start();
    if(!empty($_POST))
    {
        extract($_POST);
        $_SESSION['error']=array();
        if(empty($login_email))
        {
            $_SESSION['error']['login_email']="please enter email";
        }
        if(empty($login_password))
        {
            $_SESSION['error']['login_password']="please enter password";
        }
        if(! empty($_SESSION['error']))
        {
            header("location:login.php");
        }
        else
        {
            include("include_files/config.php");
            $q="select *from users where u_email='".mysqli_real_escape_string($link,$login_email)."' and u_pwd='".mysqli_real_escape_string($link,$login_password)."'";
            $res=mysqli_query($link,$q);
            $row=mysqli_fetch_assoc($res);
            if(empty($row))
            {
                header("location:login.php");
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