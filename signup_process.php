<?php
        if(!empty($_POST))
        {
            extract($_POST);
            $error=array();
            if(empty($fnm))
            {
                $error[]="enter full name";
            }
            if(empty($email))
            {
                $error[]="enter email";
            }
            if(empty($mno))
            {
                $error[]="enter mobile no";
            }
            else if(strlen($mno)!=10)
            {
                $error[]="enter 10 digit mobile no";
            }
            else if(!is_numeric($mno))
            {
                $error[]="enter numeric no";
            }
            if(empty($pwd) || empty($cpwd))
            {
                $error[]="enter password";
            }
            else if($pwd != $cpwd)
            {
                $error[]="Don't match password";
            }
            else if(strlen($pwd) < 6)
            {
                $error[]="enter minimum 6 digit password";
            }
            if(!empty($error))
            {
                foreach($error as $er)
                {
                    echo $er."<br />";
                }
            }
            else
            {
               include("include_files/config.php");
               $t=time();
               $q="insert into users(u_fnm,u_email,u_mno,u_pwd,u_time)values('".$fnm."','".$email."','".$mno."','".$pwd."','".$t."')";
               mysqli_query($link,$q);
               header("location:login.php");
            }
        }      
        else
        {
            header("location:login.php");
        }              

?>