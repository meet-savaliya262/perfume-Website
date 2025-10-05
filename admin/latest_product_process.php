<?php session_start();
   
    if(!empty($_POST))
    {
        extract($_POST);
        $_SESSION['error']=array();
        if(empty($lnm))
        {
            $_SESSION['error']['lnm']="please enter latest products name";
        }
        if(empty($ldesc))
        {
            $_SESSION['error']['ldesc']="please enter latest product description";
        }
        if(empty($_FILES['limg']['name']))
        {
            $_SESSION['error']['limg']="please select product img";
        }
        else if(file_exists("../products_image/latest_product_img/".$_FILES['limg']['name']))
        {
            $_SESSION['error']['limg']="file already exists";
        }

        if(! empty($_SESSION['error']))
        {
            header("location:latest_product.php");
        }
        else
        {
            include("../include_files/config.php");
            $t = date("Y-m-d");
            $limg_nm=$t."_".$_FILES['limg']['name'];
            move_uploaded_file($_FILES['limg']['tmp_name'],"../products_image/latest_product_img/".$limg_nm);
            $q="insert into latest_product(l_nm,l_description,l_time,l_img)
                values('".$lnm."','".$ldesc."','".$t."','".$limg_nm."')";
            mysqli_query($link,$q);
            $_SESSION['success']='Done! post add sccuccessfully';
            header("location:latest_product.php");    
        }
    }
    else
    {
        header("location:latest_product.php");
    }
?>