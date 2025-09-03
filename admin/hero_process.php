<?php session_start();
    if(!empty($_POST))
    {
        extract($_POST);
        $_SESSION['error']=array();
        if(empty($hpnm))
        {
            $_SESSION['error']['hpnm']="enter Hero Product name";
        }
        $ext=strtolower(substr($_FILES['hpimg']['name'],-4));
        $csize=round($_FILES['hpimg']['size'] / 1024 / 1024 ,2);

        if(empty($_FILES['hpimg']['name']))
        {
            $_SESSION['error']['hpimg']="please select Hero Product img";
        }
        else if(!($ext==".jpg" || $ext=="jpeg" || $ext==".png"))
        {
            $_SESSION['error']['hpimg']="please select jpg or png images";
        }
        else if(file_exists("../hero_product_image/".$_FILES['hpimg']['name']))
        {
            $_SESSION['error']['hpimg']="file already exists";
        }
        else if($csize>5)
        {
            $_SESSION['error']['hpimg']="maximum 5 mb size allowed";
        }

        if(!empty($error))
        {
             header("location:hero_section.php");
        }
        else
        {
            include("../include_files/config.php");
            $t = date("Y-m-d"); 
            $hpimg_nm=$t."_".$_FILES['hpimg']['name'];
            move_uploaded_file($_FILES['hpimg']['tmp_name'],"../hero_product_image/".$hpimg_nm);
            $q="insert into hero(h_nm,h_time,h_img)values('".$hpnm."','".$t."','".$hpimg_nm."')";
            mysqli_query($link,$q);
            $_SESSION['success']='Done! category add sccuccessfully';
            header("location:hero_section.php");   
        }
    }
    else{
        header("location:hero_section.php");
    }

?>