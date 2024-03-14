<?php
//include connection config
include('connectdb.php');
// session start
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<?php
include_once "layouts/head.php";
?>

<body class="">
<?php
include_once "layouts/header.php";
?>


<div class="content">
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="productImages/slider.png" class="d-block w-100" style="max-height: 500px;" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="productImages/slider.png" class="d-block w-100" style="max-height: 500px;" alt="...">

            </div>
            <div class="carousel-item">
                <img src="productImages/slider.png" class="d-block w-100" style="max-height: 500px;" alt="...">

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
<section class="home mt-3">
<div class="row">
  <div class="col-2" style="width:20%">
</div>
<div class="col-12">
 <h3>Our Highlighted Products</h3>

</div>
</div>


</section>
<section class="product-category mt-3">
<div class="row">
  <div style="width:100%"> <h1>Category</h1>
</div></div>

<br>
    <?php

    $query = 'SELECT `ProductName`,`Product_Description`,`ProductSKU`,`image` FROM stock  limit 10';
    $result = mysqli_query($con, $query) or die (mysqli_error($con));
    $all_product=mysqli_fetch_array($result);
    ?>


<!--    <a href="productPage.php?Product_Category=General">General Medication</a>-->
<!--    <a href="productPage.php?Product_Category=SkinCare">SkinCare</a>-->
<!--    <a href="productPage.php?Product_Category=Haircare">HairCare</a>-->
<!--    <a href="productPage.php?Product_Category=DentalCare">DentalCare</a>-->
<!--    <a href="productPage.php?Product_Category=Vitamins_Supplements">Vitamins and Supplements</a>-->
<div class="row">


    <div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
        <div style="display: flex;flex-direction: column;">
            <a style="text-decoration: none" href="productPage.php?Product_Category=General">
            <img src="productImages/General_Medication.jpg" class="img-thumbnail img-pop"/>
            <span style="text-align: center;width: 100%;color: black">
                General Medication
            </span></a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
        <div style="display: flex;flex-direction: column;">
            <a style="text-decoration: none" href="productPage.php?Product_Category=SkinCare">
            <img src="productImages/General_Medication.jpg" class="img-thumbnail img-pop"/>
            <span style="text-align: center;width: 100%;color: black">
                SkinCare
            </span></a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
        <div style="display: flex;flex-direction: column;">
            <a style="text-decoration: none" href="productPage.php?Product_Category=Haircare">
            <img src="productImages/General_Medication.jpg" class="img-thumbnail img-pop"/>
            <span style="text-align: center;width: 100%;color: black">
                HairCare
            </span></a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
        <div style="display: flex;flex-direction: column;">
            <a style="text-decoration: none" href="productPage.php?Product_Category=DentalCare">
            <img src="productImages/General_Medication.jpg" class="img-thumbnail img-pop"/>
            <span style="text-align: center;width: 100%;color: black">
                DentalCare
            </span></a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
        <div style="display: flex;flex-direction: column;">
            <a style="text-decoration: none" href="productPage.php?Product_Category=Vitamins_Supplements">
            <img src="productImages/General_Medication.jpg" class="img-thumbnail img-pop"/>
            <span style="text-align: center;width: 100%;color: black">
                Vitamins and Supplements
            </span></a>
        </div>
    </div>

</div>
<!--    --><?php
//        while ($product=mysqli_fetch_assoc($result)){
////            die($product["ProductSKU"]);
//            $desc=$product["Product_Description"];
//            if(strlen($product["Product_Description"])>50){
//                $desc=substr($product["Product_Description"],0,50)."..."."<a href='indvProduct.php?id=".$product["ProductSKU"]."'>Read More</a>";
//            }
//            echo '
//<div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
//    <div >
//        <div class="card shadow-lg" style="align-items: center; min-height: 600px;" >
//      <img src="'.$product["image"].'" class="card-img-top" alt="Product"style="max-width:300px;max-height: 400px;">
//      <div class="card-body" style="    display: flex;
//    flex-direction: column;
//    justify-content: flex-end;">
//        <h3 class="card-title">'.$product["ProductName"].'</h5>
//        <p class="card-text">'.$desc.'</p>
//        <a href="indvProduct.php?id='.$product["ProductSKU"].'" class="btn btn-dark">View Product</a>
//      </div>
//    </div>
//    </div>
//</div>
//';
//        }
//    ?>
</div>




</section>
</div>

<?php
include_once "layouts/footer.php";
?>
<script defer src="slider.js"></script>

</body>
</html>

