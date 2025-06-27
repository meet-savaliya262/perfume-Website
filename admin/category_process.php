<?php session_start();
    if(!empty($_POST))
    {
        extract($_POST);
        $_SESSION['error']=array();
        if(empty($cnm))
        {
            $_SESSION['error']['cnm']="enter category name";
        }
        $ext=strtolower(substr($_FILES['cimg']['name'],-4));
        $csize=round($_FILES['cimg']['size'] / 1024 / 1024 ,2);

        if(empty($_FILES['cimg']['name']))
        {
            $_SESSION['error']['cimg']="please select category img";
        }
        else if(!($ext==".jpg" || $ext=="jpeg" || $ext==".png"))
        {
            $_SESSION['error']['cimg']="please select jpg or png images";
        }
        else if(file_exists("../category_image/".$_FILES['cimg']['name']))
        {
            $_SESSION['error']['cimg']="file already exists";
        }
        else if($csize>5)
        {
            $_SESSION['error']['cimg']="maximum 5 mb size allowed";
        }

        if(!empty($error))
        {
             header("location:category.php");
        }
        else
        {
            include("../include_files/config.php");
            $t=time();
            $cimg_nm=$t."_".$_FILES['cimg']['name'];
            move_uploaded_file($_FILES['cimg']['tmp_name'],"../category_image/".$cimg_nm);
            $q="insert into category(cat_nm,cat_time,cat_img)values('".$cnm."','".$t."','".$cimg_nm."')";
            mysqli_query($link,$q);
            $_SESSION['success']='Done! category add sccuccessfully';
            header("location:category.php");   
        }
    }
    else{
        header("location:caterory.php");
    }

?>