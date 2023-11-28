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
<title>Shopping Cart - Health Point</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

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
          <a class="nav-link " aria-current="page" href="index.php">Home</a>
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
          <a class="nav-link active" aria-current="page" href="cart.php">Basket</a>
        </li>
      
        
     
      
      </ul>
    
    </div>
  </div>
</nav>
<section class="bg-dark text-light text-center banner-cart">
<h2 class="pt-5">
                          <span class="pb-1">
Shopping Cart                       </span>
                      </h2>
</section>
<section class="shoppingcart mt-3">
  <div class="container-fluid ">
    <h2 class="text-center">Shopping Cart</h2>
    <div class="row justify-content-center">
      <div class=" col-8 ">
     <div class="table-responsive">
      <table class="table  table-bordered  table-hover" width="100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Product 1</td>
      <td><input type="number" value="1" min="0" max="10" step="1"/></td>
      <td>9</td>
      <td><button class="btn btn-danger" value="">Remove</button></td>
    </tr>
  </tbody>
</table>
      
     </div>
      </div>
      <div class="col-4 float-end">
<table class="table table-bordered table-hover"><tr><td colspan="2" class="text-center"><strong>Order Summary</strong></td></tr>

<tbody>
  <tr><td>Total Items</td><td>1</td></tr>
  <tr><td>Delivery</td><td>1</td></tr>

  <tr><td>Total Price</td><td>9</td></tr>

</tbody></table>
<hr>
<div class="mt-3 d-grid gap-2">

  <button class="btn btn-success"> Proceed To Checkout</button>
</div>
      </div>
    </div>
  </div>    



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
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap-spinner.js"></script>
<script src="js/main.js"></script>
</html>

