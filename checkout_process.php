<?php session_start();
+

   if((!empty($_POST) && isset($_SESSION['client']['status'])))
   {
      extract($_POST);
      $_SESSION['error']=array();

      if(empty($fnm))
      {
        $_SESSION['error']['fnm']="please enter first Name";
      }
      if(empty($lnm))
      {
        $_SESSION['error']['lnm']="please enter last Name";
      }
      if(empty($country))
      {
        $_SESSION['error']['country']="please select your country";
      }
      if(empty($address_line1))
      {
        $_SESSION['error']['address_line1']="please enter address";
      }
      if(empty($city))
      {
        $_SESSION['error']['city']="please enter city name";
      }
      if(empty($state))
      {
        $_SESSION['error']['state']="please enter state Name";
      }
      if(empty($phone))
      {
        $_SESSION['error']['phone']="please enter phone no";
      }
      else if(! is_numeric($phone))
      {
        $_SESSION['error']['phone']="please enter valid phone number";
      }
      if(empty($email))
      {
        $_SESSION['error']['email']="please enter email";
      }
      if(! empty($_SESSION['error']))
      {
        header("location:checkout.php");
      }
      else
      {
        echo "ALL is Well";
      }
   }
   else
   {
     header("locationn:index.php");
   }


?>