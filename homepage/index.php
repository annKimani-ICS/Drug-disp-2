<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8ac8a26b33.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>MediDispense - Your Trusted Drug Dispensing Tool</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,600&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head>
<body>
  <section class="header">
<nav>
  <a href=" index.php"><img src="health.png"></a>
  <div class="nav-links">
    <!--<i class="fa-solid fa-xmark" onclick="hideMenu()"></i>-->
  <ul>
    <li><a href="#about">About Us</a></li>
    <li><a href="#features">Features</a></li>
    <li><a href="#partnerships">Partnerships</a></li>
    <li><a href="#testimonials">Testimonials</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
  </div>
  <!--<i class="fa-solid fa-bars"  onclick="showMenu()"></i>-->
</nav>
<div  class = "text-box">
  <h1>Welcome to MediDispense</h1>
  <p >Your Trusted Drug Dispensing Tool</p>
  <a href="../register/signup.html" class = 'hero-btn'>Sign Up</a>
  <a  href = "../loginpage/index.html"class = 'hero-btn'>Login</a>
</div>

  </section>
  <!--  Offers -->
  <section class ="offers">
    <h1>About Us</h1>
    <p>MediDispense is your go-to solution for efficient and secure drug dispensing. We are dedicated to simplifying the process of medication distribution, ensuring patients receive the right medications at the right time.</p>

    <h1>Features</h1>
    <div class="row">
    <div class="offer-col">
        <h3>Automated Dispensing</h3>
        <p>Our cutting-edge tool automates the medication dispensing process, reducing errors and saving time</p>
  
    </div>
    <div class="offer-col">
      <h3>Inventory Management</h3>
      <p>Keep track of medication inventory in real-time, ensuring you never run out of essential drugs.</p>
    
    </div>
    <div class="offer-col">
      <h3>Secure and Compliant</h3>
      <p>We prioritize security and compliance, so you can trust us with your patients' health.</p>
    
    </div>
    </div>

 <!-----
    <div class="row">
    <div class="offer-col">
        <img src="autodispenser.jpg">
        <div class="layer">
            <h3>Automated Dispensing</h3>
            <p>Our cutting-edge tool automates the medication dispensing process, reducing errors and saving time.</p>
        </div> 
        </div>
    <div class="offer-col">
            <img src="inventory.jpeg" alt="inventory">
            <div class="layer">
                <h3>Inventory Management</h3> 
                <p>Keep track of medication inventory in real-time, ensuring you never run out of essential drugs.</p>
            </div>
            </div>
    <div class="offer-col">
        <img src="security.jpg" alt="security">
        <div class="layer">
            <h3>Secure and Compliant</h3>
            <p>We prioritize security and compliance, so you can trust us with your patients' health.</p>
        </div>
    </div>
    </div>
    -->

</section>

<!-- Partnerships Section -->
<section class="branch" id="partnerships">
    <h2>Partnerships</h2>
    <p>We are proud to partner with leading pharmaceutical companies and healthcare providers to enhance our drug dispensing tool's capabilities and ensure the best possible service for our users.</p>
    <ul>
        <h3>Glaxosmithkline</h3>
        <img src="glaxosmithkline.jpeg" alt = "glaxosmithkline">
        <li>Partner 2</li>
        <li>Partner 3</li>
    </ul>
</section>




<!----------Testimonials-->
<section class="testimonials">
  <h1>What people say</h1>
  
  <div class="row">
<div class="test-col">
  <img src="images/pexels-ogo-1486213.jpg">
  <div>
    <p>"MediDispense has transformed our pharmacy operations. It's intuitive, reliable, and has greatly reduced medication errors."
    </p>
    <p>- Dr. Sarah Johnson</p>
  </div>
</div>
<div class="test-col">
  <img src="images/pexels-shvets-production-7533347.jpg">
  <div>
    <p>"I can't imagine managing our clinic's medication dispensing without MediDispense. It's a game-changer!"
    </p>
    <p>- John Smith, RN</p>
  </div>
</div>


  </div>



</section>

  <!----------JavaScript for toggle menu----------->
  <script>
    var navLinks = document.getElementById("navLinks");
    function showMenu(){navLinks.style.right ="0";}
    function hideMenu(){navLinks.style.right="-200px"; }
  </script>
  
</body>
</html>