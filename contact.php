<?php
    include("include_files/header.php");
?>

<!-- inner page section -->
<section class="inner_page_head">
   <div class="container-fluid"> 
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <h3>contact Us</h3>
                <nav aria-label="breadcrumb" class="text-center">
                  <ol class="breadcrumb bg-transparent p-0 mt-2 justify-content-center">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Contact</li>
                  </ol>
                </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end inner page section -->

      <!-- contact section -->
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full contactpg">
                     <form action="contact_process.php" method="post">
                        <fieldset>
                           <label>Full Name:</label><input type="text" placeholder="Enter your full name" name="fnm">
                           <label>Email:</label><input type="email" placeholder="Enter your email address" name="email" style="text-transform: lowercase;">
                           <label>Message:</label><textarea name="msg" placeholder="enter message"></textarea>
                           <input type="submit" value="Submit" />
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end contact section -->

<?php
    include("include_files/footer.php");
?>