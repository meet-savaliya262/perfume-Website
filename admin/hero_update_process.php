<?php session_start();
    if(!empty($_POST))
    {
        
        extract($_POST);
        $_SESSION['error']=array();
        if(empty($hnm))
        {
            $_SESSION['error']['hnm']="enter hero Product name";
        }
        // Image validation
       
        if(!empty($_FILES['himg']['name']))
        {
            $ext = strtolower(substr($_FILES['himg']['name'], -4));
            $csize = round($_FILES['himg']['size'] / 1024 / 1024, 2);

            if(!($ext==".jpg" || $ext=="jpeg" || $ext==".png"))
            {
                $_SESSION['error']['cimg']="please select jpg or png images";
            }
            else if(file_exists("../hero_product_image/".$_FILES['himg']['name']))
            {
                $_SESSION['error']['himg']="file already exists";
            }
            else if($csize>5)
            {
                $_SESSION['error']['himg']="maximum 5 mb size allowed";
            }
        }    

        if (!empty($_SESSION['error'])) 
        {
            header("Location:hero_product_edit.php");
        }

        else
        {
            include("../include_files/config.php");
            if(!empty($_FILES['himg']['name']))
            {
                $f_q="select h_img from hero where h_id=".$hid;
                $f_res=mysqli_query($link,$f_q);
                $f_row=mysqli_fetch_assoc($f_res);
                unlink("../hero_product_image/".$f_row['h_img']);
                $img=date('y-m-d')."_".$_FILES['himg']['name'];
                move_uploaded_file($_FILES['himg']['tmp_name'],"../hero_product_image/".$img);

                $q = "UPDATE hero SET 
                    h_nm='".$hnm."',
                    h_img='".$img."' where h_id=".$hid;
            }
            else
            {
                $q = "UPDATE hero SET 
                    h_nm='$hnm' where h_id=".$hid;
            }

                mysqli_query($link,$q);

                $_SESSION['success']="Done! hero Product successfully updated";
                header("location:hero_section_list.php");   

        }
    }
    else{
        header("location:caterory.php");
    }

?>