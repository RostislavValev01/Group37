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
<!--    data-bs-ride="carousel" data-bs-interval="5000"-->
    <div id="carouselExampleDark" class="carousel carousel-dark slide" >
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <div style="background-color: #ffffff; width: 100%;min-height: 400px;display: flex;">
                    <div class="slider-content-transform" >
                        <h2>General Medication</h2>
                        <h3>Selsun</h3>
                        <a class="btn btn-primary" href="indvProduct.php?id=1">View treatments</a>
                    </div>
                    <div style="width: 50%;display: flex;justify-content: center">
                        <img src="productImages/1.jpg" class="d-block" style="max-width: 500px;height: 400px;" alt="...">
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <div style="background-color: #ffffff; width: 100%;min-height: 400px;display: flex;">
                    <div class="slider-content-transform" >
                        <h2>SkinCare</h2>
                        <h3>Gaviscon</h3>
                        <a class="btn btn-primary" href="indvProduct.php?id=7">View treatments</a>
                    </div>
                    <div style="width: 50%;display: flex;justify-content: center">
                        <img src="productImages/7.jpg" class="d-block" style="max-width: 500px;height: 400px;" alt="...">
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <div style="background-color: #ffffff; width: 100%;min-height: 400px;display: flex;">
                    <div class="slider-content-transform" >
                        <h2>Haircare</h2>
                        <h3>Simple</h3>
                        <a class="btn btn-primary" href="indvProduct.php?id=10">View treatments</a>
                    </div>
                    <div style="width: 50%;display: flex;justify-content: center">
                        <img src="productImages/12.jpg" class="d-block" style="max-width: 500px;height: 400px;" alt="...">
                    </div>
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
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
        <a style="text-decoration: none" href="productPage.php?Product_Category=General">
            <div class="img-pop" style="display: flex;align-items: center;padding:20px;flex-direction: column;min-width: 100%;background-color: #ffffff;border-radius: 10px;">
                <img src="productImages/2.jpg"  style="max-width: 300px;height: 200px;" />
            </div>
            <p style="text-align: center;width: 100%;color: black">
                General Medication
            </p>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
        <a style="text-decoration: none" href="productPage.php?Product_Category=SkinCare">
            <div class="img-pop" style="display: flex;align-items: center;padding:20px;flex-direction: column;min-width: 100%;background-color: #ffffff;border-radius: 10px;">
                <img src="productImages/6.jpg"  style="max-width: 300px;height: 200px;" />
            </div>
            <p style="text-align: center;width: 100%;color: black">
                SkinCare
            </p>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
        <a style="text-decoration: none" href="productPage.php?Product_Category=Haircare">
            <div class="img-pop" style="display: flex;align-items: center;padding:20px;flex-direction: column;min-width: 100%;background-color: #ffffff;border-radius: 10px;">
                <img src="productImages/11.jpg"  style="max-width: 300px;height: 200px;" />
            </div>
            <p style="text-align: center;width: 100%;color: black">
                Haircare
            </p>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
        <a style="text-decoration: none" href="productPage.php?Product_Category=DentalCare">
            <div class="img-pop" style="display: flex;align-items: center;padding:20px;flex-direction: column;min-width: 100%;background-color: #ffffff;border-radius: 10px;">
                <img src="productImages/16.jpg"  style="max-width: 300px;height: 200px;" />
            </div>
            <p style="text-align: center;width: 100%;color: black">
                DentalCare
            </p>
        </a>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12  mt-2 mb-1">
        <a style="text-decoration: none" href="productPage.php?Product_Category=Vitamins_Supplements">
        <div class="img-pop" style="display: flex;align-items: center;padding:20px;flex-direction: column;min-width: 100%;background-color: #ffffff;border-radius: 10px;">
            <img src="productImages/21.jpg"  style="max-width: 300px;height: 200px;" />
        </div>
        <p style="text-align: center;width: 100%;color: black">
            Vitamins and Supplements
        </p>
        </a>
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
<!--<script defer src="slider.js"></script>-->

</body>
</html>

