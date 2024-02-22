<?php
//include connection config
include('connectdb.php');
// session start
session_start(); 


if(isset($_SESSION["Customer_ID"]) && $_SESSION["loggedin"] === true){


	$cID=$_SESSION["Customer_ID"] ;

}
else
{

  header('Location: signInPageCustomer.php');
}
$query = 'SELECT * FROM customerbasket  WHERE CustomerID = '.$cID;
$result = mysqli_query($con, $query) or die (mysqli_error($con));
$sum = 0;
$count = 0;

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
<title>Shopping Cart - Health Point</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/contact.css">

</head>
<style>
</style>
<body class="">
<nav class="banner">
<a href="index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
<form action="productPage.php" method="get">
  <input type="text" name="search" class="search-bar"
    value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>" placeholder="Search products...">
  <input type="submit" value="Go" class="search-bar-go">
</form>
    <?php
    if (isset($_SESSION['loggedin'])) {
      if (isset($_SESSION['AdminStatus']) && $_SESSION['AdminStatus'] == 1) {
        ?>
        <nav class="header">
          <button><a href="AdminAccounts.php">Account</a></button>
          <button><a href="Cart.php">Basket</a></button>
          <button><a href="Contact.php">Contact Us</a></button>
          <button><a href="logout.php">Logout</a></button>
        </nav>
        <?php
      } else if (isset($_SESSION['AdminStatus']) && $_SESSION['AdminStatus'] == 0) {
        ?>
          <nav class="header">
            <button><a href="CustomerAccounts.php">Account</a></button>
            <button><a href="Cart.php">Basket</a></button>
            <button><a href="Contact.php">Contact Us</a></button>
            <button><a href="logout.php">Logout</a></button>
          </nav>
        <?php
      }
    } else {
      ?>
      <nav class="header">
        <button><a href="signInPageCustomer.php">Sign In</a></button>
        <button><a href="Cart.php">Basket</a></button>
        <button><a href="Contact.php">Contact Us</a></button>
      </nav>
      <?php
    }
    ?>
  </nav>

  <nav class="header-nav">
    <ul class="navigation-bar">
      <li><a href="Index.php">Home</a></li>
      <li><a href="AboutUs.php">About Us</a></li>
      <nav class=Products>
        <a href="productPage.php"><button class="dropbtn">Products</button></a>
        <nav class="products-content">
          <a href="productPage.php?Product_Category=General">General Medication</a>
          <a href="productPage.php?Product_Category=SkinCare">SkinCare</a>
          <a href="productPage.php?Product_Category=Haircare">HairCare</a>
          <a href="productPage.php?Product_Category=DentalCare">DentalCare</a>
          <a href="productPage.php?Product_Category=Vitamins_Supplements">Vitamins and Supplements</a>
        </nav>
      </nav>
    </ul>
  </nav>
  <div class="content content-basket">

<section class=" mt-3">
    <h2 class="text-center">Shopping Cart</h2>
    <div class="row justify-content-center">
    <div style="width:60%;float:left;">
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
  <?php                  


                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo '<tr>';
                                    echo '<td>'. $row['ProductID'].'</td>';
                                    echo '<td>'. $row['ProductName'].'</td>';
                                   // echo '<td><input type="number" value="'. $row['Quantity'].'" min="0" max="10" step="1"/></td>';
                                   echo '<td>'. $row['Quantity'].'</td>';
                                    echo '<td>'. $row['Price'].'</td>';
                                    echo '<td>';

                                    echo ' <a  type="button" class="btn btn-danger" href="removefromcart.php?ProductID=' . $row['ProductID'].'">Remove </a> </td>';
                                    echo '</tr> ';
                                    $sum=$sum+ $row['Price'];
                                    $count=$count+ $row['Quantity'];

                                   // $count++;
                        }
                    ?> 

  </tbody>
</table>

     </div>
      </div>
      <div style="width:10%"></div>
      <div style="width:30%;float:right;">
<table class="table table-bordered table-hover"><tr><td colspan="2" class="text-center"><strong>Order Summary</strong></td></tr>

<tbody>
  <tr><td>Total Items</td><td><?php echo $count; ?> </td></tr>


  <tr><td>Total Price</td><td><?php echo $sum;?></td></tr>

</tbody></table>

      </div>
    </div>



</section>
<hr>
<div class="mt-3 d-grid gap-2">

  <button class="btn btn-success" style="float:right;" onclick="location.href='CheckoutPage.php';"> Proceed To Checkout</button>
</div>
</div>
<footer class="footer">
  <div class="footer-section">
    <div>
      <a href="index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
    </div>
    <div>
      <p>© 2023 HealthPoint. All rights reserved.

        The content, design, and images on this website are the property of HealthPoint and are protected by
        international copyright laws. Unauthorized use or reproduction of any materials without the express written
        consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are trademarks of
        HealthPoint.

        For inquiries regarding the use or reproduction of any content on this website, please contact us at
        HealthPoint@pharmacy.com</p>

    </div>
  </div>
</footer>
</body>
</html>

