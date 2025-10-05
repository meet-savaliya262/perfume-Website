<?php
   include("include_files/header.php");
?>
<section class="inner_page_head">
   <div class="container-fluid"> 
      <div class="row">
         <div class="col-md-12">
            <div class="full text-center">
               <h3 class="text-white">Contact Us</h3>
               <nav aria-label="breadcrumb">
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

<?php
   if(isset($_SESSION['status']) && $_SESSION['status']=="success") 
   {
      echo '<div class="container mt-3">
               <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
                 <div>✅ Your contact details successfully sent!</div>
                 <i class="fas fa-times close-icon ms-3" data-bs-dismiss="alert" aria-label="Close" style="cursor:pointer;"></i>
               </div>
            </div>';
      unset($_SESSION['status']);
   }
   else if(isset($_SESSION['status']) && $_SESSION['status']=="error") 
   {
      echo '<div class="container mt-3">
               <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
                 <div>⚠️ Please fill all fields before submitting!</div>
                 <i class="fas fa-times close-icon ms-3" data-bs-dismiss="alert" aria-label="Close" style="cursor:pointer;"></i>
               </div>
            </div>';
      unset($_SESSION['status']);
   }
?>


<section class="contact-modern layout_padding">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="contact-card">
               <h2 class="form-title">Get In Touch</h2>
               <p class="form-subtitle">We’d love to hear from you! Fill out the form below.</p>

               <form action="contact_process.php" method="post">
                  <div class="form-group">
                     <input type="text" name="fnm" required>
                     <label>Full Name</label>
                  </div>

                  <div class="form-group">
                     <input type="email" name="email" style="text-transform: lowercase;" required>
                     <label>Email Address</label>
                  </div>

                  <div class="form-group">
                     <textarea name="msg" rows="4" required></textarea>
                     <label>Your Message</label>
                  </div>

                  <button type="submit" class="btn-submit">Send Message</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<?php 
   include("include_files/footer.php"); 
?>
