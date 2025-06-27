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
            if(empty($msg))
            {
                $error[]="enter massage";
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
               $q="insert into contact(co_fnm,co_email,co_msg,co_time)values('".$fnm."','".$email."','".$msg."','".$t."')";
               mysqli_query($link,$q);
               echo "Done! massage sent succesfullys";
            }
        }      
        else
        {
            header("location:contact.php");
        }              

?>