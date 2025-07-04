<?php session_start();
    if(!empty($_POST))
    {
        extract($_POST);
        $error=array();
        if(empty($unm))
        {
            $error[]="please enter email";
        }
        if(empty($pwd))
        {
            $error[]="please enter password";
        }
        if(!empty($error))
        {
            foreach($error as $er)
            {
                header("location:login.php");
                echo $er.'<br />';
            }
        }
        else
        {
            include("../include_files/config.php");
            $q="select *from admin where a_email='".mysqli_real_escape_string($link,$unm)."' and a_pwd='".mysqli_real_escape_string($link,$pwd)."'";
            $res=mysqli_query($link,$q);
            $row=mysqli_fetch_assoc($res);
            if(empty($row))
            {
                echo "wrong unm or pass";
            }
            else
            {
                $_SESSION['admin']['email']=$row['a_email'];
                $_SESSION['admin']['id']=$row['a_id'];
                $_SESSION['admin']['status']=true;
                 header("location:index.php");
            }
        }
    }
    else
    {
        header("location:login.php");
    }
?>