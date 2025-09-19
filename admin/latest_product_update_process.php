<?php 
session_start();

if (!empty($_POST)) {
    
    extract($_POST);
    $_SESSION['error'] = [];

    // Validation
    if (empty($lnm)) 
    {
        $_SESSION['error']['lnm'] = "Please enter product name";
    }

    if (empty($ldesc))
    {
        $_SESSION['error']['ldesc'] = "Please enter product description";
    }

    // Image validation
    if (!empty($_FILES['limg']['name'])) 
    {
        if (file_exists("../products_image/latest_product_img/" . $_FILES['limg']['name'])) 
        {
            $_SESSION['error']['limg'] = "File already exists";
        }
    }

    // If there are any errors
    if (!empty($_SESSION['error'])) 
    {
        header("Location: latest_product_edit.php?poid=" . urlencode($lid));
        exit;
    } 
    else
    {
        include("../include_files/config.php");

        if (!empty($_FILES['limg']['name'])) 
        {
            // Delete old image
            $f_q = "SELECT l_img FROM latest_product WHERE l_id=" . intval($lid);
            $f_res = mysqli_query($link, $f_q);
            if ($f_res && mysqli_num_rows($f_res) > 0) 
            {
                $f_row = mysqli_fetch_assoc($f_res);
                if (!empty($f_row['l_img']) && file_exists("../products_image/latest_product_img/" . $f_row['l_img'])) {
                    unlink("../products_image/latest_product_img/" . $f_row['l_img']);
                }
            }

            // Upload new image
            $img = date("Y-m-d") . "_" . basename($_FILES['limg']['name']);
            move_uploaded_file($_FILES['limg']['tmp_name'], "../products_image/latest_product_img/" . $img);

            $q = "UPDATE latest_product SET 
                l_nm = '" . mysqli_real_escape_string($link, $lnm) . "',
                l_description = '" . mysqli_real_escape_string($link, $ldesc) . "',
                l_img = '" . mysqli_real_escape_string($link, $img) . "'
                WHERE l_id = " . intval($lid);
        } 
        else 
        {
            $q = "UPDATE latest_product SET 
                l_nm = '" . mysqli_real_escape_string($link, $lnm) . "',
                l_description = '" . mysqli_real_escape_string($link, $ldesc) . "'
                WHERE l_id = " . intval($lid);
        }

        if (mysqli_query($link, $q)) 
        {
            $_SESSION['success'] = "Done! Product successfully updated.";
        } 
        else 
        {
            $_SESSION['error']['db'] = "Database error: " . mysqli_error($link);
        }

        header("Location: latest_product_list.php");
        exit;
    }

} 
else 
{
    header("Location: latest_product.php");
    exit;
}
?>
