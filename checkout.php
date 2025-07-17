<?php session_start();

  error_reporting(0);
  if(! isset($_SESSION['client']['status']))
  {
      header("location:login.php");
      exit;
  }
  else if(empty($_SESSION['cart']))
  {
      header("location:products.php");
      exit;
  }

  include("include_files/header.php");

?>

<div class="container mt-5 mb-5">
  <div class="row">
    <!-- Left: Billing Details -->
    <div class="col-md-7 mb-4">
      <div class="checkout-box">
        <h4>Billing Details</h4>

        <form action="checkout_process.php" method="post">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>First Name*</label>
              <input type="text" class="form-control" placeholder="First Name" name="fnm">
              <?php
                if(isset($_SESSION['error']['fnm']))
                {
                    echo '<font color="red">'.$_SESSION['error']['fnm'].'</font>';
                }
            ?>
            </div>

            <div class="form-group col-md-6">
              <label>Last Name*</label>
              <input type="text" class="form-control" placeholder="Last Name" name="lnm">
              <?php
                if(isset($_SESSION['error']['lnm']))
                {
                    echo '<font color="red">'.$_SESSION['error']['lnm'].'</font>';
                }
              ?>
            </div>
          </div>

          <div class="form-group">
            <label>Country*</label>
            <select class="form-control" name="country">
              <option selected value="0">Select Country</option>
              <option>India</option>
              <option>USA</option>
              <option>Canada</option>
            </select>
          </div>
          <?php
            if(isset($_SESSION['error']['country']))
            {
                echo '<font color="red">'.$_SESSION['error']['country'].'</font>';
            }
          ?>

          <div class="form-group">
            <label>Address*</label>
            <input type="text" class="form-control mb-2" placeholder="Street Address" name="address_line1">
            <?php
              if(isset($_SESSION['error']['address_line1']))
              {
                  echo '<font color="red">'.$_SESSION['error']['address_line1'].'</font>';
              }
            ?>
            <input type="text" class="form-control" placeholder="Apartment, suite, unit etc (optional)" name="address_line2">
          </div>

          <div class="form-group">
            <label>City*</label>
            <input type="text" class="form-control" name="city">
          </div>
          <?php
            if(isset($_SESSION['error']['city']))
            {
                echo '<font color="red">'.$_SESSION['error']['city'].'</font>';
            }
          ?>

          <div class="form-group">
            <label>State*</label>
            <input type="text" class="form-control" name="state">
          </div>
          <?php
            if(isset($_SESSION['error']['state']))
            {
                echo '<font color="red">'.$_SESSION['error']['state'].'</font>';
            }
          ?>

          <div class="form-group">
            <label>Pincode*</label>
            <input type="text" class="form-control" name="pincode">
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Phone*</label>
              <input type="text" class="form-control" name="phone">
              <?php
                if(isset($_SESSION['error']['phone']))
                {
                    echo '<font color="red">'.$_SESSION['error']['phone'].'</font>';
                }
              ?> 
            </div>

            <div class="form-group col-md-6">
              <label>Email Address*</label>
              <input type="email" class="form-control" name="email">
              <?php
                if(isset($_SESSION['error']['email']))
                {
                    echo '<font color="red">'.$_SESSION['error']['email'].'</font>';
                }
              ?>
            </div>
            
          </div>
          <div class="form-group">
            <p>Order notes*</p>
            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="note">
          </div>
      </div>
    </div>

    <!-- Right: Order Summary -->
    <div class="col-md-5">
      <div class="checkout-box order-summary">
        <h4>Your Order</h4>
        <table class="table">
          <tbody>
            <?php 
              $total=0;
              foreach($_SESSION['cart'] as $val)
              {
                $price=$val['qty']*$val['price'];
                $total+=$price;
                echo '<tr>
                        <td>'.$val['nm'].'</td>
                        <td>₹'.$price.'</td>
                      </tr>';
              }

            ?>

            <tr>
              <th>Subtotal</th>
              <th>₹<?php  echo $total; ?></th>
            </tr>
            <tr>
              <th class="total">Total</th>
              <th class="total">₹<?php  echo $total; ?></th>
            </tr>
          </tbody>
        </table>

        <p class="text-muted" style="font-size: 14px;">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
        </p>

        <div class="form-check mb-3">
          <input type="checkbox" class="form-check-input codcheckbox" id="cod" name="payment" value="cash on delivery">
          <label class="form-check-label" for="cod">Cash on Delivery</label>
        </div>
        <?php
          if(isset($_SESSION['error']['payment']))
          {
              echo '<font color="red">'.$_SESSION['error']['payment'].'</font>';
          }
        ?>

        <button class="btn btn-order btn-block">Place Order</button>

        <?php
            if(! empty($_SESSION['error']))
            {
                unset($_SESSION['error']);
            }
        ?>
        
      </div>
    </div>
    </form>
  </div>
</div>

<?php
  include("include_files/footer.php");
?>