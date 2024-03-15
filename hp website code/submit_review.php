<?php
session_start();
require 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['Customer_ID'])) {
        echo '<script>alert("Please log in to leave a review.");</script>';
        echo '<script>window.location.href = "indvProduct.php?id=' . $_GET['id'] . '";</script>';
    }

    $rating = $_POST['rating'];
    $description = $_POST['description'];
    
    if (!isset($_GET['id'])) {
        echo '<script>alert("Error: Product SKU is not set.");</script>';
        echo '<script>window.location.href = "productPage.php?id=' . $productSKU . '";</script>';

    }
    
    $productSKU = $_GET['id'];

    $query = "INSERT INTO productreviews (CustomerID, FirstName, LastName, ProductSKU, ReviewRating, Description) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssssss", $_SESSION['Customer_ID'], $_POST['firstName'], $_POST['lastName'], $productSKU, $rating, $description);
    
    if ($stmt->execute()) {
        echo '<script>alert("Review submitted successfully");</script>';
        echo '<script>window.location.href = "indvProduct.php?id=' . $_GET['id'] . '";</script>';

    } else {
        echo '<script>alert("Error: Something went wrong.");</script>';
        echo '<script>window.location.href = "indvProduct.php?id=' . $_GET['id'] . '";</script>';
    }

    $stmt->close();
    $con->close();
}