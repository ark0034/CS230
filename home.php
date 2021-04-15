<?php
require "includes/header.php"
?>
 
 <link rel="stylesheet" href="../css/home.css">
 <link rel="stylesheet" href="css/gallery.css">

 <!-- Slideshow container -->
 <div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides" style="display: block;">
  <div class="numbertext">1 / 4</div>
  <img src="images/home/img1.jpg" style="width:100%; height: 40%;">
</div>

<div class="mySlides">
  <div class="numbertext">2 / 4</div>
  <img src="images/home/img2.jpg" style="width:100%; height: 40%;">
</div>

<div class="mySlides">
  <div class="numbertext">3 / 4</div>
  <img src="images/home/img3.jpg" style="width:100%; height: 40%;">
</div>

<div class="mySlides">
  <div class="numbertext">4 / 4</div>
  <img src="images/home/img4.jpg" style="width:100%; height: 40%;">
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- The dots/circles -->
<div style="text-align:center; padding-top: 10px; padding-bottom: 10px; background-color: #343a40;">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
<span class="dot" onclick="currentSlide(4)"></span>
</div> 

<br>

<h1 style="text-align: center; color: white;">Welcome Home to Priti Creations</h1>
<h5 style="text-align: center; color: white;">Check out today's featured items</h5>

<div class="gallery-container">
        <?php 
        include_once 'includes/dbhandler.php';
        $sql = "SELECT * FROM gallery ORDER BY upload_date DESC LIMIT 3";
        $query = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($query)){
            echo '<div class="card">
    <a href="review.php?id='.$row['pid'].'">
    <img src="gallery/'.$row['picpath'].'">
    <h3>'.$row['title'].'</h3>
    <p>'.$row['descript'].'</p></div>';
        }
        ?>
</div>

<!--JS for the image slide show-->
<script>
var slideIndex=1;

showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
} 
</script>