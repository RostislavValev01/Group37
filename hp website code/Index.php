<?php
//include connection config
       include('connection.php');

// session start
session_start();
 

 
 
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
<title>Homepage - Health Point</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
</style>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="index.php"><img src="img/hplogo3.png" height="50"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="contact.php">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="productPage.php">Prescriptions</a></li>
            <li><a class="dropdown-item" href="productPage.php">Skin Care</a></li>
            <li><a class="dropdown-item" href="productPage.php">Hair Care</a></li>
            <li><a class="dropdown-item" href="productPage.php">Medication</a></li>
          </ul>
        </li>
     
      
      </ul>
      <form class="d-flex " action="/search" method="get">       

        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="login.php">Account/Login</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="cart.php">Basket</a>
        </li>
      
        
     
      
      </ul>
    
    </div>
  </div>
</nav>
<section class="home-slider">
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="img/slider.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/slider.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/slider.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
<section class="home mt-3">
<div class="container">
<div class="row">
  <div class="col-2"><img src="img/hplogo3.png" alt="LA" style="width:100%">
</div>
<div class="col-10">
 <h1>Company Intro</h1>
 <p>This is a paragraph.</p>
 <p>This is another paragraph.</p>
</div>
</div>

</div>

</section>
<section class="product-category mt-3">
<div class="container-fluid">
<div class="row">
  <div class="col-2"> <h1>Category</h1>
</div>
  <div class="col-2">
    <div class="card" >
  <img src="img/na.jpg" class="card-img-top" alt="Product">
  <div class="card-body">
    <h5 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div></div>
<div class="col-2">
    <div class="card" >
  <img src="img/na.jpg" class="card-img-top" alt="Product">
  <div class="card-body">
    <h5 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div></div>
<div class="col-2">
    <div class="card" >
  <img src="img/na.jpg" class="card-img-top" alt="Product">
  <div class="card-body">
    <h5 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div></div>
<div class="col-2">
    <div class="card" >
  <img src="img/na.jpg" class="card-img-top" alt="Product">
  <div class="card-body">
    <h5 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div></div>
<div class="col-2">
    <div class="card" >
  <img src="img/na.jpg" class="card-img-top" alt="Product">
  <div class="card-body">
    <h5 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div></div></div>


</section>
<section class="footer">
<div class="container-fluid">
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-body-secondary">© 2023 Health Point</p>

 
  </footer>

</div>
</section>
</body>
<script src="js/bootstrap.min.js"></script>

</html>

