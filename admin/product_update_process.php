<?php session_start();

if (!empty($_POST)) {
    
    extract($_POST);
    $_SESSION['error'] = [];

    // Validation
    if (empty($pnm)) {
        $_SESSION['error']['pnm'] = "Please enter product name";
    }
    if (empty($cnm)) {
        $_SESSION['error']['cnm'] = "Please select category";
    }
    if (empty($price)) {
        $_SESSION['error']['price'] = "Please enter price";
    } elseif (!is_numeric($price)) {
        $_SESSION['error']['price'] = "Please enter numeric price";
    }
    if (empty($weight)) {
        $_SESSION['error']['weight'] = "Please enter product weight";
    }
    if (empty($sdesc)) {
        $_SESSION['error']['sdesc'] = "Please enter short description";
    }

    // Image validation
    if(!empty($_FILES['pimg']['name']))
    {
        $ext = strtolower(substr($_FILES['pimg']['name'], -4));
        $psize = round($_FILES['pimg']['size'] / 1024 / 1024, 2);

        if(!($ext==".jpg" || $ext=="jpeg" || $ext==".png"))
        {
            $_SESSION['error']['pimg']="please select jpg or png images";
        }
        else if(file_exists("../products_image/".$_FILES['pimg']['name']))
        {
            $_SESSION['error']['pimg']="file already exists";
        }
        else if($psize>5)
        {
            $_SESSION['error']['pimg']="maximum 5 mb size allowed";
        }
    }   

    // If there are any errors
    if (!empty($_SESSION['error'])) 
    {
        header("Location: product_edit.php");
    }
    else
    {
        include("../include_files/config.php");
        if(!empty($_FILES['pimg']['name']))
        {
            $f_q="select p_img from products where p_id=".$pid;
            $f_res=mysqli_query($link,$f_q);
            $f_row=mysqli_fetch_assoc($f_res);
            unlink("../products_image/".$f_row['p_img']);
            $img=time()."_".$_FILES['pimg']['name'];
            move_uploaded_file($_FILES['pimg']['tmp_name'],"../products_image/".$img);

            $q = "UPDATE products SET 
                p_nm = '".$pnm."',
                p_cat = '".$cnm."',
                p_price = '".$price."',
                p_weight = '".$weight."',
                p_short_desc = '".$sdesc."',
                p_description = '".$desc."',
                p_add_info = '".$ainfo."',
                p_img='".$img."'
                where p_id=".$pid;
        }
        
        else
        {
             $q = "UPDATE products SET 
                p_nm = '".$pnm."',
                p_cat = '".$cnm."',
                p_price = '".$price."',
                p_weight = '".$weight."',
                p_short_desc = '".$sdesc."',
                p_description = '".$desc."',
                p_add_info = '".$ainfo."'
                where p_id=".$pid;
        }

        mysqli_query($link,$q);

        $_SESSION['success']="Done! product successfully updated";

        header("Location: product-list.php");
        
    }
} 
else
{
    header("Location: product.php");
}
?>


