<?php
include('connection.php');
session_start();

$query = "SELECT * FROM projects";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "No projects found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Solarium</title>
</head>
<body>
    <!-- ///////////////////////////////////////////Scroll_to_top//////////////////////////////////////////////////////// -->
    <button id="scrollToTopBtn" title="Go to top">
        <i class="fas fa-arrow-up"></i>
    </button>
  <!-- ///////////////////////////////////////////chatbotBtn//////////////////////////////////////////////////////// -->
  <button id="chatbotBtn" title="Chat with us">
    <i class="fas fa-comments"></i>
</button>

<div class="chat-container" id="chat-container">
    <div id="chatbox">
        <div id="chat-log"></div>
    </div>
    <input type="text" id="user-input" placeholder="Ask about solar panels..." autofocus>
    <button id="send-button">Send</button>
</div>

  
     <!-- ///////////////////////////////////////////whatsappBtn//////////////////////////////////////////////////////// -->
    <button id="whatsappBtn" title="Contact us on WhatsApp">
        <i class="fab fa-whatsapp whatsapp-icon"></i>
    </button>
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
    <!-- ///////////////////////////////////////////Header////////////////////////////////////////////////////////// -->
    <header class=" mt-5 pt-3">
        <div class="container mt-5">
            <div class="row align-items-end justify-content-end">
                <div class="col-md-6">
                    <div class=" mt-5 pt-5 text-white align-items-end justify-content-end">
                        <h1 class="mt-5 pt-5">Power Life on Your Terms</h1>
                    <p class=" mt-3 fs-5">Get ahead of your energy needs with cutting-edge solar and home backup.</p>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
                </div>
        </div>
    </header>
<!-- ///////////////////////////////////////////Projects////////////////////////////////////////////////////////// -->
<section class=" my-5">
<div class="container">
<div class="mytitle text-center my-5">
                <h2 class="fw-bold fs-1 wow animate__animated  animate__fadeInDownBig title">Solar projects made in Egypt.</h2>
            </div>
    <div class="row g-3">
    <?php while ($project = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-4">
        <div class="shadow-lg rounded-3 p-4">
            <div class="zoom rounded-5">
                <?php
                $images = explode(',', $project['images']);
                if (!empty($images[0])) {
                    echo "<img src='" . $images[0] . "' class='w-100 rounded-5' alt='Project Image'>";
                } else {
                    echo "<div class='img'></div>";
                }
                ?>
            </div>
            <div class=" text-center fs-3 my-3 title fw-bolder"><?php echo $project['projectName']; ?></div>
            <div><?php echo $project['projectDesc']; ?></div>
        </div>
        </div>
    <?php } ?>
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