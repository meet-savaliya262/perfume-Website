<?php  session_start();
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
            if(empty($msg))
            {
                $error[]="enter massage";
            }
            if(!empty($error))
            {
                foreach($error as $er)
                {
                    $_SESSION['status'] = "error";
                    header("location:contact.php");
                }
            }
            else
            {
               include("include_files/config.php");
               $t = date("Y-m-d"); 
               $q="insert into contact(co_fnm,co_email,co_msg,co_time)values('".$fnm."','".$email."','".$msg."','".$t."')";
               mysqli_query($link,$q);
               $_SESSION['status'] = "success";
               header("location:contact.php");
            }
        }      
        else
        {
            header("location:contact.php");
        }              

?>