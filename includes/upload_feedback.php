<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Feedback</title>
    <style>
        .bg-image-feed{
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../images/1.png') ;
            background-size: cover;
            min-height: 100vh;
        }
        .slider {
            position: relative;
            width: 80%;
            max-width: 800px;
            margin: auto;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .slide {
            display: none;
            padding: 20px;
            text-align: center;
        }
        .active-slide {
            display: block;
        }
        .slider-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
        .slider-controls button {
            /* background-color: rgba(0, 0, 0, 0.5); */
            border: none;
            color: #CE8155;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- ///////////////////////////////////////////chatbotBtn//////////////////////////////////////////////////////// -->
  <button id="chatbotBtn" title="Chat with us">
    <i class="fas fa-comments"></i>
  </button>
  
  <div class="chat-container">
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
        <a href="index.html" class="navbar-brand text-white"  ><img src="../images/logooo.png" class="logo" width="0px" alt="logo" /></a>
        </div> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
                <a href="../index.html" class="nav-link active text-white text-center hov" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
                <a href="../about.html" class="nav-link active text-white text-center hov" aria-current="page">About</a>
            </li>
            <li class="nav-item">
                <a href="../blog.html" class="nav-link active text-white text-center hov" aria-current="page">Blog</a>
            </li>
            <li class="nav-item">
                <a href="../Projects.php" class="nav-link active text-white text-center hov" aria-current="page">Projects</a>
            </li>
            <li class="nav-item">
                <a href="../form.php" class="nav-link active text-white text-center  " aria-current="page">Contact</a>
            </li>
            </ul>
            
        </div>
        </div>
    </nav>
   
    <!-- ///////////////////////////////////////////Feedback-slider//////////////////////////////////////////////////////// -->
  <section class=" my-5 mb-3  py-5 pb-0 bg-image-feed bg-danger">
    <div class=" w-100 m-auto d-flex justify-content-center">
    <h1 class=" title fw-bold mb-5">Feedback</h1>
    </div>
    <div class="slider">
        <?php
        require_once 'db_handeler.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $pdo->prepare('UPDATE feedback SET msg_status = 1 WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        $stmt = $pdo->prepare('SELECT * FROM feedback WHERE msg_status = 1');
        $stmt->execute();
        $approved_feedbacks = $stmt->fetchAll();

        foreach ($approved_feedbacks as $index => $feedback) {
            echo '<div class="slide'.($index === 0 ? ' active-slide' : '').'">';
            echo '<p class=" fw-bold fs-3 title"> '. htmlspecialchars($feedback['full_name']). '</p>';
            echo '<p> '. htmlspecialchars($feedback['msg']). '</p>';
            echo'<p ><i class="fa-solid fa-star" style="color: #FFD43B;"></i><i class="fa-solid fa-star" style="color: #FFD43B;"></i><i class="fa-solid fa-star" style="color: #FFD43B;"></i><i class="fa-solid fa-star" style="color: #FFD43B;"></i><i class="fa-solid fa-star" style="color: #FFD43B;"></i></p>';
            echo '</div>';
        }
        ?>
        <div class="slider-controls">
            <button onclick="changeSlide(-1)">&#10094;</button>
            <button onclick="changeSlide(1)">&#10095;</button>
        </div>
    </div>
     <!-- ///////////////////////////////////////////Feedback-Form-Link//////////////////////////////////////////////////////// -->
     <section class=" container mt-4">
       <div class="  w-100 m-auto">
       <h2 class=" d-flex justify-content-center fw-bolder title">Let us know your feedback</h2>
        <a href="../feedback.php" class=" d-flex justify-content-center my-3">
        <button class="btn btn-primary">
            Click here
        </button>
        </a>
       </div>
    </section>

  </section>
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');

        function changeSlide(direction) {
            slides[currentSlide].classList.remove('active-slide');
            currentSlide = (currentSlide + direction + slides.length) % slides.length;
            slides[currentSlide].classList.add('active-slide');
        }

        setInterval(() => {
            changeSlide(1);
        }, 5000); // Change slide every 5 seconds
    </script>
<!-- {/* ///////////////////////////////////Footer////////////////////////////////////// */} -->
<section class="pt-3 bg-brown">
    <div class="container">
       <div class="row">
       <div class="col-md-3">
        <div class=" w-100">
        <img src="../images/logooo.png" class="w-75 m-auto d-flex justify-content-center align-items-center  mt-3 mb-3  ms-1 " alt="" />
          <p class=" text-white mb-2 foot-text fs-5">From sleek interfaces to seamless interactions, we craft immersive digital experiences that resonate with your audience.</p>
        </div>
       </div>
       
       <div class="col-md-3">
         <div class=" text-white mt-5">
         <h1 class="mt-3 mb-4 fs-3 fw-bold title">Links u need</h1>
         <a href="index.html"><p class=" text-white" ><i class="fa-solid fw-bolder fa-arrow-right "></i> Home</p></a>
         <a href="about.html"><p class=" text-white" ><i class="fa-solid fw-bolder fa-arrow-right"></i> About</p></a>
         <a href="blog.html"><p class=" text-white" ><i class="fa-solid fw-bolder fa-arrow-right"></i> Blogs</p></a>
         <a href="Projects.html" ><p class=" text-white" ><i class="fa-solid fw-bolder fa-arrow-right"></i> Services</p></a>
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
           <a href="https://www.facebook.com/profile.php?id=61559700548518&mibextid=ZbWKwL"
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
       <div class="mt-5">
       <h2 class="mt-3 mb-4 fw-bolder fs-3 title">Your Feedback?</h2>  
        
       <a href="../feedback.php"><button class="btn btn-outline-info w-100">Feedback</button></a>

       <h2 class="mt-3 mb-4 fw-bolder fs-3 title">People Opinon about us</h2>  
        
       <a href="upload_feedback.php"><button class="btn btn-outline-info w-100">Feedback</button></a>
       
            
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
