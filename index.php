<!--<?php
   require_once 'header.php';
?>-->

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>

<!-- Load an icon library -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

<div class="navbar">
  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="login.php"><i class="fa fa-fw fa-user"></i>Log In</a>
  <a href="about.php"><i class="fa fa-fw fa-info-circle"></i>About Us</a>
  <a href="contact.php"><i class="fa fa-fw fa-envelope"></i>Contact Us</a>

 </div>
</header>
<div style="text-align:center">
     <h2><div style="text-align:center">
     <h2>VISITORS GATEPASS MANAGEMENT SYSTEM </h2>
    <p>Welcome to Visitors Gatepass Management System  </p>
  </div>
   
   <!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <img src="house0.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="house6.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="house4.jpg" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<script type="text/javascript">
	var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1} 
  slides[slideIndex-1].style.display = "block"; 
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</body>
</html>