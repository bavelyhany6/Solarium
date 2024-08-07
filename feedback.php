<?php 
require_once "includes/session.php";
require_once "includes/view_feed.php";
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Solarium</title>
    <style>
    #error-messages {
        color: red;
    }
</style>
</head>
<body>
    <!-- ///////////////////////////////////////////Navbar//////////////////////////////////////////////////////// -->
<nav class="navbar navbar-expand-lg bg-brown testmo navo fixed-top z-3 start-0 end-0 ">
    <div class="container">
     <div class=" d-flex justify-content-between align-items-center">
      <a href="index.html" class="navbar-brand text-white"  ><img src="images/logooo.png" class="logo" width="0px" alt="logo" /></a>
     </div> 
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         
          <li class="nav-item">
            <a href="index.html" class="nav-link active text-white text-center hov" aria-current="page">Home</a>
          </li>
          <li class="nav-item">
            <a href="about.html" class="nav-link active text-white text-center hov" aria-current="page">About</a>
          </li>
          <li class="nav-item">
            <a href="blog.html" class="nav-link active text-white text-center hov" aria-current="page">Blog</a>
          </li>
          <li class="nav-item">
            <a href="Projects.php" class="nav-link active text-white text-center hov" aria-current="page">Projects</a>
          </li>
          <li class="nav-item">
            <a href="form.php" class="nav-link active text-white text-center  " aria-current="page">Contact</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>

   <section class=" mt-5 pt-5" id="form-bg">
    <div class="container d-flex justify-content-center">
        <div class="w-25">
        <h1 class="title d-flex justify-content-center mb-4 fw-bold">Feedback</h1>
            <div class=" border border-3 border-white rounded-5 p-4 d-flex justify-content-center card-wh-shadow">
               
                <form  action=" includes\feedback_handeler.php" method="post">
                                    <div id="error-messages">
                                            <?php check_errors(); ?>
                                        </div>
                    <label for=" name" class=" text-white fw-bold">  Name:</label><br>
                    <input type="text" class=" mb-3" id="name" name="name"><br>
                    
                    <label for="email" class=" text-white fw-bold">E-mail:</label><br>
                    <input type="text" class=" mb-3" id="email" name="email"><br>

                    <label for="feedback" class=" text-white fw-bold">Feedback:</label><br>
                    <textarea type="text" class=" mb-3" id="feedback" name="message"></textarea><br>
                    
                        <button class=" btn btn-info">submit</button>
                </form>
            </div>
        </div>
    </div>
   </section>
<!-- {/* ///////////////////////////////////Footer////////////////////////////////////// */} -->
  <section class="pt-3 bg-brown">
    <div class="container">
       <div class="row">
       <div class="col-md-3">
        <div class=" w-100">
        <img src="images/logooo.png" class="w-75 m-auto d-flex justify-content-center align-items-center  mt-3 mb-3  ms-1 " alt="" />
          <p class=" text-white mb-2 foot-text fs-5">From sleek interfaces to seamless interactions, we craft immersive digital experiences that resonate with your audience.</p>
        </div>
       </div>
       
       <div class="col-md-3">
         <div class=" text-white mt-5">
         <h1 class="mt-3 mb-4 fs-3 fw-bold title">Links u need</h1>
         <a href="index.html"><p class=" text-white" ><i class="fa-solid fw-bolder fa-arrow-right "></i> Home</p></a>
         <a href="about.html"><p class=" text-white" ><i class="fa-solid fw-bolder fa-arrow-right"></i> About</p></a>
         <a href="blog.html"><p class=" text-white" ><i class="fa-solid fw-bolder fa-arrow-right"></i> Blogs</p></a>
         <a href="Projects.php" ><p class=" text-white" ><i class="fa-solid fw-bolder fa-arrow-right"></i> Projects</p></a>
         <a  href="form.php"><p class=" text-white"><i class="fa-solid fw-bolder fa-arrow-right"></i> Contact Us</p></a>
         </div> 
       </div>
       <div class="col-md-3">
          <div class=" text-white foot-right mt-5 ">
          <h2 class="mt-3 mb-4 fw-bolder fs-3 title"> Contact Us</h2>
          <p> <i class="fa-solid fw-bolder fa-phone"></i> 01211122057</p>
          <p><i class="fa-solid fa-map-location "></i> Elmaady</p>
          <p><a href="https://solarium.eg.info@gmail.com"  target="_blank" class="text-white fw-bolder"><i class="fa-solid fa-envelope"> </i>  solarium.eg.info@gmail.com </a></p>
          <ul class=" d-flex align-items-center justify-content-start fs-5 text-white list-unstyled mb-4 mt-4">
           <a href=""
             
             target="_blank"
           >
             <li>
               <i class="fa-brands fa-instagram me-4  text-white insta"></i>
             </li>
           </a>
           <a href="https://www.facebook.com/profile.php?id=61560313323311&mibextid=ZbWKwL"
            target="_blank"
           >
             <li>
               <i class="fa-brands fa-facebook me-4 tik  text-white"></i>
             </li>
           </a>
           <a href="https://solarium.eg.info@gmail.com"
             target="_blank"
           >
             <li>
               <i class="fa-solid fa-m me-4 email  text-white"></i>
             </li>
           </a>

           <a href="https://wa.me/01211122057" target="_blank">
             <li>
               <i class="fa-brands fa-whatsapp whats me-4  text-white"></i>
             </li>
           </a>
         </ul>
          </div>
       </div>
       <div class="col-md-3">
       <div class=" mt-5">
       <h1 class="mt-3 mb-4 fs-3 fw-bold title">Your Feedback?</h1>
        <a href="feedback.php"><button class=" btn btn-outline-info w-100">Feedback</button></a>
       <h1 class="mt-3 mb-4 fs-3 fw-bold title">People Opinon about us</h1>
        <a href="includes/upload_feedback.php"><button class=" btn btn-outline-info w-100">Feedback</button></a>
       </div>
       </div>
      
       
       </div>
    </div>
   </section> 

    <?php 
    check_errors();
    ?>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
        new WOW().init();
      </script>
     <script src="js/main.js"></script>
</body>
</html>