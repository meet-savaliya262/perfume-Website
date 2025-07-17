<?php session_start();

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

      if(empty($payment))
      {
        $_SESSION['error']['payment']="please select payment method";
      }

      if(! empty($_SESSION['error']))
      {
        header("location:checkout.php");
      }
      else
      {
          include("include_files/config.php");
          // random key generate 
          $a="abcdefghijklmnopqrstuvwxyz123456789";
          $key='';
          for($i=1;$i<=10;$i++)
          {
            $key.=substr($a,rand(0,34),1);
          }

          $t=time();
          $uid=$_SESSION['client']['id'];

          $pids=array();
          foreach($_SESSION['cart'] as $val)
          {
            $pids[]=$val['id'];
          }

          $pid=json_encode($pids);

          $q="insert into orders(o_fnm,o_lnm,o_country,o_address_line1,o_address_line2,
              o_city,o_state,o_pincode,o_phone,o_email,o_note,o_pid,o_uid,o_order_key,
              o_payment,o_time) values('".$fnm."','".$lnm."','".$country."','".$address_line1."',
              '".$address_line2."','".$city."','".$state."','".$pincode."','".$phone."','".$email."',
              '".$note."','".$pid."','".$uid."','".$key."','".$payment."','".$t."')";
          
          mysqli_query($link,$q);
          $order_id=mysqli_insert_id($link);
          header("location:order.php?orderid=".$order_id."&key=".$key);

      }
   }
   else
   {
     header("locationn:index.php");
   }


?>